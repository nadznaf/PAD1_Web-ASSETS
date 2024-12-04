import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js', 'resources/css/style.css', 'resources/css/stylesAdmin.css'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'swiper': 'swiper/swiper-bundle.min.js'
        }
    }
});
