<img src="https://capsule-render.vercel.app/api?type=waving&color=0:F16363,100:63F18F&height=200&section=header&text=Abarrotes%20Don%20Chuy&fontSize=60&fontColor=ffff&fontAlignY=38&desc=Control%20Financiero%20y%20API%20REST%20%20%20%20%20&descAlignY=58&descSize=18&animation=fadeIn" width="100%"/>

<div align="center">
<p align="center">
  <a href="https://git.io/typing-svg">
    <img src="https://readme-typing-svg.herokuapp.com?font=Plus+Jakarta+Sans&weight=700&size=34&pause=1000&color=F1E363&center=true&vCenter=true&width=500&lines=Abarrotes+Don+Chuy;API+Laravel+%2B+PostgreSQL" alt="Typing SVG" />
  </a>
</p>

Sistema de gestión y control financiero para la tienda de abarrotes, desarrollado como una API REST robusta en Laravel con base de datos PostgreSQL y documentación en Postman.

  <a href="https://git.io/typing-svg">
    <img src="https://readme-typing-svg.herokuapp.com?font=Plus+Jakarta+Sans&weight=700&size=32&pause=1000&color=63F18F&center=true&vCenter=true&width=500&lines=Control+de+Caja+y+Stock;Endpoints+Seguros+con+Postman" alt="Typing SVG" />
  </a>

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-4169E1?style=for-the-badge&logo=postgresql&logoColor=white)](https://www.postgresql.org/)
[![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)](https://www.postman.com/)

[Explorar Endpoints](#) · [Reportar Bug](#) · [Solicitar Feature](#)

</div>

---

Tienda Don Chuy - API REST & Módulo de Inventario
API RESTful desarrollada en Laravel 11 para la gestión del catálogo de productos e inventario del sistema "Tienda Don Chuy". Incorpora autenticación con estado mediante Laravel Sanctum, control de acceso basado en políticas (Policies), consultas optimizadas para PostgreSQL y pruebas automatizadas de seguridad.

---

Requisitos del Sistema
PHP: `>= 8.2`
Composer: `>= 2.5`
Base de Datos: PostgreSQL `>= 14`
Herramienta de pruebas de API: Postman

---

Pasos para Ejecutar el Proyecto

1. Clonar el repositorio e instalar dependencias

```bash
git clone https://github.com/alexgs1507/Tienda_Don_Chuy.git
cd Tienda_Don_Chuy
composer install
```

2. Configurar las variables de entorno
   Copia el archivo de plantilla `.env.example` para crear tu archivo `.env` local:

```bash
cp .env.example .env
```

3. Generar la clave de la aplicación

```bash
php artisan key:generate
```

4. Configurar la base de datos y ejecutar migraciones
   Asegúrate de que la base de datos PostgreSQL esté creada y ejecuta las migraciones junto con los datos de prueba (seeders):

```bash
php artisan migrate --seed
```

5. Iniciar el servidor de desarrollo

```bash
php artisan serve
```

## El servidor estará disponible en `http://localhost:8000`.

Variables de Entorno Necesarias (`.env.example`)
A continuación se muestra la plantilla de variables de entorno sin credenciales ni secretos expuestos:

```ini
APP_NAME="Tienda Don Chuy"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=America/Mexico_City
APP_URL=http://localhost:8000

# Configuración de Sanctum Stateful API
FRONTEND_URL=http://localhost:8000
SANCTUM_STATEFUL_DOMAINS=localhost:8000,127.0.0.1:8000

LOG_CHANNEL=stack
LOG_STACK=single
LOG_LEVEL=debug

# Configuración de PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tienda_don_chuy
DB_USERNAME=postgres
DB_PASSWORD=xxxxxx

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
```

---

Encabezados Obligatorios para Peticiones HTTP
Para interactuar con las rutas protegidas desde Postman o cualquier cliente externo, se deben incluir los siguientes Headers:
Header Valor Descripción
`Accept` `application/json` Indica que se requiere una respuesta en formato JSON.
`Content-Type` `application/json` Necesario para peticiones `POST`, `PUT` y `PATCH`.
`Referer` `http://localhost:8000` Exigido por Sanctum para validar el origen stateful.
`X-XSRF-TOKEN` `{token_cookie_decodificado}` Requerido en métodos de escritura (`POST`, `PATCH`, `DELETE`).

---

Documentación de Endpoints
Autenticación & Sesión
Método Endpoint Descripción Requiere Autenticación
`GET` `/sanctum/csrf-cookie` Inicializa la cookie CSRF (`XSRF-TOKEN`). No
`POST` `/login` Inicia sesión de usuario. No
`POST` `/logout` Cierra la sesión activa. Sí

---

Catálogo de Productos (`/api/productos`)
Método Endpoint Rol Requerido Descripción Códigos HTTP
`GET` `/api/productos` Usuario Autenticado Obtiene la lista paginada de productos (10 por página). Soporta filtro `?buscar=texto` (búsqueda insensible mediante `ilike`). `200`, `401`
`GET` `/api/productos/{id}` Usuario Autenticado Devuelve los detalles de un producto específico. `200`, `404`, `401`
`POST` `/api/productos` Administrador Registra un nuevo producto. Revisa validaciones strictly (campo `id` o `created_at` prohibidos). `201`, `401`, `403`, `422`
`PATCH` `/api/productos/{id}` Administrador Actualización parcial de un producto. `200`, `401`, `403`, `422`
`DELETE` `/api/productos/{id}` Administrador Elimina un producto del catálogo. `200`/`204`, `401`, `403`

---

Ejecución de Pruebas Automatizadas
El proyecto incluye una suite de pruebas de integración para validar las reglas de seguridad y autorización (`SeguridadBasicaTest`):

```bash
php artisan test --env=testing --filter=SeguridadBasicaTest
```

Casos de prueba validados:
`401 Unauthorized`: Verificación de bloqueo a rutas protegidas sin sesión.
`403 Forbidden`: Restricción de permisos para usuarios con rol de empleado al intentar crear recursos.
`422 Unprocessable Content`: Rechazo inmediato al enviar atributos prohibidos (`id`, `created_at`) en el payload.

