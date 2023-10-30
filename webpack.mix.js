// webpack.mix.js

let mix = require('laravel-mix');


mix.webpackConfig({
    resolve: {
        extensions: [".*",".vue", ".webpack.js", ".web.js", ".js", ".json", ".less"]
    }
});

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/messages.js','public/js')
    .js('resources/js/bootstrap.js','public/js')
    .vue()
    .extract(['vue','js'])
    .postCss('resources/css/app.css', 'public/css',[
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .setPublicPath('public');
