let mix = require("laravel-mix");

mix.js("resources/js/cp.js", "dist/js").vue();

mix.sass('resources/sass/web.scss', 'dist/css', {
    implementation: require('sass')
});  