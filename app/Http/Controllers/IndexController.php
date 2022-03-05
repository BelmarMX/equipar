<?php
namespace App\Http\Controllers;

use Carbon\Carbon
,   Illuminate\Support\Facades\Route
;

use App\BlogArticles;
use App\Product;
use App\ProductosDestacados;

class IndexController extends Base
{
	public function view()
	{
		$banners    = $this -> viewBanners();
		$promos     = $this -> viewPromos();

		switch( Route::currentRouteName() )
		{
			case 'index':
				$articles   = BlogArticles::select(
							'*'
						,   'blog_articles.id       AS idA'
						,   'blog_articles.title    AS titleA'
						,   'blog_articles.slug     AS slugA'
						,   'blog_categories.id     AS idC'
						,   'blog_categories.title  AS titleC'
						,   'blog_categories.slug   AS slugC'
					)
					-> join(
							'blog_categories'
						,   'blog_articles.category_id', '=', 'blog_categories.id'
					)
					-> orderBy('publish', 'DESC')
					-> orderBy('idA', 'DESC')
					-> where('publish', '<=', Carbon::now() )
					-> limit(3)
					-> get()
				;
				$related	= ProductosDestacados::with('producto')
					-> orderBy('created_at', 'DESC')
                    -> limit(4)
					-> get();

				$meta['titulo']			= 'Equipamiento de cocinas industriales';
				$meta['descripcion']	= 'Servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina industrial; en tiempo competitivo, diseño eficaz y adaptación de presupuesto';
				$meta['imagen']			= url( 'storage/' . env('BANNER_FOLDER') . $banners -> first() -> image );
				return  view('frontend_v2.index')
                    -> with([
                            'meta'		=> $meta
                        ,   'banners'	=> $banners
                        ,   'promos'	=> $promos
                        ,   'articles'	=> $articles
                        ,   'related'	=> $related
                        ,   'menu_cat'  => $this -> viewProducCategories()
                    ]);

			case 'nosotros':
				$meta['titulo']         = 'Acerca de nosotros';
				$meta['descripcion']    = 'Servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina industrial; en tiempo competitivo, diseño eficaz y adaptación de presupuesto';
				$meta['imagen']         = url('storage/' . env('BANNER_FOLDER') . $banners->first()->image);
				return  view('frontend_v2.nosotros')
					->with([
							'meta'      => $meta
						,   'banners'   => 0
                        ,   'menu_cat'  => $this -> viewProducCategories()
					]);

			case 'proyectos':
				$meta['titulo']         = 'Proyectos para personas';
				$meta['descripcion']    = 'Manejamos las mejores marcas en el mercado, con precios competitivos para diseñar la cocina perfecta.';
				$meta['imagen']         = asset('images/template/bn-acerca-de.jpg');
				return  view('frontend_v2.proyectos')
					->with([
							'meta'      => $meta
						,   'banners'   => 0
                        ,   'menu_cat'  => $this -> viewProducCategories()
					]);

			case 'servicios':
				$meta['titulo']         = 'Servicios especializados';
				$meta['descripcion']    = 'Manejamos las mejores marcas en el mercado, con precios competitivos para diseñar la cocina perfecta.';
				$meta['imagen']         = asset('images/template/bn-acerca-de.jpg');
				return  view('frontend_v2.servicios')
					->with([
							'meta'      => $meta
						,   'banners'   => 0
                        ,   'menu_cat'  => $this -> viewProducCategories()
					]);

            case 'diseno-acero':
                $meta['titulo']         = 'Fabricación de muebles en acero inoxidable';
                $meta['descripcion']    = 'Creamos y diseñamos muebles de acero inoxidable a la medida, funcionales de acuerdo a tus necesidades..';
                $meta['imagen']         = asset('images/template/bn-acerca-de.jpg');
                return  view('frontend_v2.diseno-acero')
                    ->with([
                            'meta'      => $meta
                        ,   'banners'   => 0
                        ,   'menu_cat'  => $this -> viewProducCategories()
                    ]);

			case 'contacto':
				$meta['titulo']         = 'Póngase en contacto con nosotros';
				$meta['descripcion']    = 'Comuníquese con nosotros para brindarle una mejor atención y cubrir los requerimientos de su empresa.';
				$meta['imagen']         = asset('images/template/bn-contactanos.jpg');
				return  view('frontend_v2.contacto')
                    -> with([
                            'meta'      => $meta
                        ,   'banners'   => 0
                        ,   'menu_cat'  => $this -> viewProducCategories()
                    ]);

			case 'aviso-privacidad':
				$meta['titulo']         = 'Aviso de privacidad';
				$meta['descripcion']    = 'Consulte nuestro aviso de privacidad y la forma en la que utilizaremos los datos que usted nos proporcione.';
				$meta['imagen']         = asset('images/template/bn-aviso-privacidad.jpg');
				return  view('frontend_v2.aviso-privacidad')
                    -> with([
                            'meta'      => $meta
                        ,   'banners'   => 0
                        ,   'menu_cat'  => $this -> viewProducCategories()
                    ]);
		}
	}
}
