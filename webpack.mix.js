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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    'node_modules/admin-lte/dist/js/pages/dashboard2.js',
    'node_modules/admin-lte/plugins/chart.js/Chart.js',
    'node_modules/admin-lte/plugins/chart.js/Chart.bundle.js',
    'node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js',
    'node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
    'node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js',
    'node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    'node_modules/admin-lte/plugins/jquery/jquery.min.js',
], 'public/js/all.min.js');

mix.scripts([
    'node_modules/admin-lte/plugins/chart.js/Chart.css',
    'node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    'node_modules/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
], 'public/css/all.min.css');
