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

### Patrones de Diseño Implementados

1. **MVC (Modelo-Vista-Controlador)**: Separación de la lógica de negocio, presentación y control
2. **Repository Pattern**: Abstracción del acceso a datos para desacoplar la lógica de negocio
3. **Service Layer**: Encapsulamiento de la lógica de negocio compleja
4. **Observer Pattern**: Implementado a través del sistema de eventos de Laravel
5. **Middleware**: Filtrado y transformación de solicitudes HTTP
6. **Factory Pattern**: Creación de objetos complejos (usado en seeders y tests)



### Base de Datos

La base de datos MySQL está alojada en Clever Cloud, proporcionando:
- Alta disponibilidad y escalabilidad
- Backups automáticos
- Monitoreo de rendimiento
- Conexión segura mediante SSL

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
 deberas abrir la carpeta en tu editor de codigo, buscar el archivo .env,  buscar las siguientes variables y cambiarlas con las que se enviaron al corre

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=
```

10. **En una ventana de la terminal de tu editor de codigo Compilar los assets**
```bash
npm run dev
```

11. **En otra ventada de la terminal de tu editor Iniciar el servidor de desarrollo**
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

### Flujo de Datos

1. El usuario interactúa con la interfaz (componentes Livewire)
2. Livewire maneja las interacciones y se comunica con el servidor
3. Los controladores y servicios procesan las solicitudes
4. Los modelos interactúan con la base de datos a través de Eloquent ORM
5. Los resultados se devuelven a los componentes Livewire
6. La interfaz se actualiza en tiempo real sin recargar la página


## Pruebas

```bash
php artisan test
```