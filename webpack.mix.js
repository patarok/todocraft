let mix = require('laravel-mix');
require('laravel-mix-polyfill');
require('dotenv').config();

mix
    .copyDirectory('src/fonts', 'web/assets/fonts')
    .copyDirectory('src/img', 'web/assets/img')
    .js('src/js/app.js', 'js/app.js')
/*    .polyfill({
        enabled: true,
        useBuiltIns: "usage",
        targets: {
            "firefox": 68,
            "safari": 12,
            "ie": 11,
            "chrome": 70,
            "edge": 15
        }
    })*/
    .postCss('src/css/tailwind.css', 'css/styles.css', [
        require("postcss-import"),
        require('tailwindcss'),
        require("autoprefixer"),
    ])
    .sourceMaps()
    .setPublicPath('web/assets')
    .version()
mix.browserSync({
    proxy: 'http://nginx',
    files: ['tailwind.config.js', 'src/js/*.js', 'src/css/*.css', 'templates/**/*.twig']
});
