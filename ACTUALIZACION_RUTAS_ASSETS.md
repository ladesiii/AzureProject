# Actualización de Rutas de Assets

Se han realizado los siguientes cambios para que el proyecto funcione con los archivos CSS, JS e imágenes ubicados en la carpeta `resources/`:

## Cambios Realizados

### 1. **vite.config.js** - Actualización de configuración de Vite
- Se agregaron todos los archivos CSS y JS a procesar:
  - `resources/css/app.css`
  - `resources/css/styles.css`
  - `resources/js/app.js`
  - `resources/js/login.js`
  - `resources/js/proyecto.js`
  - `resources/js/tareas.js`
  - `resources/js/bootstrap.js`
- Se agregó configuración `copyPublicDir: true` para asegurar que archivos estáticos se copien a `public/` en build

### 2. **Plantillas Blade** - Cambio de `asset()` a `@vite()`
Las siguientes plantillas fueron actualizadas para usar `@vite()` en lugar de `asset()`:

- [plantillas/leftnavbar.blade.php](resources/views/plantillas/leftnavbar.blade.php#L8)
  - Cambio: `asset('/css/styles.css')` → `@vite(['resources/css/styles.css'])`

- [plantillas/auth.blade.php](resources/views/plantillas/auth.blade.php#L10)
  - Cambio: `asset('css/styles.css')` → `@vite(['resources/css/styles.css'])`
  - Cambio: `asset('js/login.js')` → `@vite(['resources/js/login.js'])`

- [plantillas/headerLanding.blade.php](resources/views/plantillas/headerLanding.blade.php#L7)
  - Cambio: `asset('css/styles.css')` → `@vite(['resources/css/styles.css'])`

- [tareas.blade.php](resources/views/tareas.blade.php#L8)
  - Cambio: `asset('js/tareas.js')` y `asset('css/styles.css')` → `@vite(['resources/css/styles.css', 'resources/js/tareas.js'])`

- [proyecto.blade.php](resources/views/proyecto.blade.php#L7)
  - Cambio: `asset('css/styles.css')` → `@vite(['resources/css/styles.css'])`

### 3. **Imágenes** - Sincronización desde resources a public
- Se copiaron todas las imágenes de `resources/img/` a `public/img/`
- Se actualizó [app/Providers/AppServiceProvider.php](app/Providers/AppServiceProvider.php) con un método `syncResourcesImg()` que:
  - Sincroniza automáticamente las imágenes en desarrollo
  - Crea la carpeta `public/img/` si no existe
  - Copia los archivos de `resources/img/` a `public/img/`

Las referencias a imágenes mantienen `asset('img/...')` ya que Vite se encarga de servir estos archivos desde `public/img/`

## Cómo Usar en Desarrollo

### Con Vite Dev Server:
```bash
npm run dev
```

### Para Build en Producción:
```bash
npm run build
```

El servidor de Vite en desarrollo procesará automáticamente todos los CSS y JS desde `resources/`, y los archivos de `public/` se servirán tal como están.

## Notas Importantes

1. **Desarrollo**: Asegúrate de ejecutar `npm run dev` para que Vite procese los archivos CSS y JS desde `resources/`
2. **Imágenes**: Las imágenes en `resources/img/` se copian a `public/img/` automáticamente, tanto en desarrollo como en producción
3. **CSS y JS**: Usa `@vite()` para archivos en `resources/`, no `asset()`
4. **Assets públicos**: Los archivos en `public/` se sirven normalmente usando `asset()` (imágenes, favicon, etc.)

## Estructura de Carpetas
```
resources/
├── css/
│   ├── app.css
│   └── styles.css
├── img/
│   ├── edit.png
│   ├── landing.png
│   ├── logo.png
│   ├── trash.png
│   └── user.png
└── js/
    ├── app.js
    ├── bootstrap.js
    ├── login.js
    ├── proyecto.js
    └── tareas.js

public/
├── css/
├── img/  (sincronizado desde resources/img/)
├── js/
└── index.php
```
