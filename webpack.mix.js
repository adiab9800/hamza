const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .copy('node_modules/admin-lte/dist/css/adminlte.css', 'public/css')
   .copy('node_modules/admin-lte/dist/js/adminlte.js', 'public/js')
   .copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/css')
   .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
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

