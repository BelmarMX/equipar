let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.sass('resources/assets/sass/00_style.scss', 'public/css')
	.sass('resources/assets/sass/00_dashboard.scss', 'public/css')
	.js('resources/assets/js/expand.js', 'public/js')
	.js('resources/assets/js/load.js', 'public/js')
	.js('resources/assets/js/prices.js', 'public/js')
	.js('resources/assets/js/pricesMass.js', 'public/js')
	.js('resources/assets/js/quotas.js', 'public/js')
	.js('resources/assets/js/subcategories.js', 'public/js')
	.js('resources/assets/js/autocomplete.js', 'public/js')
;