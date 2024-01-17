<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('mail', 'MailController');

Route::get('/', 'IndexController@view')
	-> name('index');
Route::get('nosotros', 'IndexController@view')
	-> name('nosotros');
Route::get('proyectos', 'IndexController@view')
	->name('proyectos');
Route::get('servicios', 'IndexController@view')
	->name('servicios');
Route::get('fabricacion-muebles-acero-inoxidable', 'IndexController@view')
    ->name('diseno-acero');

Route::get('unox', 'IndexController@unox')
    ->name('unox');
Route::get('unox/bakertop', 'IndexController@unoxBakertop')
    ->name('unoxBakertop');
Route::get('unox/cheftop', 'IndexController@unoxCheftop')
    ->name('unoxCheftop');
Route::get('unox/bakerlux', 'IndexController@unoxBakerlux')
    ->name('unoxBakerlux');
Route::get('unox/bakerlux-shop', 'IndexController@unoxBakerluxShop')
    ->name('unoxBakerluxShop');
Route::get('unox/bakerlux-speed-pro', 'IndexController@unoxBakerluxSpeedPro')
    ->name('unoxBakerluxSpeedPro');
Route::get('unox/evereo', 'IndexController@unoxEvereo')
    ->name('unoxEvereo');
Route::get('unox/speed-x', 'IndexController@unoxSpeedX')
    ->name('unoxSpeedX');

Route::get('galeria', 'GaleriaController@view')
	-> name('galeria');

Route::group(['prefix' => 'productos'], function () {
	Route::get('/', 'ProductCategoriesController@view')
		->name('productos');
	Route::get('{slug_category}', 'ProductCategoriesController@show')
		->name('productos-category-list');
	Route::get('{slug_category}/{slug_subcategory}', 'ProductSubcategoriesController@view')
		->name('productos-category');
	Route::get('{slug_category}/{slug_subcategory}/{slug_product}', 'ProductController@view')
		->name('productos-open');
});
Route::get('marcas/{brand}', 'ProductController@brands')
    -> name('brands');
Route::get('marcas/{brand}/{slug_category}', 'ProductController@brandsCategories')
    -> name('brands-categories');
Route::get('marcas/{brand}/{slug_category}/{slug_subcategory}', 'ProductController@brandsSubcategories')
    -> name('brands-subcategories');
Route::post('autocomplete', 'ProductController@autocomplete')
    -> name('autocomplete');
Route::post('search', 'ProductController@search')
	-> name('search');

Route::post('clientefind', 'CotizacionesController@find') 
	-> name('cotizaciones.find');
Route::post('addquote', 'CotizacionesController@add') 
	-> name('cotizaciones.add');
Route::post('removequote', 'CotizacionesController@remove') 
	-> name('cotizaciones.remove');
Route::post('updatequote', 'CotizacionesController@upd') 
	-> name('cotizaciones.upd');
Route::post('cotizacionstore', 'CotizacionesController@store') 
	-> name('cotizaciones.mail');

Route::get('resultados/{termino}', 'ProductController@results') 
	-> name('results');

Route::get('cotizar', 'CotizacionesController@view') 
	-> name('cotizar');

Route::group(['prefix' => 'blog'], function() {
	Route::get('/', 'BlogArticlesController@view')
		-> name('blog');
	Route::get('{slug_category}', 'BlogArticlesController@filter')
		-> name('blog-filter');
	Route::get('{slug_category}/{slug_article}', 'BlogArticlesController@show')
		-> name('blog-open');
});

Route::group(['prefix' => 'portafolio'], function() {
	Route::get('/', 'PortfolioController@view')
		-> name('portafolio');
	Route::get('{slug_portfolio}', 'PortfolioController@show')
		-> name('portfolio-open');
});

Route::group(['prefix' => 'promociones'], function() {
	Route::get('{slug_promocion}', 'PromocionesController@show')
		-> name('promociones');
	Route::get('{slug_promocion}/{slug_subcategory}', 'PromocionesController@subc')
		-> name('promociones.subc');
});

Route::get('contacto', 'IndexController@view')
	-> name('contacto');
Route::get('aviso-de-privacidad', 'IndexController@view')
	-> name('aviso-privacidad');

Route::post('coincidencias', 'ProductController@coincidencias')
	-> name('coincidencias');

/*
 *  DASHBOARD
*/
Route::group(['prefix' => 'dashboard'], function(){
	Auth::routes();

	Route::group(['middleware' => ['auth']], function () {
		Route::get('/', function(){
			return view('02_system.index');
		}) -> name('dashboard');

		Route::get('configuracion',         'ConfigController@view') -> name('config');
		Route::get('cambiar-contrasena',    'ChangePassController@edit') -> name('changepass');

		Route::resource('trim',             'TrimController');

		Route::resource('users', 'UsersController');
		Route::get('users/{id}/destroy',[
				'uses'  => 'UsersController@destroy'
			,   'as'    => 'users.destroy'
		]);
		Route::get('users/{id}/restore',[
				'uses'  => 'UsersController@restore'
			,   'as'    => 'users.restore'
		]);

		Route::resource('banner', 'BannerController');
		Route::get('banner/{id}/destroy', [
				'uses'  => 'BannerController@destroy'
			,   'as'    => 'banner.destroy'
		]);
		Route::get('banner/{id}/restore', [
				'uses'  => 'BannerController@restore'
			,   'as'    => 'banner.restore'
		]);

		Route::resource('gallery', 'GaleriaController');
		Route::get('gallery/{id}/destroy', [
				'uses'  => 'GaleriaController@destroy'
			,   'as'    => 'gallery.destroy'
		]);
		Route::get('gallery/{id}/restore', [
				'uses'  => 'GaleriaController@restore'
			,   'as'    => 'gallery.restore'
		]);

		Route::resource('blog-categories', 'BlogCategoriesController');
		Route::get('blog-categories/{id}/destroy', [
				'uses'  => 'BlogCategoriesController@destroy'
			,   'as'    => 'blog-categories.destroy'
		]);
		Route::get('blog-categories/{id}/restore', [
				'uses'  => 'BlogCategoriesController@restore'
			,   'as'    => 'blog-categories.restore'
		]);

		Route::resource('blog-articles', 'BlogArticlesController');
		Route::get('blog-articles/{id}/destroy', [
				'uses'  => 'BlogArticlesController@destroy'
			,   'as'    => 'blog-articles.destroy'
		]);
		Route::get('blog-articles/{id}/restore', [
				'uses'  => 'BlogArticlesController@restore'
			,   'as'    => 'blog-articles.restore'
		]);
		Route::get('blog-articles/{id}/trim', [
				'uses'  => 'BlogArticlesController@trim'
			,   'as'    => 'blog-articles.trim'
		]);

		Route::resource('product-categories', 'ProductCategoriesController');
		Route::get('product-categories/{id}/destroy', [
				'uses'  => 'ProductCategoriesController@destroy'
			,   'as'    => 'product-categories.destroy'
		]);
		Route::get('product-categories/{id}/restore', [
				'uses'  => 'ProductCategoriesController@restore'
			,   'as'    => 'product-categories.restore'
		]);
		Route::get('product-categories/{id}/trim', [
				'uses'  => 'ProductCategoriesController@trim'
			,   'as'    => 'product-categories.trim'
		]);

		Route::resource('product-subcategories', 'ProductSubcategoriesController');
		Route::get('product-subcategories/{id}/destroy', [
				'uses'  => 'ProductSubcategoriesController@destroy'
			,   'as'    => 'product-subcategories.destroy'
		]);
		Route::get('product-subcategories/{id}/restore', [
				'uses'  => 'ProductSubcategoriesController@restore'
			,   'as'    => 'product-subcategories.restore'
		]);

		Route::resource('product', 'ProductController');
		Route::get('product/{id}/destroy', [
				'uses'  => 'ProductController@destroy'
			,   'as'    => 'product.destroy'
		]);
		Route::get('product/{id}/restore', [
				'uses'  => 'ProductController@restore'
			,   'as'    => 'product.restore'
		]);
		Route::get('product/{id}/trim', [
				'uses'  => 'ProductController@trim'
			,   'as'    => 'product.trim'
		]);
		Route::get('product/{id}/addImages', [
				'uses'	=> 'ProductController@addImages'
			,	'as'	=> 'product.addImages'
		]);
		Route::post('product/{id}/addImagesStore',[
				'uses'  => 'ProductController@addImagesStore'
			,   'as'    => 'product.addImagesStore'
		]);
		Route::get('product/gallery/{id}/addImagesDelete',[
			'uses'  => 'ProductController@addImagesDelete'
		,   'as'    => 'product.addImagesDelete'
	]);
		Route::get('product/{t}/{c}/json', [
				'uses'  => 'ProductController@json'
			,   'as'    => 'product.json'
		]);
		Route::get('product-prices', [
				'uses'  => 'ProductController@pricechange'
			,   'as'    => 'product.pricechange'
		]);
		Route::post('product-prices/update',[
				'uses'  => 'ProductController@pricechangeUpdate'
			,   'as'    => 'product.pricechangeUpdate'
		]);
		Route::get('productos-descarga-csv', [
				'uses'	=> 'ProductController@downloadCsv'
			,	'as'	=> 'product.downloadcsv'
		]);
		Route::get('product-prices-csv', [
                'uses'  => 'ProductController@pricechangeCsv'
            ,   'as'    => 'product.pricechangeCsv'
        ]);
		Route::get('productos-template-csv', [
				'uses'	=> 'ProductController@downloadPricesTemplate'
			,	'as'	=> 'product.downloadPricesTemplate'
		]);
		Route::post('product-prices-csv/upload',[
				'uses'  => 'ProductController@uploadPricesTemplate'
			,   'as'    => 'product.uploadPricesTemplate'
		]);
        // Actualización masiva de productos
        Route::get('product-all-xlsx', [
                'uses'  => 'ProductController@allChangeXlsx'
            ,   'as'    => 'product.allChangeXlsx'
        ]);
        Route::get('productos-all-template-xlsx', [
                'uses'	=> 'ProductController@downloadProductsTemplate'
            ,	'as'	=> 'product.downloadAllTemplate'
        ]);
        Route::post('product-all-xlsx/upload',[
                'uses'  => 'ProductController@uploadProductsTemplate'
            ,   'as'    => 'product.uploadAllTemplate'
        ]);

		Route::resource('producto-destacado', 'ProductosDestacadosController');
		Route::get('producto-destacado/{id}/destroy', [
				'uses'	=> 'ProductosDestacadosController@destroy'
			,	'as'	=> 'producto-destacado.destroy'
		]);
		Route::post('producto-destacado/getSubcategories', 'ProductosDestacadosController@subcategories')
			-> name('producto-destacado.subcategories')
		;
		Route::post('producto-destacado/getBrands', 'ProductosDestacadosController@brands')
			-> name('producto-destacado.brands')
		;
		Route::post('producto-destacado/getProducts', 'ProductosDestacadosController@products')
			-> name('producto-destacado.products')
		;

		Route::resource('portfolio', 'PortfolioController');
		Route::get('portfolio/{id}/destroy', [
				'uses'  => 'PortfolioController@destroy'
			,   'as'    => 'portfolio.destroy'
		]);
		Route::get('portfolio/{id}/restore', [
				'uses'  => 'PortfolioController@restore'
			,   'as'    => 'portfolio.restore'
		]);
		Route::get('portfolio/{id}/trim', [
				'uses'  => 'PortfolioController@trim'
			,   'as'    => 'portfolio.trim'
		]);

		Route::resource('portfolio-images', 'PortfolioImagesController');
		Route::get('portfolio-images/{id}/destroy', [
				'uses'  => 'PortfolioImagesController@destroy'
			,   'as'    => 'portfolio-images.destroy'
		]);
		Route::get('portfolio-images/{id}/restore', [
				'uses'  => 'PortfolioImagesController@restore'
			,   'as'    => 'portfolio-images.restore'
		]);

		Route::resource('promociones', 'PromocionesController');
		Route::get('promociones/{id}/destroy',[
				'uses'  => 'PromocionesController@destroy'
			,   'as'    => 'promociones.destroy'
		]);
		Route::get('promociones/{id}/restore',[
				'uses'  => 'PromocionesController@restore'
			,   'as'    => 'promociones.restore'
		]);
		Route::get('promociones/{id}/add',[
				'uses'  => 'PromocionesController@add'
			,   'as'    => 'promociones.add'
		]);
		Route::post('promociones/{id}/addStore',[
				'uses'  => 'PromocionesController@addStore'
			,   'as'    => 'promociones.addStore'
		]);
		Route::get('promociones/{id}/remove/{prod}',[
				'uses'  => 'PromocionesController@remove'
			,   'as'    => 'promociones.remove'
		]);

		Route::resource('promociones-productos', 'PromocionesProductosController');
		Route::get('promociones-productos/{id}/destroy',[
				'uses'  => 'PromocionesProductosController@destroy'
			,   'as'    => 'promociones-productos.destroy'
		]);
		Route::get('promociones-productos/{id}/restore',[
				'uses'  => 'PromocionesProductosController@restore'
			,   'as'    => 'promociones-productos.restore'
		]);

		Route::resource('cotizaciones', 'Cotizaciones@Controller');
		//
	});
});