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
    .js('resources/assets/v2/js/search.js','public/v2/js')
    .js('resources/assets/v2/js/hints.js','public/v2/js')
    .js('resources/assets/v2/js/unox-swiper.js','public/v2/js')
    .sass('resources/assets/sass/00_dashboard.scss', 'public/css')
    .sass('resources/assets/v2/sass/app.scss', 'public/v2/css')
    .sass('resources/assets/v2/sass/swal2.scss', 'public/v2/css')