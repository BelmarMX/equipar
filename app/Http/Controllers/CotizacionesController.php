<?php

namespace App\Http\Controllers;

use App\Cotizaciones
,   App\Clientes
,   App\Product
,   App\Promociones
,   App\PromocionesProductos;
use App\Mail\SendQuotations;
use DB
,   Carbon\Carbon
,   Illuminate\Http\Request
,   Illuminate\Support\Facades\Session
,   Illuminate\Support\Facades\Mail;

class CotizacionesController extends BaseDashboard
{
    public function __construct()
    {
        $this -> send       = array();
        $this -> recipent   = env('MAIL_RECEPTION');
    }

    public function view()
    {
        $promos     = $this -> viewPromos();

        $meta['titulo']         = 'Cotizador de productos';
        $meta['descripcion']    = 'Comuníquese con nosotros para brindarle una mejor atención y cubrir los requerimientos de su empresa.';
        $meta['imagen']         = asset('images/template/bn-contactanos.jpg');
        return  view('frontend_v2.cotizar')
                -> with([
                        'meta'      => $meta
                    ,   'banners'   => 0
                    ,   'promos'    => $promos
                    ,   'menu_cat'  => $this -> viewProducCategories()
                ]);
    }

    public function index()
    {}
    public function store(Request $request)
    {
        $this -> validate( $request, [
                'g-recaptcha-response' => 'required'
            ,   'email'     => 'required|email'
            ,   'nombre'    => 'required|string'
            ,   'phone'     => 'required|string'
            ,   'company'   => 'nullable|string'
            ,   'city'      => 'required|string'
            ,   'state'     => 'required|string'
            ,   'comments'  => 'nullable|string'
        ]);

        //re-captcha-vertify
        $re_url     = 'https://www.google.com/recaptcha/api/siteverify';
        $re_data       = array(
                'secret'    => env('CAPTCHA_SECRET')
            ,   'response'  => $request['g-recaptcha-response']
        );
        $re_query      = http_build_query($re_data);
        $re_options    = array(
            'http'  => array(
                    'header'    =>      "Content-Type: application/x-www-form-urlencoded\r\n"
                                    .   "Content-Length: ".strlen($re_query)."\r\n"
                                    .   "User-Agent:MyAgent/1.0\r\n"
                ,   'method'    => 'POST'
                ,   'content'   => $re_query
            )
        );
        $re_context         = stream_context_create($re_options);
        $re_verify          = file_get_contents($re_url, false, $re_context);
        $captcha_success    = json_decode($re_verify);
        if( $captcha_success -> success )
        {
            if($request -> exists > 0)
            {
                $cliente = Clientes::find($request -> exists);
            }
            else {
                $cliente = Clientes::create([
                        'nombre'    => $request -> nombre
                    ,   'email'     => $request -> email
                    ,   'phone'     => $request -> phone
                    ,   'company'   => $request -> company
                    ,   'city'      => $request -> city
                    ,   'state'     => $request -> state
                ]);
            }
            $cliente['comments'] = $request -> comments;
            $promocion = Promociones::where('start', '<=' , Carbon::now())
                -> where('end', '>=', Carbon::now())
                -> orderBy('id', 'DESC')
                -> first();

            foreach($request -> id AS $quote_id)
            {
                $producto = Product::join(
                            'products_categories'
                        ,   'products_categories.id','=','products.category_id'
                    )
                    -> join(
                            'products_subcategories'
                        ,   'products_subcategories.id','=','products.subcategory_id'
                    )
                    -> leftjoin('promociones_productos', function($join)
                    {
                        $promos    = Promociones::where('start', '<=' , Carbon::now())
                            -> where('end', '>=', Carbon::now())
                            -> orderBy('id', 'DESC')
                            -> first();
                        $promosID   = $promos -> id ?? 0;
                        $join -> on('producto_id', '=', 'products.id')
                            -> where('promocion_id', '=', $promosID);
                    })
                    -> select(
                            'products.title AS titleP'
                        ,   'products.slug AS slugP'
                        ,   'products.image_rx AS foto'
                        ,   'products.modelo'
                        ,   'products.marca'
                        ,   'products.precio'
                        ,   'products_categories.title AS titleC'
                        ,   'products_categories.slug AS slugC'
                        ,   'products_subcategories.title AS titleS'
                        ,   'products_subcategories.slug AS slugS'
                        ,   'promociones_productos.*'
                    )
                    -> where('products.id', '=', $quote_id)
                    -> first();
                $precio     = $producto -> final_price ?? $producto -> precio;
                $discount   = $producto -> final_price
                    ? percent($producto -> precio, $producto -> final_price)
                    : 0;
                $productos[] = array(
                        'title'             => $producto -> titleP
                    ,   'imagen'            => $producto -> foto
                    ,   'modelo'            => $producto -> modelo
                    ,   'marca'             => $producto -> marca
                    ,   'categoria'         => $producto -> titleC
                    ,   'subcategoria'      => $producto -> titleS
                    ,   'uri'               => 'https://equi-par.com/productos/'.$producto -> slugC .'/'.$producto -> slugS .'/'. $producto ->slugP
                    ,   'unitario'          => $producto -> precio
                    ,   'cantidad'          => $request -> qty[$quote_id][0]
                    ,   'unitario_promo'    => $producto -> final_price ?? 0
                    ,   'total'             => ($request -> qty[$quote_id][0] * $precio)
                    ,   'descuento'         => $discount
                );
            }
            Mail::to($request -> email, $request -> nombre)
                -> bcc( $this -> recipent )
                -> send( new SendQuotations($cliente, $promocion, $productos) );
            
            Session::forget('cotizacion');
            return redirect() -> route('gracias', ['referer' => 'contacto']);
        }
        else
        {
            $this -> send['type']       = 'danger';
            $this -> send['message']    = 'Todo indica que eres un robot';
        }

        return  back()
                -> with('alert', $this -> send);
    }

    public function find(Request $request)
    {
        $cliente = array();
        if( $entry = Clientes::where('email', '=', $request -> email) -> first() )
        {
            $cliente = array(
                    'id'        => $entry -> id
                ,   'nombre'    => $entry -> nombre
                ,   'phone'     => $entry -> phone
                ,   'company'   => $entry -> company
                ,   'city'      => $entry -> city
                ,   'state'     => $entry -> state
            );
        }
        return json_encode($cliente);
    }
    public function add(Request $request)
    {
        $entry = Product::leftJoin(
                'promociones_productos', function ($leftJoin)
                {
                    $promos     = $this -> viewPromos();
                    $promosID   = isset($promos -> id) ? $promos -> id : 0;
                    $leftJoin -> on('promociones_productos.producto_id','=','products.id')
                        -> where('promociones_productos.promocion_id', '=', $promosID );
                }
        )
            -> where('products.id', '=', $request -> id)
            -> first();
        
        $producto = array(
                'id'    => $entry -> id
            ,   'qty'   => 1
            ,   'name'  => $entry -> title
            ,   'price' => !empty($entry -> final_price) ? $entry -> final_price : $entry -> precio
        );

        Session::push('cotizacion', $producto);
    }

    public function remove(Request $request)
    {
        $quotes = Session::get('cotizacion');
        Session::forget('cotizacion');

        foreach($quotes AS $i => $quote)
        {
            if($i != $request -> index)
            {
                $producto = array(
                        'id'    => $quote['id']
                    ,   'qty'   => $quote['qty']
                    ,   'name'  => $quote['name']
                    ,   'price' => $quote['price']
                );
                Session::push('cotizacion', $producto);
            }
        }
    }
    public function upd(Request $request)
    {
        $quotes = Session::get('cotizacion');
        Session::forget('cotizacion');

        foreach($quotes AS $i => $quote)
        {
            if($i == $request -> index)
            {
                $producto = array(
                        'id'    => $quote['id']
                    ,   'qty'   => $request -> value
                    ,   'name'  => $quote['name']
                    ,   'price' => $quote['price']
                );
            }
            else {
                $producto = array(
                        'id'    => $quote['id']
                    ,   'qty'   => $quote['qty']
                    ,   'name'  => $quote['name']
                    ,   'price' => $quote['price']
                );
            }
            Session::push('cotizacion', $producto);
        }
    }
}
