const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/admin/app.js", "public/js/admin/app.js")
    .vue()
    .sourceMaps();
mix.webpackConfig((webpack) => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    __VUE_OPTIONS_API__: true,
                    __VUE_PROD_DEVTOOLS__: false
                }),
            ],
            resolve: {
                extensions: ['.js', '.vue'],
                alias: {
                   '@': __dirname + '/resources/js',
                }
            },
        };
    });
mix.sass("resources/sass/app.scss", "public/css");
mix.postCss("resources/css/app.css", "public/css", [
    //
]);
