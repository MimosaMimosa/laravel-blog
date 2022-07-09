import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/js/auth/register.js',
        ]),

    ],
    resolve: {
        alias: {
            '@bootstrap': '/resources/sass/app.scss',
            '@alpine': '/resources/js/alpine.js',
        },
    },
});
