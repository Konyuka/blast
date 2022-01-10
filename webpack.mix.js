const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js').vue()
    .browserSync({
        // proxy: 'localhost',
        // host: 'localhost:3000'
        proxy: 'http://whatever.test',
        open: false,
    })

    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}

if (!mix.inProduction()) {
    mix.browserSync(process.env.APP_URL);
}

mix.disableNotifications();

