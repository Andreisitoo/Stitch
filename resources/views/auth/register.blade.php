@extends('layouts.app')

@section('content')
    <main class="flex min-h-screen items-center justify-center px-4 py-8 sm:px-6">
        <section class="w-full max-w-2xl overflow-hidden rounded-lg border border-slate-200 bg-white shadow-[0_18px_55px_-28px_rgba(15,23,42,0.28)]">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 bg-slate-50/80 px-5 py-3.5 sm:px-7">
                <div class="flex items-center gap-2.5">
                    <span class="flex size-7 items-center justify-center rounded-full bg-[#c91f2d] text-white">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-4">
                            <path d="M12 3.5 19 7v5.2c0 4.2-2.8 7.2-7 8.3-4.2-1.1-7-4.1-7-8.3V7l7-3.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                            <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-slate-700">Entrenadores <span class="text-[#c91f2d]">//</span> ERP</span>
                </div>
                <span class="text-[10px] font-semibold uppercase tracking-[0.12em] text-slate-500">Registro de usuario <span class="text-slate-300">·</span> Control de roles</span>
            </div>

            <div class="px-5 pb-5 pt-6 sm:px-7 sm:pb-6">
                <p class="mb-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-[#b91c2b]">Alta de usuario en terminal</p>
                <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">Crear cuenta operativa</h1>
                <p class="mt-1.5 text-sm leading-5 text-slate-500">Registro de credenciales y asignación de perfil para la gestión de Pokémon TCG.</p>

                <form action="{{ route('register') }}" method="POST" class="mt-5 space-y-4">
                    @csrf

                    <fieldset>
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <legend class="text-xs font-semibold text-slate-700">Rol de sistema</legend>
                            <span class="text-[10px] font-semibold uppercase tracking-[0.12em] text-slate-400">Asignación por sistema</span>
                        </div>
                        <div class="flex items-center justify-between rounded-md border border-slate-200 bg-slate-50 px-3 py-2.5">
                            <input type="hidden" name="role" value="employee">
                            <span class="text-xs font-semibold text-slate-700">Empleado</span>
                            <span class="text-[10px] font-medium text-slate-500">Los permisos de administrador los asigna un responsable.</span>
                        </div>
                        @error('role')
                            <p class="mt-1.5 text-xs font-medium text-red-700">{{ $message }}</p>
                        @enderror
                        <p class="mt-1.5 text-[11px] text-slate-400">El rol define los permisos administrativos disponibles en la terminal.</p>
                    </fieldset>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-input
                            id="name"
                            name="name"
                            label="Nombre completo"
                            :value="old('name')"
                            placeholder="Carlos Mendoza"
                            autocomplete="name"
                            required
                        />
                        <x-input
                            id="username"
                            name="username"
                            label="Usuario"
                            :value="old('username')"
                            placeholder="cmendoza"
                            autocomplete="username"
                            maxlength="16"
                            required
                        />
                    </div>

                    <x-input
                        id="email"
                        name="email"
                        label="Correo institucional"
                        type="email"
                        :value="old('email')"
                        placeholder="nombre@entrenadores.com"
                        autocomplete="email"
                        required
                    />

                    <x-input
                        id="phone"
                        name="phone"
                        label="Teléfono directo (10 dígitos)"
                        type="tel"
                        :value="old('phone')"
                        placeholder="5512345678"
                        autocomplete="tel"
                        inputmode="numeric"
                        minlength="10"
                        maxlength="10"
                        required
                    />

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <x-input
                                id="password"
                                name="password"
                                label="Contraseña"
                                type="password"
                                autocomplete="new-password"
                                placeholder="Mínimo 8 caracteres"
                                required
                            />
                            <div class="mt-2 flex gap-1" aria-hidden="true">
                                <span class="h-1 flex-1 rounded-full bg-slate-200"></span>
                                <span class="h-1 flex-1 rounded-full bg-slate-200"></span>
                                <span class="h-1 flex-1 rounded-full bg-slate-200"></span>
                                <span class="h-1 flex-1 rounded-full bg-slate-200"></span>
                            </div>
                            <p class="mt-1 text-[10px] text-slate-400">Usa al menos 8 caracteres.</p>
                        </div>
                        <x-input
                            id="password_confirmation"
                            name="password_confirmation"
                            label="Confirmar contraseña"
                            type="password"
                            autocomplete="new-password"
                            placeholder="Repite la contraseña"
                            required
                        />
                    </div>

                    <x-button type="submit" class="w-full">
                        Crear cuenta
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4">
                            <path d="M4 10h11m-4-4 4 4-4 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </x-button>
                </form>

                @if (session('status'))
                    <p role="status" class="mt-4 rounded border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs font-medium text-emerald-800">{{ session('status') }}</p>
                @endif

                <p class="mt-4 text-center text-xs text-slate-500">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="font-semibold text-[#a61b28] underline decoration-[#e7b8bd] underline-offset-4 hover:text-[#7f1420]">Inicia sesión</a>
                </p>
            </div>

            <footer class="flex flex-wrap items-center justify-between gap-2 border-t border-slate-100 bg-slate-50/70 px-5 py-3.5 text-[10px] font-semibold uppercase tracking-wider text-slate-500 sm:px-7">
                <span>Terminal v2.4.0 · TCG ERP PROD</span>
                <span>Alta de usuario cifrada</span>
            </footer>
        </section>
    </main>
@endsection