const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/admin/app.js', 'public/js/admin.js')
    .js('resources/js/clients/app.js', 'public/js/client.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/client.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sourceMaps()
    .options({
        postCss: [
            tailwindcss('./tailwind.config.js'),
            autoprefixer(),
        ],
        processCssUrls: false,
    })


mix.browserSync({
    proxy: 'http://localhost:8000',
    port: 8000,
    open: false,
    files: [
        'app/**/*.php',
        'resources/views/**/*.php',
        'public/js/**/*.js',
        'public/css/**/*.css',
    ],
    watch: true
})

mix.disableSuccessNotifications();

if (mix.inProduction()) {
    mix.disableNotifications();
    mix.version();
}
