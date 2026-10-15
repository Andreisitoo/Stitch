<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_routes_require_authentication(): void
    {
        $this->get(route('profile.edit'))->assertRedirect(route('login'));
        $this->put(route('profile.update'), [])->assertRedirect(route('login'));
        $this->put(route('profile.password'), [])->assertRedirect(route('login'));
    }

    public function test_profile_page_displays_the_authenticated_user(): void
    {
        $user = User::factory()->create([
            'name' => 'Ada Lovelace',
            'email' => 'ada@example.test',
        ]);

        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertSee('Ada Lovelace')
            ->assertSee('ada@example.test');
    }

    public function test_profile_update_saves_personal_details_and_allows_own_email(): void
    {
        $user = User::factory()->create([
            'username' => 'adalovelace',
            'email' => 'ada@example.test',
        ]);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Ada Byron',
                'username' => 'adabyron',
                'email' => 'ada@example.test',
                'phone' => '5551234567',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('status', 'Tu perfil se actualizó correctamente.');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Ada Byron',
            'username' => 'adabyron',
            'email' => 'ada@example.test',
            'phone' => '5551234567',
        ]);
    }

    public function test_profile_update_rejects_an_email_used_by_another_user(): void
    {
        $user = User::factory()->create(['username' => 'adalovelace']);
        User::factory()->create(['email' => 'grace@example.test']);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Ada Lovelace',
                'username' => 'adalovelace',
                'email' => 'grace@example.test',
                'phone' => '5551234567',
            ])
            ->assertSessionHasErrors('email');

        $this->assertSame($user->email, $user->fresh()->email);
    }

    public function test_password_update_requires_the_current_password_and_a_confirmed_minimum_length_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('current-password'),
        ]);

        $this->actingAs($user)
            ->put(route('profile.password'), [
                'current_password' => 'incorrect-password',
                'password' => 'new-secure-password',
                'password_confirmation' => 'new-secure-password',
            ])
            ->assertSessionHasErrors('current_password');

        $this->put(route('profile.password'), [
            'current_password' => 'current-password',
            'password' => 'short',
            'password_confirmation' => 'different',
        ])->assertSessionHasErrors('password');

        $this->put(route('profile.password'), [
            'current_password' => 'current-password',
            'password' => 'new-secure-password',
            'password_confirmation' => 'new-secure-password',
        ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('status', 'Tu contraseña se actualizó correctamente.');

        $this->assertTrue(Hash::check('new-secure-password', $user->fresh()->password));
    }
}
