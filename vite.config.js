import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
<<<<<<< HEAD
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
=======
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    ],
});
