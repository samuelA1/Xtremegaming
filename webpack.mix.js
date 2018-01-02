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
    'resources/assets/css/libs/bootstrap-grid.min.css',
    'resources/assets/css/libs/font-awesome.min.css',
    'resources/assets/css/libs/bootstrap-reboot.min.css',


], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.min.js',
    'resources/assets/js/libs/bootstrap.bundle.min.js',
    'resources/assets/js/libs/bootstrap.min.js',
    'resources/assets/js/libs/clean-blog.min.js',
    'resources/assets/js/contact_me.js',
    'resources/assets/js/libs/jqBootstrapValidation.js'

], 'public/js/libs.js');
