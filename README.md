<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Forja - Sistema de Gestión para Ferretería

Este proyecto es una aplicación web desarrollada en Laravel y Bootstrap para la gestión integral de una ferretería. Permite administrar clientes, productos, marcas, proveedores, medidas, provincias y condiciones de IVA, con una interfaz moderna, responsiva y profesional.

## Características principales

-   CRUD completo para clientes, productos, marcas, proveedores, medidas, provincias y condición IVA.
-   Baja lógica (soft delete) e inactivación/reactivación para productos y medidas.
-   Visualización de datos relacionados (marca, medida, proveedor) en productos.
-   Validaciones estrictas y mensajes claros.
-   Interfaz moderna y responsiva con Bootstrap y paleta morada.
-   Sidebar fijo y navegación clara.
-   Avisos visuales para productos bajos de stock.

## Requisitos

-   PHP >= 8.1
-   Composer
-   Node.js >= 16.x y npm
-   MySQL o MariaDB

## Instalación y primer uso

1. **Clonar el repositorio:**
    ```
    git clone https://github.com/tu-usuario/ferreteria.git
    cd ferreteria
    ```
2. **Instalar dependencias de PHP:**
    ```
    composer install
    ```
3. **Instalar dependencias de Node.js:**
    ```
    npm install
    ```
4. **Configurar el archivo de entorno:**
    - Copia `.env.example` a `.env` y configura tus datos de base de datos y demás variables.
    - Genera la clave de la app:
        ```
        php artisan key:generate
        ```
5. **Ejecutar migraciones y seeders (opcional):**
    ```
    php artisan migrate --seed
    ```
6. **Compilar los assets:**
    - Para producción:
        ```
        npm run build
        ```
    - Para desarrollo (hot reload):
        ```
        npm run dev
        ```
7. **Levantar el servidor de desarrollo:**
    ```
    php artisan serve
    ```

## Notas importantes

-   **No subas el archivo `.env` ni la carpeta `vendor/` ni `node_modules/` al repositorio.**
-   Los archivos generados por Vite/Mix (`public/build`, `public/js`, `public/css`) tampoco deben subirse, ya que se generan localmente.
-   Si tienes dudas sobre la estructura de la base de datos, revisa las migraciones en `database/migrations/`.

## Licencia

Este proyecto es de uso académico y puede ser adaptado libremente.
