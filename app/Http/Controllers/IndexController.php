<?php
namespace App\Http\Controllers;

use Carbon\Carbon
,   Illuminate\Support\Facades\Route
;

use App\BlogArticles
,   App\Product
;

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
                    -> limit(4)
                    -> get()
                ;
                $related      = Product::select(
                        '*'
                    ,   'products.id                    AS idP'
                    ,   'products.title                 AS titleP'
                    ,   'products.slug                  AS slugP'
                    ,   'products.image                 AS imageP'
                    ,   'products.image_rx              AS image_rxP'
                    ,   'products_categories.id         AS idC'
                    ,   'products_categories.title      AS titleC'
                    ,   'products_categories.slug       AS slugC'
                    ,   'products_subcategories.id      AS idS'
                    ,   'products_subcategories.title   AS titleS'
                    ,   'products_subcategories.slug    AS slugS'
                )
                    -> join(
                            'products_categories'
                        ,   'products.category_id', '=', 'products_categories.id'
                    )
                    -> join(
                            'products_subcategories'
                        ,   'products.subcategory_id', '=', 'products_subcategories.id'
                    )
                    -> inRandomOrder()
                    -> limit(4)
                    -> get();
                $meta['titulo']         = 'Equipamiento de cocinas industriales';
                $meta['descripcion']    = 'Servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina industrial; en tiempo competitivo, diseño eficaz y adaptación de presupuesto';
                $meta['imagen']         = url( 'storage/' . env('BANNER_FOLDER') . $banners -> first() -> image );
                return  view('01_website.index')
                        -> with([
                                'meta'      => $meta
                            ,   'banners'   => $banners
                            ,   'promos'    => $promos
                            ,   'articles'  => $articles
                            ,   'related'   => $related
                        ]);
            break;

            case 'nosotros':
                $meta['titulo']         = 'Nosotros';
                $meta['descripcion']    = 'Servicios expertos y eficientes con capacidad para cubrir necesidades derivadas de la creación de una nueva cocina industrial; en tiempo competitivo, diseño eficaz y adaptación de presupuesto';
                $meta['imagen']         = url('storage/' . env('BANNER_FOLDER') . $banners->first()->image);
                return  view('01_website.nosotros')
                    ->with([
                            'meta'      => $meta
                        ,   'banners'   => 0
                    ]);
            break;

            case 'proyectos':
                $meta['titulo']         = 'Proyectos';
                $meta['descripcion']    = 'Manejamos las mejores marcas en el mercado, con precios competitivos para diseñar la cocina perfecta.';
                $meta['imagen']         = asset('images/template/bn-acerca-de.jpg');
                return  view('01_website.proyectos')
                    ->with([
                            'meta'      => $meta
                        ,   'banners'   => 0
                    ]);
            break;

            case 'servicios':
                $meta['titulo']         = 'Servicios';
                $meta['descripcion']    = 'Manejamos las mejores marcas en el mercado, con precios competitivos para diseñar la cocina perfecta.';
                $meta['imagen']         = asset('images/template/bn-acerca-de.jpg');
                return  view('01_website.servicios')
                    ->with([
                            'meta'      => $meta
                        ,   'banners'   => 0
                    ]);
            break;

            case 'contacto':
                $meta['titulo']         = 'Póngase en contacto con nosotros';
                $meta['descripcion']    = 'Comuníquese con nosotros para brindarle una mejor atención y cubrir los requerimientos de su empresa.';
                $meta['imagen']         = asset('images/template/bn-contactanos.jpg');
                return  view('01_website.contacto')
                        -> with([
                                'meta'      => $meta
                            ,   'banners'   => 0
                        ]);
            break;

            case 'aviso-privacidad':
                $meta['titulo']         = 'Aviso de privacidad';
                $meta['descripcion']    = 'Consulte nuestro aviso de privacidad y la forma en la que utilizaremos los datos que usted nos proporcione.';
                $meta['imagen']         = asset('images/template/bn-aviso-privacidad.jpg');
                return  view('01_website.aviso-privacidad')
                        -> with([
                                'meta'      => $meta
                            ,   'banners'   => 0
                        ]);
            break;
        }
    }
}
