// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            assetUrl: process.env.ASSET_URL, // ✅ PENTING: agar URL asset pakai HTTPS
        }),
        tailwindcss(),
    ],
});

