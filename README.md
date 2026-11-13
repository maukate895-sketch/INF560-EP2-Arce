# TuriPotosí 🏔️

**Sistema web de gestión de tours y reservas turísticas de Potosí, Bolivia.**

## Descripción del proyecto

TuriPotosí es una aplicación web desarrollada para promocionar los destinos turísticos de Potosí, permitiendo a los visitantes explorar diferentes tours, conocer sus características y realizar reservas en línea.

## Tecnologías utilizadas

- PHP 8.4
- Laravel 13
- PostgreSQL
- HTML5
- CSS3
- JavaScript
- Vite
- Composer
- Node.js y NPM

## Funcionalidades principales

- Página de inicio.
- Catálogo de tours turísticos.
- Clasificación por categorías.
- Búsqueda y filtros de tours.
- Información detallada de cada destino.
- Registro e inicio de sesión.
- Sistema de reservas.
- Consulta y cancelación de reservas.
- Panel de administración.
- Control de acceso mediante roles.

## Roles del sistema

El sistema cuenta con tres roles:

- **Administrador:** acceso al panel administrativo y gestión del sistema.
- **Guía:** usuario con rol de guía turístico.
- **Turista:** puede explorar los tours y realizar reservas.

## Usuarios de prueba

Todos los usuarios tienen la contraseña:

`password`

| Rol | Correo electrónico | Contraseña |
|---|---|---|
| Administrador | admin@turipotosi.test | password |
| Guía | guia1@turipotosi.test | password |
| Guía | guia2@turipotosi.test | password |
| Turista | turista1@turipotosi.test | password |
| Turista | turista2@turipotosi.test | password |

## Requisitos de instalación

- PHP 8.4 o compatible con Laravel 13.
- Composer.
- Node.js y NPM.
- PostgreSQL.
- Git.

## Instalación del proyecto

### 1. Clonar el repositorio

```bash
git clone https://github.com/maukate895-sketch/INF560-EP2-Arce.git
cd INF560-EP2-Arce
```

### 2. Instalar dependencias

```bash
composer install
npm install
npm run build
```

### 3. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

Configurar la conexión a PostgreSQL en el archivo `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=turipotosi
DB_USERNAME=postgres
DB_PASSWORD=
```

Crear previamente la base de datos `turipotosi` en PostgreSQL.

### 4. Ejecutar migraciones y datos iniciales

```bash
php artisan migrate:fresh --seed
```

### 5. Crear enlace de almacenamiento

```bash
php artisan storage:link
```

### 6. Iniciar el servidor

```bash
php artisan serve
```

Abrir en el navegador:

http://127.0.0.1:8000

## Capturas de pantalla

Las capturas del proyecto se almacenarán en `docs/capturas/`.

- Catálogo de tours.
- Detalle de un tour.
- Panel de administración.
- Mis reservas.

## Autor

Kate Arce

**Asignatura:** INF560  
**Proyecto:** Segundo examen parcial  
**Nombre del sistema:** TuriPotosí

