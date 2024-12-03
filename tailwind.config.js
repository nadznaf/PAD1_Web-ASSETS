import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js',
        './node_modules/preline/plugin/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                Inter: ['Inter']
            },
            colors: {
                assets: '#115C5B',
                second_a: '#1D9997',
                amara: '#E65A41',
                orion: '#4F00D7',
                iris: '#04A3A0',

                dark: '#1A202C',
                font: '#486284',
                judul_aspiration: '#989898',
                bg_aspiration: '#f6f6f6',
                border_aspiration: '#c6c6c6',
                description: '#8CA2C0',
                sumber_artikel: '#859D9D',
            },
            backdropBlur: {
                xs: '2px',
            },
            borderRadius: {
                xl: '10px',
                large: '25px',
                xxl: '60px'
            },
            width: {
                578: '578px',
                434: '434px',
                500: '500px',
                400: '400px',
                1000: '1000px',
            },
            height: {
                103: '103px',
                434: '434px',
                550: '550px',
                500: '500px',
                525: '525px',
            },
            padding: {
                575: '575px',
            }

        },

    },
    plugins: [
        require('flowbite/plugin'),
        require('preline/plugin')
    ]
};
