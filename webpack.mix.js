let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/libs/clean-blog.css',
    'resources/assets/css/libs/bootstrap.min.css',
    'resources/assets/css/libs/font-awesome.min.css',
], 'public/css/libs.css');

mix.styles([
    'resources/assets/css/libs/metisMenu.min.css',
    'resources/assets/css/libs/sb-admin-2.css',
    'resources/assets/css/libs/morris.css',



], 'public/css/admin.css');



