import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/styles.css',
                'resources/js/app.js',
                'resources/js/login.js',
                'resources/js/proyecto.js',
                'resources/js/tareas.js',
                'resources/js/bootstrap.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        assetsDir: 'assets',
        copyPublicDir: true,
    },
});
