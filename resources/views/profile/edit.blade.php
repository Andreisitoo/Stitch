@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-[#f3f6fc] lg:flex">
        <aside class="hidden w-60 shrink-0 flex-col bg-[#1d3148] text-slate-200 lg:flex">
            <a href="{{ route('profile.edit') }}" class="flex min-h-[68px] items-center gap-3 border-b border-white/10 px-5">
                <span class="flex size-8 items-center justify-center rounded-md bg-[#c91f2d] text-white">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="size-5">
                        <path d="M12 3.5 19 7v5.2c0 4.2-2.8 7.2-7 8.3-4.2-1.1-7-4.1-7-8.3V7l7-3.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                        <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span>
                    <span class="block text-xs font-bold tracking-wide text-white">Tienda Entrenadores</span>
                    <span class="mt-0.5 block text-[9px] font-semibold uppercase tracking-[0.16em] text-slate-400">TCG Operations ERP</span>
                </span>
            </a>

            <div class="border-b border-white/10 px-5 py-4">
                <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-500">Sesión activa</p>
                <p class="mt-2 flex items-center gap-2 text-[11px] font-medium text-slate-200">
                    <span class="size-1.5 rounded-full bg-emerald-400"></span>
                    Terminal segura
                </p>
            </div>

            <nav aria-label="Navegación principal" class="flex-1 px-3 py-5">
                <p class="px-2 pb-2 text-[9px] font-bold uppercase tracking-[0.14em] text-slate-500">Navegación general</p>
                <div class="space-y-1 text-xs">
                    <a href="#" class="flex items-center gap-3 rounded px-3 py-2.5 text-slate-300 hover:bg-white/5">
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><rect x="3" y="3" width="5" height="5" rx="1" stroke="currentColor" stroke-width="1.5"/><rect x="12" y="3" width="5" height="5" rx="1" stroke="currentColor" stroke-width="1.5"/><rect x="3" y="12" width="5" height="5" rx="1" stroke="currentColor" stroke-width="1.5"/><rect x="12" y="12" width="5" height="5" rx="1" stroke="currentColor" stroke-width="1.5"/></svg>
                        Panel principal
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded px-3 py-2.5 text-slate-300 hover:bg-white/5">
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><path d="m3 6 7-3 7 3v8l-7 3-7-3V6Z" stroke="currentColor" stroke-width="1.5"/><path d="m3.5 6.2 6.5 3 6.5-3M10 9v7.5" stroke="currentColor" stroke-width="1.5"/></svg>
                        Inventario
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded px-3 py-2.5 text-slate-300 hover:bg-white/5">
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><path d="M3 6h14v10H3zM6 6V4h8v2M6 9h8M6 12h5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                        Proveedores
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded px-3 py-2.5 text-slate-300 hover:bg-white/5">
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><path d="M3 5h14v12H3zM6 3v4m8-4v4M3 9h14M6 12h3m2 0h3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        Catálogos de compra
                    </a>
                    <a href="#profile-details" aria-current="page" class="flex items-center gap-3 rounded bg-[#c91f2d] px-3 py-2.5 font-semibold text-white shadow-sm">
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><circle cx="10" cy="6" r="3" stroke="currentColor" stroke-width="1.5"/><path d="M4 17c.5-3.2 2.5-5 6-5s5.5 1.8 6 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        Configuración
                    </a>
                </div>
            </nav>

            <div class="border-t border-white/10 px-5 py-4 text-[9px] font-semibold uppercase tracking-wider text-slate-500">
                <p>Terminal TCG v2.4.0</p>
                <p class="mt-1">Sistema activo · MX</p>
            </div>
        </aside>

        <main class="min-w-0 flex-1">
            <header class="flex min-h-[68px] flex-wrap items-center justify-between gap-3 border-b border-slate-200 bg-white px-4 py-3 sm:px-6 lg:px-8">
                <div class="min-w-0">
                    <p class="truncate text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">Sistema <span class="px-1 text-slate-300">/</span> Configuración <span class="px-1 text-slate-300">/</span> <span class="text-[#b91c2b]">Perfil de usuario</span></p>
                    <p class="mt-1 hidden text-[10px] font-medium text-slate-500 sm:block">Terminal segura · Gestión de cuenta</p>
                </div>
                <div class="flex items-center gap-3 sm:gap-4">
                    <div class="flex items-center gap-2 text-[10px] font-semibold text-slate-500">
                        <a href="{{ route('login') }}" class="hover:text-[#a61b28]">Acceso</a>
                        <span class="text-slate-300">/</span>
                        <a href="{{ route('register') }}" class="hover:text-[#a61b28]">Registro</a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-flex min-h-8 items-center gap-1.5 rounded border border-slate-200 px-2.5 text-[10px] font-semibold text-slate-600 hover:border-red-200 hover:text-[#a61b28]">
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-3.5"><path d="M8 3H4v14h4m3-3 4-4-4-4m4 4H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            Cerrar sesión
                        </button>
                    </form>
                    <span class="hidden h-7 w-px bg-slate-200 sm:block"></span>
                    <span class="flex size-8 items-center justify-center rounded-full bg-[#e9eef8] text-[10px] font-bold text-[#304967]">{{ collect(explode(' ', $user->name))->map(fn ($part) => mb_substr($part, 0, 1))->take(2)->join('') }}</span>
                    <span class="hidden sm:block">
                        <span class="block text-[11px] font-semibold text-slate-800">{{ $user->name }}</span>
                        <span class="block text-[9px] text-slate-500">{{ $user->role === 'admin' ? 'Administrador' : 'Empleado' }} · Terminal activa</span>
                    </span>
                </div>
            </header>

            <div class="mx-auto max-w-[1440px] px-4 py-6 sm:px-6 sm:py-8 lg:px-8">
                <div class="mb-5 flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">Perfil de Usuario y Seguridad</h1>
                        <p class="mt-1.5 max-w-2xl text-xs leading-5 text-slate-500 sm:text-sm">Gestiona tus credenciales personales, datos de contacto operativos y seguridad de acceso a la terminal TCG.</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 rounded border border-emerald-200 bg-emerald-50 px-2.5 py-1.5 text-[9px] font-bold uppercase tracking-wider text-emerald-700">
                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                        {{ $user->role === 'admin' ? 'Acceso Master Admin' : 'Usuario operativo' }}
                    </span>
                </div>

                @if (session('status'))
                    <p role="status" class="mb-4 rounded border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs font-medium text-emerald-800">{{ session('status') }}</p>
                @endif

                <div class="grid items-start gap-4 xl:grid-cols-5 xl:gap-5">
                    <section id="profile-details" class="overflow-hidden rounded-md border border-slate-200 bg-white xl:col-span-3">
                        <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50/70 px-4 py-3.5 sm:px-5">
                            <span class="flex size-8 items-center justify-center rounded bg-[#e9eef8] text-[#304967]">
                                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><circle cx="10" cy="6" r="3" stroke="currentColor" stroke-width="1.5"/><path d="M4 17c.5-3.2 2.5-5 6-5s5.5 1.8 6 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </span>
                            <div>
                                <h2 class="text-xs font-bold text-slate-800">Datos Personales y Operativos</h2>
                                <p class="mt-0.5 text-[10px] text-slate-500">Información asociada con tu cuenta de empleado.</p>
                            </div>
                        </div>

                        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4 p-4 sm:p-5">
                            @csrf
                            @method('PUT')

                            <div class="rounded border border-slate-200 bg-slate-50 px-3 py-2.5">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <p class="text-[9px] font-bold uppercase tracking-[0.12em] text-slate-400">Rol en el sistema</p>
                                    <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Solo lectura</span>
                                </div>
                                <div class="mt-1.5 flex flex-wrap items-center gap-2">
                                    <span class="size-1.5 rounded-full bg-[#c91f2d]"></span>
                                    <p class="text-xs font-semibold text-slate-700">{{ $user->role === 'admin' ? 'Administrador General' : 'Empleado' }}</p>
                                </div>
                                    <p class="mt-1 text-[10px] leading-4 text-slate-500">Los permisos de administrador son asignados por un responsable.</p>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <x-input
                                    id="name"
                                    name="name"
                                    label="Nombre completo"
                                    :value="old('name', $user->name)"
                                    autocomplete="name"
                                    required
                                />
                                <div>
                                    <x-input
                                        id="username"
                                        name="username"
                                        label="Nombre de usuario"
                                        :value="old('username', $user->username)"
                                        autocomplete="username"
                                        required
                                    />
                                    <p class="mt-1 text-[10px] text-slate-400">ID de usuario: {{ $user->id }}</p>
                                </div>
                            </div>

                            <div>
                                <x-input
                                    id="email"
                                    name="email"
                                    label="Correo institucional"
                                    type="email"
                                    :value="old('email', $user->email)"
                                    autocomplete="email"
                                    required
                                />
                                <p class="mt-1.5 inline-flex items-center gap-1 text-[10px] font-semibold text-emerald-700">
                                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="size-3"><circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5"/><path d="m5 8 2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    Verificada MX
                                </p>
                            </div>

                            <div class="grid gap-4">
                                <div>
                                    <x-input
                                        id="phone"
                                        name="phone"
                                        label="Teléfono de contacto (10 dígitos)"
                                        type="tel"
                                        :value="old('phone', $user->phone)"
                                        autocomplete="tel"
                                        inputmode="tel"
                                        required
                                    />
                                    <p class="mt-1 text-[10px] leading-4 text-slate-400">Solo caracteres numéricos para SMS de doble factor.</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center justify-end gap-2 border-t border-slate-100 pt-4">
                                <a href="{{ route('profile.edit') }}" class="inline-flex min-h-10 items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50">Cancelar</a>
                                <x-button type="submit" class="min-h-10 px-4 py-2 text-xs">
                                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-3.5"><path d="M4 3h10l3 3v11H3V3h1Zm2 0v5h8V3M6 17v-6h8v6" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                                    Guardar cambios
                                </x-button>
                            </div>
                        </form>
                    </section>

                    <section class="overflow-hidden rounded-md border border-slate-200 bg-white xl:col-span-2">
                        <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50/70 px-4 py-3.5 sm:px-5">
                            <span class="flex size-8 items-center justify-center rounded bg-[#e9eef8] text-[#304967]">
                                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><rect x="4" y="9" width="12" height="8" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M6.5 9V6a3.5 3.5 0 0 1 7 0v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                            </span>
                            <div>
                                <h2 class="text-xs font-bold text-slate-800">Cambiar contraseña</h2>
                                <p class="mt-0.5 text-[10px] text-slate-500">Elige una contraseña segura para tu usuario.</p>
                            </div>
                        </div>

                        <form action="{{ route('profile.password') }}" method="POST" class="space-y-4 p-4 sm:p-5">
                            @csrf
                            @method('PUT')

                            <x-input
                                id="current_password"
                                name="current_password"
                                label="Contraseña actual"
                                type="password"
                                autocomplete="current-password"
                                required
                            />

                            <div>
                                <x-input
                                    id="password"
                                    name="password"
                                    label="Nueva contraseña"
                                    type="password"
                                    autocomplete="new-password"
                                    placeholder="Mínimo 8 caracteres alfanuméricos"
                                    required
                                />
                                <div class="mt-2 flex gap-1" aria-hidden="true">
                                    <span class="h-1 flex-1 rounded-full bg-[#c91f2d]"></span>
                                    <span class="h-1 flex-1 rounded-full bg-amber-400"></span>
                                    <span class="h-1 flex-1 rounded-full bg-slate-200"></span>
                                    <span class="h-1 flex-1 rounded-full bg-slate-200"></span>
                                </div>
                                <p class="mt-1 text-[10px] text-slate-400">Usa al menos 8 caracteres y combina letras y números.</p>
                            </div>

                            <x-input
                                id="password_confirmation"
                                name="password_confirmation"
                                label="Confirmar nueva contraseña"
                                type="password"
                                autocomplete="new-password"
                                placeholder="Repite la nueva contraseña"
                                required
                            />

                            <div class="rounded border border-blue-100 bg-blue-50/70 p-3">
                                <p class="flex items-start gap-2 text-[10px] leading-4 text-slate-600">
                                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="mt-0.5 size-3.5 shrink-0 text-blue-600"><circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.4"/><path d="M8 7v4m0-6h.01" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                    <span><strong class="font-semibold text-slate-700">Nota de seguridad de terminal:</strong> al guardar una nueva contraseña, las demás sesiones se cerrarán.</span>
                                </p>
                            </div>

                            <div class="flex items-center justify-between gap-2 rounded border border-slate-100 bg-slate-50 px-3 py-2.5">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex size-7 items-center justify-center rounded bg-white text-slate-600 shadow-sm">
                                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-4"><rect x="5" y="2.5" width="10" height="15" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M8 5h4M9 14.5h2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                    </span>
                                    <span>
                                        <span class="block text-[10px] font-semibold text-slate-700">Autenticación de 2 factores (2FA)</span>
                                        <span class="mt-0.5 block text-[9px] text-slate-500">Autenticación de dos factores no configurada</span>
                                    </span>
                                </div>
                                <span class="rounded bg-emerald-100 px-2 py-1 text-[8px] font-bold uppercase tracking-wider text-emerald-700">Protegido</span>
                            </div>

                            <div class="flex justify-end border-t border-slate-100 pt-4">
                                <x-button type="submit" class="w-full sm:w-auto">
                                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="size-3.5"><path d="M4 3h10l3 3v11H3V3h1Zm2 0v5h8V3M6 17v-6h8v6" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                                    Guardar cambios
                                </x-button>
                            </div>
                        </form>
                    </section>
                </div>

                <p class="mt-5 text-[10px] font-medium text-slate-400">Última sincronización de perfil: 24/10/2024 16:15 MXN</p>
            </div>
        </main>
    </div>
@endsection