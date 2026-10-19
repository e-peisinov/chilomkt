import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    // Los fondos de slide se eligen por dato (fondo-{{ $color }}): se generan siempre.
    safelist: [{ pattern: /^fondo-(negro|hueso|amarillo|petroleo)$/ }],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
                // Sitio público (marca CHILO, oct 2026)
                anton: ['Anton', 'Impact', 'sans-serif'],
                pincel: ['"Kaushan Script"', 'cursive'],
                texto: ['"Hanken Grotesk Variable"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                chilo: {
                    light: '#8aa6ab',
                    DEFAULT: '#7c959c',
                    dark: '#1f526b',
                },
                // Paleta de la marca CHILO (sitio público)
                negro: '#121212',
                hueso: '#E2E1DC',
                amarillo: '#FFB43A',
                petroleo: '#124D47',
            },
        },
    },

    plugins: [forms],
};
