<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Blog

### Stack Tecnológico

- **PHP 8.1+**  
- **Laravel 12**  
- **Livewire**   
- **MySQL**   
- **Tailwind CSS** 
- **Spatie Laravel Permission**  
- **Laravel Sanctum**  

### Características Principales

- **🛡️ Sistema de Autenticación** - Registro e inicio de sesión de usuarios  
- **👤 Gestión de Usuarios** - Panel de administración para activar/desactivar usuarios  
- **📰 Blog con Suscripción** - Actualización automática de posts en tiempo real  
- **✍️ Creación de Posts** - Usuarios activos pueden crear nuevas publicaciones  
- **📅 Búsqueda por Fecha** - Filtrado de posts por rango de fechas  
- **🔗 Consumo de API Externa** - Módulo para interactuar con datos de JSONPlaceholder  
- **✅ Pruebas Unitarias** - Cobertura de funcionalidades clave  
- **⚠️ Manejo de Errores** - Sistema de logs y feedback visual  

### Requisitos Previos

- **PHP 8.1 o superior**  
- **Composer**  
- **Livewire**   
- **Node.js y npm**    
- **Tailwind CSS** 
- **MySQL o cualquier base de datos compatible con Laravel**  
- **Laravel Sanctum** 
## Instalación

1. **Crear una carpeta en el escritorio de tu pc** ✅
2. **Abre la terminal en la carpeta creada** ✅
3. **Clona el repositorio**
```bash
git clone https://github.com/J-CamiloG/laravel-blog-subscription.git
```
4. **Entra a la carpeta del proyecto**
    ```bash
    cd laravel-blog-subscription
    ```
5. **Instalar dependencias de PHP**
```bash
composer install
```
6. **Instalar dependencias de JavaScript**
```bash
npm install
```
7. **Configurar el archivo de entorno**
```bash
cp .env.example .env
```
8. **Generar la clave de la aplicación**
```bash
php artisan key:generate
```
9. **Configurar la base de datos con las variables que fueron enviadas al correo**
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=
```
10. **Compilar los assets**
```bash
npm run dev
```
11. **Iniciar el servidor de desarrollo**
```bash
php artisan serve
```

## Credenciales por Defecto

- **Fueron enviadas por correo**

## Estructura del Proyecto

- **app/**: Contiene los modelos, controladores, middleware y componentes Livewire
- **database/**: Migraciones y seeders
- **resources/**: Vistas, assets y componentes frontend
- **routes/**: Definición de rutas
- **tests/**: Pruebas unitarias

## Módulos Principales

### 1. Autenticación y Gestión de Usuarios

- Registro con validación de edad
- Inicio de sesión seguro
- Panel de administración para gestionar usuarios
- Activación/desactivación de usuarios

### 2. Blog con Suscripción

- Listado de posts con actualización automática
- Creación de posts para usuarios activos
- Búsqueda por fecha
- Eliminación de posts (solo administradores)

### 3. Consumo de API Externa

- Listado de productos desde JSONPlaceholder
- Creación, edición y eliminación de productos
- Búsqueda y filtrado de productos

## Flujo de Trabajo

1. Los visitantes pueden ver los posts y buscar por fecha
2. Los usuarios pueden registrarse en la plataforma
3. Los administradores pueden activar/desactivar usuarios
4. Los usuarios activos pueden crear posts
5. Los posts se actualizan automáticamente para todos los usuarios
6. Los administradores pueden eliminar posts
7. Todos los usuarios pueden interactuar con el módulo de API


## Pruebas

```bash
php artisan test
```