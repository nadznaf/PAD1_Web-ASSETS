import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js'
    ],
    theme: {
        extend: {
            fontFamily: {
                Inter: ['Inter', 'sans-serif'],
            },
            colors: {
                assets: '#115C5B',
                second_a: '#1D9997',
                amara: '#E65A41'
            }
        },
    },
    plugins: [],
};
