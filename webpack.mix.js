const mix = require('laravel-mix');

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

mix
    // bootstrap & Co
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()

    // custom styles
    .postCss('resources/css/app.css', 'public/css/style.css')

    // mdi icons styles
    .styles(['resources/css/materialdesignicons.min.css'], 'public/css/mdi.css')

    // template styles & utilities (uses only in a public part of the site)
    .styles([
        'resources/css/templatestyle.css',
        'resources/css/colors/blue.css',
        'resources/css/animate.css',
        'resources/css/slicknav.css',
    ], 'public/css/template.css')

    // template scripts
    .js([
        'resources/js/template/jquery-min.js',
        'resources/js/template/material.min.js',
        'resources/js/template/form-validator.min.js',
        'resources/js/template/form-handler.js',
        'resources/js/template/wow.js',
        'resources/js/template/jquery.slicknav.js',
        'resources/js/template/main.js',
    ], 'public/js/script.js');
