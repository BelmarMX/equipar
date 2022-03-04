let mix = require('laravel-mix')

mix.webpackConfig({
        stats: {
            children: false
        }
    })
    .sourceMaps('true', 'source-map')
    .js('resources/assets/v2/js/app.js','public/v2/js')
    .js('resources/assets/v2/js/quotator.js','public/v2/js')
    .js('resources/assets/v2/js/projects.js','public/v2/js')
    .js('resources/assets/v2/js/algolia.js','public/v2/js')
    .sass('resources/assets/v2/sass/app.scss', 'public/v2/css')
    .sass('resources/assets/v2/sass/swal2.scss', 'public/v2/css')