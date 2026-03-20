import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',

                'resources/js/app.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',                // Слушать все интерфейсы
        port: 5173,
        hmr: {
            host: 'localhost',          // HMR через localhost
            port: 5173,
        },
        cors: true,                     // Разрешить CORS
        watch: {
            usePolling: true,           // ВАЖНО для Docker!
            interval: 100,
            binaryInterval: 300,
            ignored: [
                '**/node_modules/**',
                '**/.git/**',
                '**/storage/framework/views/**',
                '**/vendor/**',
            ],
        },
        origin: 'http://localhost:5173',
    },
});
