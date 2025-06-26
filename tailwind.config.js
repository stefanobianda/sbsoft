import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                'zoom-pan': {
                    '0%': {
                        transform: 'scale(1) translateY(0%)',
                    },
                    '100%': {
                        transform: 'scale(1.5) translateY(0%)',
                    },
                },
            },
            animation: {
                'zoom-pan': 'zoom-pan 10s ease-in-out infinite alternate',
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
      ],
};
