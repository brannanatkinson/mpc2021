const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                display: ['Playfair Display', 'sans-serif'],
            },
            colors: {
                'mp-blue-green': '#539291',
                'mp-light-lime': '#bad598',
                'mp-mossy-green': '#b7bd54',
                'mp-lime-yellow': '#e1e693',
                'mp-light-gray': '#e5e6e2',
                'mp-coral': '#f18d79',
                'mp-navy': '#0c385c' 
            }
        },
        aspectRatio: {
          1: '1',
          2: '2',
          3: '3',
          4: '4',
          5: '5',
          6: '6',
          7: '7',
          8: '8',
          9: '9',
          10: '10',
          11: '11',
          12: '12',
          13: '13',
          14: '14',
          15: '15',
          16: '16',
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [ 
        require('@tailwindcss/aspect-ratio') 
    ]
};
