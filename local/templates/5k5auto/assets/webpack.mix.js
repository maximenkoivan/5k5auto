const mix = require('laravel-mix');
const path = require('path');

mix
    .alias({
        '@': path.join(__dirname, 'src'),
        '@scss': path.join(__dirname, 'src/scss'),
        '@img': path.join(__dirname, 'images'),
    })
    .options({
        processCssUrls: false
    })
    .js('./src/js/script.js', './js/')
    .sass('./src/scss/style.scss', './css')
    .sass('./src/scss/pages/404.scss', './css')
    .sourceMaps();

mix.webpackConfig({
    devServer: {
        static: {
            directory: path.join(__dirname, ''),
        },
        compress: true,
        port: 3000,
        open: true, // автоматически открывает браузер
        hot: true,  // включение hot module replacement
        watchFiles: ['dist/css', 'dist/js', 'images', 'index.html', '404.html'], // следит за изменениями файлов
    },
    watchOptions: {
        poll: true, // это необходимо для работы HMR в некоторых случаях
    }
});

module.exports = mix;
