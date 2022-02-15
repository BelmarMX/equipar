let mix = require('laravel-mix')

mix.sourceMaps('true', 'source-map')
    .js('resources/assets/v2/js/app.js','public/v2/js')
    .sass('resources/assets/v2/sass/app.scss', 'public/v2/css')