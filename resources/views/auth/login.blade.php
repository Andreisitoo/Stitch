@extends('layouts.app')

@section('content')
    <main class="flex min-h-screen items-center justify-center px-4 py-10 sm:px-6">
        <section class="w-full max-w-md overflow-hidden rounded-lg border border-slate-200 bg-white shadow-[0_18px_55px_-28px_rgba(15,23,42,0.28)]">
            <div class="flex items-center justify-between border-b border-slate-100 bg-slate-50/80 px-6 py-4">
                <div class="flex items-center gap-2.5">
                    <span class="flex size-7 items-center justify-center rounded-full bg-[#c91f2d] text-white">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-4">
                            <path d="M12 3.5 19 7v5.2c0 4.2-2.8 7.2-7 8.3-4.2-1.1-7-4.1-7-8.3V7l7-3.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                            <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-slate-700">Entrenadores <span class="text-[#c91f2d]">//</span> ERP</span>
                </div>
                <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold uppercase tracking-wider text-slate-500">
                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                    Modo conexión
                </span>
            </div>

            <div class="px-6 pb-6 pt-7 sm:px-8 sm:pt-8">
                <p class="mb-2 text-[10px] font-bold uppercase tracking-[0.18em] text-[#b91c2b]">Autenticación segura <span class="text-slate-400">/ TLS-256</span></p>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Sistema Administrativo TCG</h1>
                <p class="mt-2 text-sm leading-5 text-slate-500">Control central de inventario, grading y regulación de activos Pokémon TCG.</p>

                <form action="{{ route('login') }}" method="POST" class="mt-7 space-y-5">
                    @csrf

                    <x-input
                        id="email"
                        name="email"
                        label="Usuario o Correo Institucional"
                        type="email"
                        :value="old('email')"
                        placeholder="nombre@entrenadores.com"
                        autocomplete="username"
                        required
                        autofocus
                    >
                        <x-slot:leading>
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-4">
                                <circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.6" />
                                <path d="M5 20c.5-3.2 3.1-5 7-5s6.5 1.8 7 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </x-slot:leading>
                    </x-input>

                    <x-input
                        id="password"
                        name="password"
                        label="Contraseña de Acceso"
                        type="password"
                        autocomplete="current-password"
                        placeholder="Introduce tu contraseña"
                        required
                    >
                        <x-slot:leading>
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-4">
                                <rect x="5" y="10" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.6" />
                                <path d="M8 10V7a4 4 0 1 1 8 0v3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </x-slot:leading>
                    </x-input>

                    <div class="flex flex-wrap items-center justify-between gap-3 pt-0.5">
                        <label for="remember" class="inline-flex cursor-pointer items-center gap-2 text-xs text-slate-600">
                            <input id="remember" name="remember" type="checkbox" value="1" class="size-3.5 rounded border-slate-300 text-[#c91f2d] focus:ring-[#c91f2d]">
                            Recordar estación de trabajo
                        </label>
                        <a href="#" class="text-xs font-semibold text-[#a61b28] underline decoration-[#e7b8bd] underline-offset-4 hover:text-[#7f1420]">¿Olvidó su contraseña?</a>
                    </div>

                    <x-button type="submit" class="w-full">
                        Iniciar Sesión
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4">
                            <path d="M4 10h11m-4-4 4 4-4 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </x-button>
                </form>
            </div>

            <footer class="border-t border-slate-100 bg-slate-50/70 px-6 py-4 sm:px-8">
                <div class="flex items-center justify-between text-[10px] font-semibold uppercase tracking-wider text-slate-500">
                    <span>Terminal v2.4.0</span>
                    <span>TCG · ERP · PROD</span>
                </div>
                <p class="mt-2 text-[11px] leading-4 text-slate-400">Solo personal autorizado. Toda actividad queda registrada y cifrada para proteger los activos de la organización.</p>
            </footer>
        </section>
    </main>
@endsection