import { defineConfig } from 'vite'
import laravel from 'vite-plugin-laravel'
import react from '@vitejs/plugin-react'

export default defineConfig({
    plugins: [laravel(), react()],
    resolve: {
        alias: {
            '@/': `${__dirname}/resources/ts/`,
        },
    },
})
