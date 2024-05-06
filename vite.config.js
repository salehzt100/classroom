import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/sidebar.css',
                'resources/js/sidebar.js',
                'resources/css/main.css',
                'resources/css/classroom-index.css',
                'resources/js/app.js',
                'resources/js/chat.js',
                'resources/js/classroom-show.js',
                'resources/css/classroom-show.css',
                'resources/css/chat.css',



            ],
            refresh: true,
        }),
    ],
});
