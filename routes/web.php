<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/perfil', function () {
    $user = (object) [
        'name' => 'Carlos Mendoza',
        'username' => 'cmendoza',
        'employee_id' => 'EMP-04',
        'role' => 'Administrador General (Acceso Total a Inventario y Proveedores)',
        'email' => 'carlos.mendoza@entrenadores.mx',
        'phone' => '+52 (55) 5489 2291',
        'branch_id' => 'centro-04',
        'branch' => 'Sucursal Centro (ID #04)',
        'two_factor_method' => 'Activo vía Token TCG Hardware',
    ];

    return view('profile.edit', compact('user'));
})->name('profile.edit');
