import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                128: "32rem",
            },
            colors: {
                'primary-green': '#5F7161',
                'secondary-green': '#6D8B74',
                'primary-beige': '#D0C9C0',
                'secondary-beige': '#EFEAD8',
            },
        },
    },

    plugins: [forms, typography],
};
