<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sincronizar imágenes de resources/img a public/img en desarrollo
        if (! app()->isProduction()) {
            $this->syncResourcesImg();
        }
    }

    /**
     * Sincroniza las imágenes de resources/img a public/img
     */
    protected function syncResourcesImg(): void
    {
        $sourceDir = resource_path('img');
        $publicDir = public_path('img');

        // Solo hacer sync si el directorio público no es un symlink o directorio existente
        if (File::isDirectory($sourceDir)) {
            // Si el destino existe, no hacer nada (ya está copiado)
            // Esta función solo se ejecuta una vez al boot
            if (!File::isDirectory($publicDir)) {
                File::makeDirectory($publicDir, 0755, true, true);
                File::copyDirectory($sourceDir, $publicDir);
            }
        }
    }
}
