const mix = require('laravel-mix');
const WebpackShellPlugin = require('webpack-shell-plugin');
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

mix.js('resources/js/app.js', 'public/js')
// .extract(['lodash','bootstrap','bootstrap-datepicker'])
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/templates', 'public/templates')
    .copyDirectory('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js', 'public/js/bootstrap-datepicker.js');
mix.styles('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
    'public/css/bootstrap-datepicker.css');
mix.webpackConfig({
    plugins:
        [
            new WebpackShellPlugin({onBuildStart:['php artisan lang:js --quiet'], onBuildEnd:[]})
        ]
});
