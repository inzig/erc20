let mix = require('laravel-mix');
let ImageminPlugin = require('imagemin-webpack-plugin').default;

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

const exec = require('child_process').exec;
if (/^win/.test(process.platform)) {
    exec('rd public\\images /s /q');
    exec('rd public\\fonts /s /q');
    exec('rd public\\css /s /q');
    exec('rd public\\js /s /q');
} else {
    exec('rm -rf public/images');
    exec('rm -rf public/fonts');
    exec('rm -rf public/css');
    exec('rm -rf public/js');
}

mix.webpackConfig({
    plugins: [
        new ImageminPlugin({
            pngquant: {
                quality: '95-100',
            },
            test: /\.(jpe?g|png|gif|svg)$/i,
        }),
    ],
});

mix.sourceMaps(false)
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/dashboard.js', 'public/js')
    .js('resources/assets/js/admin.js', 'public/js')
    .scripts([
        'node_modules/wowjs/dist/wow.js',
    ], 'public/js/all.js')
    .scripts([
        'resources/assets/js/Chart.min.js',
        'resources/assets/js/sb-admin-charts.min.js',
    ], 'public/js/chart.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css')
    .less('resources/assets/less/dashboard.less', 'public/css')
    .copy('node_modules/noty/lib/noty.css', 'public/css')
    .copy('resources/assets/images', 'public/images', false)
    .version();
