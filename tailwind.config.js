/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    // mode: 'jit',
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
        'node_modules/preline/dist/*.js',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            'sans': ['Proxima Nova', ...defaultTheme.fontFamily.sans],
            // colors: {
            //     primary: colors.indigo,
            //     secondary: colors.gray,
            //     positive: colors.emerald,
            //     negative: colors.red,
            //     warning: colors.amber,
            //     info: colors.blue,
            //     light: colors.gray,
            //     dark: colors.gray,
            //     white: colors.white,
            //     black: colors.black,
            //     transparent: 'transparent',
            //     current: 'currentColor',
            // },
        },
        screens: {
            'xs': '475px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
        require('autoprefixer'),
        require('preline/plugin'),
        require('flowbite/plugin')
    ],
    important: true,
}

