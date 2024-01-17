<?php
namespace App\Http\Controllers;

use App\ProductCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
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

                $featured   = ProductCategories::where('title', 'LIKE', '%coccion%')
                    -> orWhere('title', 'LIKE', '%refrigeracion%')
                    -> orWhere('title', 'LIKE', '%acero inoxidable%')
                    -> orWhere('title', 'LIKE', '%utensilios%')
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
                        ,   'featured'  => $featured
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
                        ,   'promos'	=> $promos
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
                        ,   'promos'	=> $promos
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
                        ,   'promos'	=> $promos
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
                        ,   'promos'	=> $promos
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
                        ,   'promos'	=> $promos
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
                        ,   'promos'	=> $promos
                        ,   'menu_cat'  => $this -> viewProducCategories()
                    ]);
		}
	}

    public function unox()
    {
        $productos  = Product::select('category_id')
            -> where('marca', 'LIKE', '%unox%')
            -> groupBy('category_id')
        -> get()
        -> toArray();
        $categories_id = array_column($productos, 'category_id');
        $featured   = ProductCategories::whereIn('id', $categories_id)
            -> get();

        return view('frontend_v2.unox')
            -> with([
                    'meta' => [
                            'titulo'        => 'Unox: Hornos Profesionales'
                        ,   'descripcion'   => 'Elija entre la mejor selección de productos y accesorios para crear la solución de cocina perfecta.'
                        ,   'imagen'        => asset('images/template/bn-acerca-de.jpg')
                    ]
                ,   'banners'   => 0
                ,   'promos'	=> $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => $featured
            ]);
    }

    public function unoxBakertop()
    {
        route('results', ['termino' => 'Bakertop+Mind.Maps', 'filter' => 'y', 'brand' => 'UNOX']);

        $productos  = Product::select('category_id')
            -> where('marca', 'LIKE', '%unox%')
            -> groupBy('category_id')
            -> get()
            -> toArray();
        $categories_id = array_column($productos, 'category_id');
        $featured   = ProductCategories::whereIn('id', $categories_id)
            -> get();

        return view('frontend_v2.unox-bakertop')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakertop MIND.Maps™ Plus | Unox'
                    ,   'descripcion'   => 'Hornos combinados inteligentes.'
                    ,   'imagen'        => asset('images/template/bn-acerca-de.jpg')
                ]
            ,   'banners'   => 0
            ,   'promos'	=> $this -> viewPromos(FALSE)
            ,   'menu_cat'  => $this -> viewProducCategories()
            ,   'featured'  => $featured
        ]);
    }

    public function unoxCheftop()
    {
        return view('frontend_v2.unox-cheftop')
            -> with([
                'meta' => [
                        'titulo'        => 'Cheftop MIND.Maps™ Plus | Unox'
                    ,   'descripcion'   => 'Hornos mixtos profesionales.'
                    ,   'imagen'        => asset('images/template/bn-acerca-de.jpg')
                ]
            ,   'banners'   => 0
            ,   'promos'	=> $this -> viewPromos(FALSE)
            ,   'menu_cat'  => $this -> viewProducCategories()
            ,   'featured'  => $featured ?? []
        ]);
    }

    public function unoxBakerlux()
    {
        return view('frontend_v2.unox-bakerlux')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakerlux™ | Unox'
                    ,   'descripcion'   => 'Hornos analógos de convección con humedad compacta.'
                    ,   'imagen'        => asset('images/template/bn-acerca-de.jpg')
                ]
            ,   'banners'   => 0
            ,   'promos'	=> $this -> viewPromos(FALSE)
            ,   'menu_cat'  => $this -> viewProducCategories()
            ,   'featured'  => $featured ?? []
        ]);
    }

    public function unoxBakerluxShop()
    {
        return view('frontend_v2.unox')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakerlux SHOP.Pro™ | Unox'
                    ,   'descripcion'   => 'Elija entre la mejor selección de productos y accesorios para crear la solución de cocina perfecta.'
                    ,   'imagen'        => asset('images/template/bn-acerca-de.jpg')
                ]
            ,   'banners'   => 0
            ,   'promos'	=> $this -> viewPromos(FALSE)
            ,   'menu_cat'  => $this -> viewProducCategories()
            ,   'featured'  => $featured ?? []
        ]);
    }

    public function unoxBakerluxSpeedPro()
    {
        return view('frontend_v2.unox')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakerlux SPEED.Pro™ | Unox'
                    ,   'descripcion'   => 'Elija entre la mejor selección de productos y accesorios para crear la solución de cocina perfecta.'
                    ,   'imagen'        => asset('images/template/bn-acerca-de.jpg')
                ]
            ,   'banners'   => 0
            ,   'promos'	=> $this -> viewPromos(FALSE)
            ,   'menu_cat'  => $this -> viewProducCategories()
            ,   'featured'  => $featured ?? []
        ]);
    }

    public function unoxEvereo()
    {
        return view('frontend_v2.unox-evereo')
            -> with([
                'meta' => [
                        'titulo'        => 'Evereo™ | Unox'
                    ,   'descripcion'   => 'Elija entre la mejor selección de productos y accesorios para crear la solución de cocina perfecta.'
                    ,   'imagen'        => asset('images/template/bn-acerca-de.jpg')
                ]
            ,   'banners'   => 0
            ,   'promos'	=> $this -> viewPromos(FALSE)
            ,   'menu_cat'  => $this -> viewProducCategories()
            ,   'featured'  => $featured ?? []
        ]);
    }
}
