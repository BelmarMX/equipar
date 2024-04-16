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
        $banners = $this->viewBanners();
        $promos = $this->viewPromos();

        switch (Route::currentRouteName()) {
            case 'index':
                $articles = BlogArticles::select(
                    '*'
                    , 'blog_articles.id       AS idA'
                    , 'blog_articles.title    AS titleA'
                    , 'blog_articles.slug     AS slugA'
                    , 'blog_categories.id     AS idC'
                    , 'blog_categories.title  AS titleC'
                    , 'blog_categories.slug   AS slugC'
                )
                    ->join(
                        'blog_categories'
                        , 'blog_articles.category_id', '=', 'blog_categories.id'
                    )
                    ->orderBy('publish', 'DESC')
                    ->orderBy('idA', 'DESC')
                    ->where('publish', '<=', Carbon::now())
                    ->limit(3)
                    ->get();
                $related = ProductosDestacados::with('producto')
                    ->orderBy('created_at', 'DESC')
                    ->limit(4)
                    ->get();

                $featured = ProductCategories::where('title', 'LIKE', '%coccion%')
                    ->orWhere('title', 'LIKE', '%refrigeracion%')
                    ->orWhere('title', 'LIKE', '%acero inoxidable%')
                    ->orWhere('title', 'LIKE', '%utensilios%')
                    ->get();

                $meta['titulo'] = 'Equipamiento de cocinas industriales';
                $meta['descripcion'] = 'Servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina industrial; en tiempo competitivo, diseño eficaz y adaptación de presupuesto';
                $meta['imagen'] = url('storage/' . env('BANNER_FOLDER') . $banners->first()->image);
                return view('frontend_v2.index')
                    ->with([
                        'meta' => $meta
                        , 'banners' => $banners
                        , 'promos' => $promos
                        , 'articles' => $articles
                        , 'related' => $related
                        , 'featured' => $featured
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);

            case 'nosotros':
                $meta['titulo'] = 'Acerca de nosotros';
                $meta['descripcion'] = 'Servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina industrial; en tiempo competitivo, diseño eficaz y adaptación de presupuesto';
                $meta['imagen'] = url('storage/' . env('BANNER_FOLDER') . $banners->first()->image);
                return view('frontend_v2.nosotros')
                    ->with([
                        'meta' => $meta
                        , 'banners' => 0
                        , 'promos' => $promos
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);

            case 'proyectos':
                $meta['titulo'] = 'Proyectos para personas';
                $meta['descripcion'] = 'Manejamos las mejores marcas en el mercado, con precios competitivos para diseñar la cocina perfecta.';
                $meta['imagen'] = asset('images/template/bn-acerca-de.jpg');
                return view('frontend_v2.proyectos')
                    ->with([
                        'meta' => $meta
                        , 'banners' => 0
                        , 'promos' => $promos
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);

            case 'servicios':
                $meta['titulo'] = 'Servicios especializados';
                $meta['descripcion'] = 'Manejamos las mejores marcas en el mercado, con precios competitivos para diseñar la cocina perfecta.';
                $meta['imagen'] = asset('images/template/bn-acerca-de.jpg');
                return view('frontend_v2.servicios')
                    ->with([
                        'meta' => $meta
                        , 'banners' => 0
                        , 'promos' => $promos
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);

            case 'diseno-acero':
                $meta['titulo'] = 'Fabricación de muebles en acero inoxidable';
                $meta['descripcion'] = 'Creamos y diseñamos muebles de acero inoxidable a la medida, funcionales de acuerdo a tus necesidades..';
                $meta['imagen'] = asset('images/template/bn-acerca-de.jpg');
                return view('frontend_v2.diseno-acero')
                    ->with([
                        'meta' => $meta
                        , 'banners' => 0
                        , 'promos' => $promos
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);

            case 'contacto':
                $meta['titulo'] = 'Póngase en contacto con nosotros';
                $meta['descripcion'] = 'Comuníquese con nosotros para brindarle una mejor atención y cubrir los requerimientos de su empresa.';
                $meta['imagen'] = asset('images/template/bn-contactanos.jpg');
                return view('frontend_v2.contacto')
                    ->with([
                        'meta' => $meta
                        , 'banners' => 0
                        , 'promos' => $promos
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);

            case 'aviso-privacidad':
                $meta['titulo'] = 'Aviso de privacidad';
                $meta['descripcion'] = 'Consulte nuestro aviso de privacidad y la forma en la que utilizaremos los datos que usted nos proporcione.';
                $meta['imagen'] = asset('images/template/bn-aviso-privacidad.jpg');
                return view('frontend_v2.aviso-privacidad')
                    ->with([
                        'meta' => $meta
                        , 'banners' => 0
                        , 'promos' => $promos
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);

            case 'gracias':
                $meta['titulo'] = '¡Gracias por contactarnos!';
                $meta['descripcion'] = 'Hemos recibido con éxito tu información, en breve un miembro de nuestro equipo se pondrá en contacto contigo.';
                $meta['imagen'] = asset('images/template/bn-aviso-privacidad.jpg');
                return view('frontend_v2.gracias')
                    ->with([
                        'meta' => $meta
                        , 'banners' => 0
                        , 'promos' => $promos
                        , 'menu_cat' => $this->viewProducCategories()
                    ]);
        }
    }

    public function unox()
    {
        $productos          = Product::select('category_id')
            -> where('marca', 'LIKE', '%unox%')
            -> groupBy('category_id')
            -> get()
            -> toArray();
        $categories_id      = array_column($productos, 'category_id');
        $featured           = ProductCategories::whereIn('id', $categories_id)
            ->get();

        return view('frontend_v2.unox')
            -> with([
                'meta' => [
                        'titulo'        => 'Unox: Hornos Profesionales'
                    ,   'descripcion'   => 'Elija entre la mejor selección de productos y accesorios para crear la solución de cocina perfecta.'
                    ,   'imagen'        => asset('v2/images/unox/banner/1655129815233.webp')
                ]
                ,   'banners'   => 0
                ,   'promos'    => $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => $featured
            ]);
    }

    public function unoxBakertop()
    {
        return view('frontend_v2.unox-bakertop')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakertop MIND.Maps™ Plus | Unox'
                    ,   'descripcion'   => 'Hornos combinados inteligentes.'
                    ,   'imagen'        => asset('v2/images/unox/bakertop/bg-panadero.webp')
                ]
                ,   'banners'   => 0
                ,   'promos'    => $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => Product::search('Bakertop', 'UNOX')
            ]);
    }

    public function unoxCheftop()
    {
        return view('frontend_v2.unox-cheftop')
            -> with([
                'meta' => [
                        'titulo'        => 'Cheftop MIND.Maps™ Plus | Unox'
                    ,   'descripcion'   => 'Hornos mixtos profesionales.'
                    ,   'imagen'        => asset('v2/images/unox/banner/cheftop-chef.webp')
                ]
                , 'banners'     => 0
                , 'promos'      => $this -> viewPromos(FALSE)
                , 'menu_cat'    => $this -> viewProducCategories()
                , 'featured'    => Product::search('Cheftop', 'UNOX')
            ]);
    }

    public function unoxBakerlux()
    {
        return view('frontend_v2.unox-bakerlux')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakerlux™ | Unox'
                    ,   'descripcion'   => 'Hornos analógos de convección con humedad compacta.'
                    ,   'imagen'        => asset('v2/images/unox/bakerlux/bg-bakerlux.webp')
                ]
                ,   'banners'   => 0
                ,   'promos'    => $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => Product::search('Bakerlux', 'UNOX')
            ]);
    }

    public function unoxBakerluxShop()
    {
        return view('frontend_v2.unox-bakerlux-shop')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakerlux SHOP.Pro™ | Unox'
                    ,   'descripcion'   => 'Perfección inteligente que cuece.'
                    ,   'imagen'        => asset('v2/images/unox/bakerlux-shop/bg-bakerluxshop.webp')
                ]
                ,   'banners'   => 0
                ,   'promos'    => $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => Product::search('bakerlux%shop', 'UNOX')
            ]);
    }

    public function unoxBakerluxSpeedPro()
    {
        return view('frontend_v2.unox-bakerlux-speed-pro')
            -> with([
                'meta' => [
                        'titulo'        => 'Bakerlux SPEED.Pro™ | Unox'
                    ,   'descripcion'   => 'SPEED.Pro™ es el primer baking speed oven: horno de convección y horno de cocción acelerada juntos en un único equipo.'
                    ,   'imagen'        => asset('v2/images/unox/bakerlux-speed-pro/bg-speed-pro.webp')
                ]
                ,   'banners'   => 0
                ,   'promos'    => $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => Product::search('bakerlux%speed', 'UNOX')
            ]);
    }

    public function unoxEvereo()
    {
        return view('frontend_v2.unox-evereo')
            -> with([
                'meta' => [
                        'titulo'        => 'Evereo™ | Unox'
                    ,   'descripcion'   => 'Elija entre la mejor selección de productos y accesorios para crear la solución de cocina perfecta.'
                    ,   'imagen'        => asset('v2/images/unox/evereo/bg-evereo.webp')
                ]
                ,   'banners'   => 0
                ,   'promos'    => $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => Product::search('evereo', 'UNOX')
            ]);
    }

    public function unoxSpeedX()
    {
        return view('frontend_v2.unox-speed-x')
            -> with([
                'meta' => [
                        'titulo'        => 'Speed X™ | Unox'
                    ,   'descripcion'   => 'El primer horno combinado de cocción acelerada con lavado automático.'
                    ,   'imagen'        => asset('v2/images/unox/banner/1655129815233.webp')
                ]
                ,   'banners'   => 0
                ,   'promos'    => $this -> viewPromos(FALSE)
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'featured'  => Product::search('speed-x', 'UNOX')
            ]);
    }
}
