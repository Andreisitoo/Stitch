# Tienda Entrenadores — TCG Operations ERP

Aplicación web para iniciar sesión, registrarse y editar el perfil de usuario, conectada a una base de datos. La interfaz fue diseñada con Google Stitch y está construida con Laravel.

## Requisitos

- PHP y Composer
- Node.js y npm

## Instalación y ejecución

Desde la raíz del proyecto, ejecuta:

```powershell
composer install
npm install
Copy-Item .env.example .env
php artisan key:generate
if (!(Test-Path database/database.sqlite)) { New-Item -ItemType File -Path database/database.sqlite }
php artisan migrate
```

En una terminal, inicia Vite para compilar y servir los recursos del frontend:

```powershell
npm run dev
```

En otra terminal, inicia el servidor de Laravel:

```powershell
php artisan serve
```

Abre la dirección que indique `php artisan serve` en el navegador.

## Rutas disponibles

| Método | Ruta | Nombre | Acceso |
| --- | --- | --- | --- |
| GET | `/` | — | Público |
| GET | `/login` | `login` | Invitados |
| POST | `/login` | — | Invitados |
| GET | `/register` | `register` | Invitados |
| POST | `/register` | — | Invitados |
| GET | `/perfil` | `profile.edit` | Requiere autenticación |
| PUT | `/perfil` | `profile.update` | Requiere autenticación |
| PUT | `/perfil/password` | `profile.password` | Requiere autenticación |
| POST | `/logout` | `logout` | Requiere autenticación |
