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
                Inter: ['Inter']
            },
            colors: {
                dark: '#1A202C',
                font: '#486284',
                assets: '#115C5B',
                second_a: '#1D9997',
                amara: '#E65A41'
            },
            backdropBlur: {
                xs: '2px',
            },
            borderRadius: {
                xl: '10px',
                large: '25px',
                xxl: '60px'
            },

        },

    },
    plugins: [
        require('flowbite/plugin')
    ]
};
