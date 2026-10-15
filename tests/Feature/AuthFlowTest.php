<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_creates_an_employee_and_starts_a_session(): void
    {
        $response = $this->post('/register', $this->registrationData());

        $response->assertRedirect(route('profile.edit'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Ada Lovelace',
            'username' => 'adalovelace',
            'email' => 'ada@example.test',
            'phone' => '5551234567',
            'role' => 'employee',
        ]);

        $user = User::where('email', 'ada@example.test')->firstOrFail();
        $this->assertTrue(Hash::check('secure-pass-123', $user->password));
    }

    public function test_registration_rejects_duplicate_identity_and_invalid_password(): void
    {
        User::factory()->create([
            'email' => 'ada@example.test',
            'username' => 'adalovelace',
        ]);

        $response = $this->post('/register', $this->registrationData([
            'password' => 'short',
            'password_confirmation' => 'different',
        ]));

        $response->assertSessionHasErrors(['email', 'username', 'password']);
        $this->assertGuest();
        $this->assertDatabaseCount('users', 1);
    }

    public function test_public_registration_cannot_assign_the_admin_role(): void
    {
        $response = $this->post('/register', $this->registrationData(['role' => 'admin']));

        $response->assertSessionHasErrors('role');
        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_login_remember_and_logout_work(): void
    {
        $user = User::factory()->create([
            'email' => 'ada@example.test',
            'password' => Hash::make('secure-pass-123'),
            'remember_token' => null,
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secure-pass-123',
            'remember' => '1',
        ]);

        $response->assertRedirect(route('profile.edit'));
        $this->assertAuthenticatedAs($user);
        $this->assertNotEmpty($user->fresh()->getRememberToken());

        $this->withSession(['before_logout' => 'present'])
            ->post('/logout')
            ->assertRedirect(route('login'))
            ->assertSessionMissing('before_logout');

        $this->assertGuest();
    }

    public function test_failed_login_returns_an_email_error_and_profile_requires_authentication(): void
    {
        User::factory()->create([
            'email' => 'ada@example.test',
            'password' => Hash::make('secure-pass-123'),
        ]);

        $this->post('/login', [
            'email' => 'ada@example.test',
            'password' => 'wrong-password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
        $this->get('/perfil')->assertRedirect(route('login'));
    }

    private function registrationData(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Ada Lovelace',
            'username' => 'adalovelace',
            'email' => 'ada@example.test',
            'phone' => '5551234567',
            'role' => 'employee',
            'password' => 'secure-pass-123',
            'password_confirmation' => 'secure-pass-123',
        ], $overrides);
    }
}