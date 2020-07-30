<?php
namespace App\Http\Controllers;
use Gate
,   Image
,   Batch
,   DB
,   App\Product
,   Carbon\Carbon
,   App\ProductCategories
,   App\Promociones
,   Illuminate\Http\Request
,   App\ProductSubcategories
,   Illuminate\Routing\Route
,   Illuminate\Support\Facades\File
,   Illuminate\Support\Facades\Input
,   Illuminate\Support\Facades\Storage;

class ProductController extends BaseDashboard
{
    private $folder;
    private $width;
    private $height;
    private $width_rx;
    private $height_rx;
    private $max_size;

    public function __construct()
    {
        parent::__construct();
        $this -> folder     = env('PRODUCT_FOLDER');
        $this -> width      = env('PRODUCT_WIDTH');
        $this -> height     = env('PRODUCT_HEIGHT');
        $this -> width_rx   = env('PRODUCT_RX_WIDTH');
        $this -> height_rx  = env('PRODUCT_RX_HEIGHT');
        $this -> max_size   = env('FILE_MAX_SIZE');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | View
    --- --- --- --- --- --- --- --- --- --- */
    public function view(Route $route, $slugC, $slugS, $slugP)
    {
        $banners    = $this->viewBanners();
        $promos     = $this -> viewPromos();
        $entry      = Product::select(
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
            -> leftjoin('promociones_productos', function($join)
            {
                $promos     = Promociones::where('start', '>=' , Carbon::now()->startOfMonth())
                    -> where('end', '<=', Carbon::now()->endOfMonth())
                    -> orderBy('id', 'DESC')
                    -> first();
                $promosID   = isset($promos -> id) ? $promos -> id : 0;
                $join -> on('producto_id', '=', 'products.id')
                    -> where('promocion_id', '=', $promosID);
            })
            -> orderBy('idP', 'DESC')
            -> where('products.slug', '=', $slugP)
            -> first();

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
            -> leftjoin('promociones_productos', function($join)
            {
                $promos    = Promociones::where('start', '>=' , Carbon::now()->startOfMonth())
                    -> where('end', '<=', Carbon::now()->endOfMonth())
                    -> orderBy('id', 'DESC')
                    -> first();
                $promosID   = isset($promos -> id) ? $promos -> id : 0;
                $join -> on('producto_id', '=', 'products.id')
                    -> where('promocion_id', '=', $promosID);
            })
            -> inRandomOrder()
            -> limit(5)
            -> get();
        /* SIDEBAR */
        $CC = ProductCategories::orderBy('title', 'ASC')
            -> get();
        $SS = ProductSubcategories::orderBy('category_id', 'ASC')
            -> orderBy('title', 'ASC')
            -> get();
        $subcategories  = ProductSubcategories::orderBy('title', 'ASC') -> get();
        /* SIDEBAR */

        $meta['titulo']         = $entry -> titleP . " | Modelo " . $entry -> modelo;
        $meta['descripcion']    = $entry -> resumen;
        $meta['imagen']         = url('storage/' . $this -> folder . $entry -> imageP);

        return  view('01_website.productos-open')
            ->with([
                    'meta'      => $meta
                ,   'banners'   => 0
                ,   'promos'    => $promos
                ,   'entry'     => $entry
                ,   'CC'        => $CC
                ,   'SS'        => $SS
                ,   'subcategories' => $subcategories
                ,   'related'   => $related
            ]);
    }
    /* --- --- --- --- --- --- --- --- --- ---
    | Search
    --- --- --- --- --- --- --- --- --- --- */
    public function search(Request $search)
    {
        $term = urlencode($search -> search);
        return redirect() -> route('results', $term);
    }
    public function results($search){
        $promos     = $this -> viewPromos();
        $search     = urldecode($search);

        DB::enableQueryLog();
        $entries = (new Product) -> newQuery();
        $entries -> select(
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
        ) -> join(
                    'products_categories'
                ,   'products.category_id', '=', 'products_categories.id'
            )
            -> join(
                    'products_subcategories'
                ,   'products.subcategory_id', '=', 'products_subcategories.id'
            )
            -> leftjoin('promociones_productos', function($join)
            {
                $promos    = Promociones::where('start', '>=' , Carbon::now()->startOfMonth())
                    -> where('end', '<=', Carbon::now()->endOfMonth())
                    -> orderBy('id', 'DESC')
                    -> first();
                $promosID   = isset($promos -> id) ? $promos -> id : 0;
                $join -> on('producto_id', '=', 'products.id')
                    -> where('promocion_id', '=', $promosID);
            }
        );
        $entries -> whereRaw("(products.title LIKE '%$search%' OR products.modelo LIKE '%$search%' OR products.marca LIKE '%$search%' OR products_categories.title LIKE '%$search%' OR products_subcategories.title LIKE '%$search%')");
        $Everything = $entries -> get();

        if( isset($_GET['brand']) && !empty($_GET['brand']) )
        {
            $entries -> where('products.marca', $_GET['brand']);
        }
        if( isset($_GET['category']) && !empty($_GET['category']) )
        {
            $entries -> where('products_categories.slug', $_GET['category']);
        }

        if( isset($_GET['promotion']) && !empty($_GET['promotion']) )
        {
            if( $_GET['promotion'] == 'y' )
            {
                $entries -> where('promociones_productos.final_price', '>', 0);
            }
            else
            {
                $entries -> where('promociones_productos.final_price', NULL);
            }
        }
        
        if( isset($_GET['orderby']) && !empty($_GET['orderby']) )
        {
            if( $_GET['orderby'] == 'az' )
            {
                $entries -> orderBy('products.title', 'ASC');
            }
            elseif( $_GET['orderby'] == 'za' )
            {
                $entries -> orderBy('products.title', 'DESC');
            }
            elseif( $_GET['orderby'] == 'min' )
            {
                //$entries -> orderBy('promociones_productos.final_price', 'ASC');
                $entries -> orderBy('products.precio', 'ASC');
            }
            elseif( $_GET['orderby'] == 'max' )
            {
                //$entries -> orderBy('promociones_productos.final_price', 'DESC');
                $entries -> orderBy('products.precio', 'DESC');
            }
        }
        else
        {
            $entries -> orderBy('idP', 'DESC');
        }

        $entries = $entries -> get();

        $getCategories  = array();
        $getCategoriesT  = array();
        $getBrands      = array();
        foreach( $Everything AS $e => $entry )
        {
            if( !in_array($entry -> slugC, $getCategories) )
            {
                $getCategories[]    = $entry -> slugC;
                $getCategoriesT[]    = $entry -> titleC;
            }
            if( !in_array($entry -> marca, $getBrands) )
            {
                $getBrands[]        = $entry -> marca;
            }
        }
        /*echo '<small>';
        print_r(DB::getQueryLog());
        echo '</small>';*/
        //dd($entries);

        /* SIDEBAR */
        $CC = ProductCategories::orderBy('id', 'ASC')
            ->orderBy('title', 'ASC')
            ->get();
        $SS = ProductSubcategories::orderBy('category_id', 'ASC')
            ->orderBy('title', 'ASC')
            ->get();
        /* SIDEBAR */

        $meta['titulo']         = "Resultados de la búsqueda: " . $search;
        $meta['descripcion']    = "Resultados de la búsqueda de productos";
        $meta['imagen']         = asset('images/template/mn-productos.jpg');

        return  view('01_website.productos-search')
            ->with([
                    'meta'      => $meta
                ,   'banners'   => 0
                ,   'promos'    => $promos
                ,   'search'    => $search
                ,   'entries'   => $entries
                ,   'CC'        => $CC
                ,   'SS'        => $SS
                ,   'getCC'     => $getCategories
                ,   'tCC'       => $getCategoriesT
                ,   'getBrands' => $getBrands
            ]);
    }
    public function filter($slug)
    {
        $banners    = $this->viewBanners();
        $categories = ProductCategories::orderBy('title', 'ASC')
            ->get();
        $articles   = Product::select(
            '*',
            'blog_articles.id       AS idA',
            'blog_articles.title    AS titleA',
            'blog_articles.slug     AS slugA',
            'blog_categories.id     AS idC',
            'blog_categories.title  AS titleC',
            'blog_categories.slug   AS slugC'
        )
            ->join(
                'blog_categories',
                'blog_articles.category_id',
                '=',
                'blog_categories.id'
            )
            ->orderBy('publish', 'DESC')
            ->orderBy('idA', 'DESC')
            ->where('publish', '<=', Carbon::now())
            ->where('blog_categories.slug', '=', $slug)
            ->paginate(10);

        $meta['titulo']         = 'Articulos del blog en la categoría X';
        $meta['descripcion']    = 'Descubra aquí nuevas noticias y tips para llevar una excelente alimentación en su espacio de trabajo.';
        $meta['imagen']         = asset('images/template/blog.jpg');

        return  view('01_website.productos')
            ->with([
                'meta'          => $meta,   'banners'       => $banners,   'categories'    => $categories,   'articles'      => $articles
            ]);
    }
    public function show($slug_category, $slug_article)
    {
        $categories = ProductCategories::orderBy('title', 'ASC')
            ->get();
        $subcategories = ProductSubcategories::orderBy('title', 'ASC')
            ->get();
        $article    = Product::select(
            '*',
            'blog_articles.id       AS idA',
            'blog_articles.title    AS titleA',
            'blog_articles.slug     AS slugA',
            'blog_categories.id     AS idC',
            'blog_categories.title  AS titleC',
            'blog_categories.slug   AS slugC'
        )
            ->join(
                'blog_categories',
                'blog_articles.category_id',
                '=',
                'blog_categories.id'
            )
            ->orderBy('publish', 'DESC')
            ->orderBy('idA', 'DESC')
            ->where('publish', '<=', Carbon::now())
            ->where('blog_categories.slug', '=', $slug_category)
            ->where('blog_articles.slug', '=', $slug_article)
            ->first();

        $meta['titulo']         = $article->titleA;
        $meta['descripcion']    = $article->shortdesc;
        $meta['imagen']         = url('storage/' . $this->folder . $article->image);

        return  view('01_website.productos-open')
            ->with([
                    'meta'          => $meta
                ,   'banners'       => 0
                ,   'categories'    => $categories
                ,   'subcategories' => $subcategories
                ,   'article'       => $article
            ]);
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Index
    --- --- --- --- --- --- --- --- --- --- */
    public function index()
    {
        if (Gate::allows('users.index')) {
            
            if( isset($_GET['search']) )
            {
                $search = $_GET['search'];
                $entries    = Product::withTrashed()
                -> where('title', 'LIKE', '%' . $search . '%')
                -> orWhere('modelo', 'LIKE', '%' . $search . '%')
                -> orWhere('marca', 'LIKE', '%' . $search . '%')
                -> orderBy('id', 'DESC')
                -> paginate(100);
            }
            else
            {
                $entries    = Product::withTrashed()
                ->orderBy('id', 'DESC')
                ->paginate(100);
            }
            $categories = ProductCategories::orderBy('id', 'ASC')
                ->get();
            $subcategories = ProductSubcategories::orderBy('id', 'ASC')
                ->get();
            $category   = array();
            foreach ($categories as $value) {
                $category[$value->id] = $value->title;
            }
            $subcategory   = array();
            foreach ($subcategories as $value) {
                $subcategory[$value->id] = $value->title;
            }

            return  view('02_system.05_product.index')
                ->with([
                        'entries'       => $entries
                    ,   'category'      => $category
                    ,   'subcategory'   => $subcategory
                    ,   'month'         => $this->months
                ]);
        }
        return view('02_system.unauthorized');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Create
    --- --- --- --- --- --- --- --- --- --- */
    public function create()
    {
        if (Gate::allows('users.create')) {
            $categories     = ProductCategories::orderBy('title', 'ASC')
                ->get();
            $subcategories  = ProductSubcategories::orderBy('title', 'ASC')
                ->get();

            if( count($categories) == 0 ){
                return view('02_system.isVoid')
                    -> with([ 'actions' => [
                            'Tienes que dar de alta una categoría'
                        ,   'Tienes que dar de alta una subcategoría'
                        ]
                    ]);
            }
            if (count($subcategories) == 0) {
                return view('02_system.isVoid')
                    ->with([
                        'actions' => [
                            'Tienes que dar de alta una subcategoría'
                        ]
                    ]);
            }

            return  view('02_system.05_product.create')
                ->with([
                    'categories'    => $categories
                ]);
        }
        return view('02_system.unauthorized');
    }
    public function store(Request $request)
    {
        if (Gate::allows('users.create')) {
            // Validate
            $request['slug']    = str_slug($request->title);
            $this->validate($request, [
                    'category_id'       => 'required|int|exists:products_categories,id'
                ,   'subcategory_id'    => 'required|int|exists:products_subcategories,id'
                ,   'title'             => 'required|string'
                ,   'slug'              => 'required|string|unique:products'
                ,   'modelo'            => 'required|string'
                ,   'marca'             => 'nullable|string'
                ,   'image'             => 'required|file|image|mimes:jpeg,jpg,png|max:' . $this->max_size . '|dimensions:min_width=' . $this->width . ',min_height=' . $this->height
                ,   'image_rx'          => 'nullable'
                ,   'resumen'           => 'required|string'
                ,   'caracteristicas'   => 'nullable'
                ,   'tecnica'           => 'nullable'
                ,   'ficha'             => 'nullable|file|mimes:pdf|max:4096'
                ,   'precio'            => 'nullable'
            ]);

            $time       = time();
            $original   = request() -> file('image') -> getClientOriginalName();
            $ext        = pathinfo($original, PATHINFO_EXTENSION);
            $file_name  = $request -> slug . '-' . $time . '.' . $ext;
            $thumb_name = $request -> slug . '-' . $time . '-thumbnail.' . $ext;
            //ficha
            if(Input::hasFile('ficha')) {
                $F_original   = request() -> file('ficha') -> getClientOriginalName();
                $F_ext        = pathinfo($F_original, PATHINFO_EXTENSION);
                $F_file_name  = $request -> slug . '-' . $time . '.' . $F_ext;
            }
            else {
                $F_file_name  = NULL;
            }

            // Create
            if ($id = Product::create([
                    'category_id'       => $request -> category_id
                ,   'subcategory_id'    => $request -> subcategory_id
                ,   'title'             => $request -> title
                ,   'slug'              => $request -> slug
                ,   'modelo'            => $request -> modelo
                ,   'marca'             => $request -> marca
                ,   'image'             => $file_name
                ,   'image_rx'          => $thumb_name
                ,   'resumen'           => $request -> resumen
                ,   'caracteristicas'   => $request -> caracteristicas
                ,   'tecnica'           => $request -> tecnica
                ,   'ficha'             => $F_file_name
                ,   'precio'            => $request -> precio
            ])) {
                $file   = Image::make($request->file('image'));
                Storage::put('public/' . $this -> folder . $file_name, $file->stream());
                //ficha
                if(Input::hasFile('ficha')) {
                    Storage::put('public/' . $this -> folder . 'fichas/' . $F_file_name, File::get($request -> ficha));
                }

                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro guardado con éxito.';
                return  redirect()
                    ->route('product.trim', $id)
                    ->with('alert', $this->send);
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al guardar el registro.';

                return  back()
                    ->withInput()
                    ->with('alert', $this->send);
            }

            return  back()
                ->with('alert', $this->send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Update
    --- --- --- --- --- --- --- --- --- --- */
    public function edit($id)
    {
        if (Gate::allows('users.edit')) {
            $entry          = Product::find($id);
            $categories     = ProductCategories::orderBy('title', 'ASC')
                -> get();
            $subcategories  = ProductSubcategories::orderBy('title', 'ASC')
                -> where('category_id', '=', $entry -> category_id)
                -> get();

            return  view('02_system.05_product.edit')
                -> with([
                        'entry'         => $entry
                    ,   'categories'    => $categories
                    ,   'subcategories' => $subcategories
                    ,   'id'            => $id
                ]);
        }
        return view('02_system.unauthorized');
    }
    public function update(Request $request, $id)
    {
        if (Gate::allows('users.edit')) {
            // Validate
            $request['slug']    = str_slug($request->title);
            $this->validate($request, [
                    'category_id'       => 'required|int|exists:products_categories,id'
                ,   'subcategory_id'    => 'required|int|exists:products_subcategories,id'
                ,   'title'             => 'required|string'
                ,   'slug'              => 'required|string|unique:products,slug,' . $id
                ,   'modelo'            => 'required|string'
                ,   'marca'             => 'nullable|string'
                ,   'image'             => 'nullable|file|image|mimes:jpeg,jpg,png|max:' . $this->max_size . '|dimensions:min_width=' . $this->width . ',min_height=' . $this->height
                ,   'image_rx'          => 'nullable'
                ,   'resumen'           => 'required|string'
                ,   'caracteristicas'   => 'nullable'
                ,   'tecnica'           => 'nullable'
                ,   'ficha'             => 'nullable|file|mimes:pdf|max:4096'
                ,   'precio'            => 'nullable'
            ]);

            // Update
            $entry = Product::find($id);
            $entry -> category_id       = $request -> category_id;
            $entry -> subcategory_id    = $request -> subcategory_id;
            $entry -> title             = $request -> title;
            $entry -> slug              = $request -> slug;
            $entry -> modelo            = $request -> modelo;
            $entry -> marca             = $request -> marca;
            if (Input::hasFile('image')) {
                $original               = request()->file('image')->getClientOriginalName();
                $ext                    = pathinfo($original, PATHINFO_EXTENSION);
                $tmp_image              = $entry->image;
                $tmp_image_rx           = $entry->image_rx;
                $entry->image           = $request->slug . '-' . time() . '.' . $ext;
                $entry->image_rx        = $request->slug . '-' . time() . '-thumbnail.' . $ext;
            }
            $entry->resumen             = $request->resumen;
            $entry->caracteristicas     = $request->caracteristicas;
            $entry->tecnica             = $request->tecnica;
            if (Input::hasFile('ficha')) {
                $F_original             = request()->file('ficha')->getClientOriginalName();
                $F_ext                  = pathinfo($F_original, PATHINFO_EXTENSION);
                $tmp_ficha              = $entry -> ficha;
                $entry -> ficha         = $request -> slug . '-' . time() . '.' . $F_ext;
            }
            $entry->precio              = $request->precio;

            if ($entry->save()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro editado con éxito.';

                if(Input::hasFile('ficha')) {
                    if( !empty($tmp_ficha) )
                    {
                        Storage::delete([
                            'public/' . $this -> folder . 'fichas/' . $tmp_ficha
                        ]);
                    }
                    Storage::put('public/' . $this -> folder . 'fichas/' . $entry -> ficha, File::get($request -> ficha));
                }
                if(Input::hasFile('image')) {
                    $file   = Image::make($request->file('image'));
                    Storage::delete([
                            'public/' . $this -> folder . $tmp_image
                        ,   'public/' . $this -> folder . $tmp_image_rx
                    ]);
                    Storage::put('public/' . $this->folder . $entry->image, $file->stream());

                    return  redirect()
                        ->route('product.trim', $id)
                        ->with('alert', $this->send);
                }
                return  redirect()
                    ->route('product.index')
                    ->with('alert', $this->send);
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al editar el registro.';

                return  back()
                    ->withInput()
                    ->with('alert', $this->send);
            }

            return  redirect()
                ->route('product.index')
                ->with('alert', $this->send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Destroy
    --- --- --- --- --- --- --- --- --- --- */
    public function destroy($id)
    {
        if (Gate::allows('users.destroy')) {
            $entry = Product::find($id);

            if ($entry->delete()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro eliminado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al eliminar el registro.';
            }

            return  redirect()
                ->route('product.index')
                ->with('alert', $this->send);
        }
        return view('02_system.unauthorized');
    }
    public function restore($id)
    {
        if (Gate::allows('users.destroy')) {
            if (Product::withTrashed()->where('id', $id)->restore()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro restaurado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al restaurar el registro.';
            }

            return  redirect()
                ->route('product.index')
                ->with('alert', $this->send);
        }
        return view('02_system.unauthorized');
    }
    /* --- --- --- --- --- --- --- --- --- ---
    | Trim
    --- --- --- --- --- --- --- --- --- --- */
    public function trim($id)
    {
        if (Gate::allows('users.trim')) {
            $entry      = Product::find($id);
            $image      = url('storage/' . $this->folder . $entry->image);
            list($width, $height) = getimagesize($image);

            $opciones = array(
                    'tipo'          => 'product'
                ,   'id'            => $entry -> id
                ,   'ruta'          => $image
                ,   'width'         => $width
                ,   'height'        => $height
                ,   'cut_width'     => $this->width_rx
                ,   'cut_height'    => $this->height_rx
            );
            return view('02_system.trimmer')->with('opciones', $opciones);
        }
        return view('02_system.unauthorized');
    }
    /* --- --- --- --- --- --- --- --- --- ---
    | Json
    --- --- --- --- --- --- --- --- --- --- */
    public function json($t, $c)
    {
        switch ($t)
        {
            case 'categories':
                $r = ProductSubcategories::where('category_id', $c)
                    -> get();
            break;
        }
        $rj = json_encode($r);
        return $rj;
    }

    public function pricechange()
    {
        if (Gate::allows('users.index')) {
            
            $brandlist  = Product::select('marca') -> groupBy('marca') -> get();
            $entries = array();

            if( isset($_GET['marca']) && $_GET['marca'] != '*ALL*' )
            {
                $entries = Product::join(
                        'products_categories'
                    ,   'products_categories.id', '=', 'products.category_id'
                )
                -> join(
                        'products_subcategories'
                    ,   'products_subcategories.id', '=', 'products.subcategory_id')
                -> select(
                    '*'
                ,   'products.id                    AS idP'
                ,   'products.title                 AS titleP'
                ,   'products.image                 AS imageP'
                ,   'products.image_rx              AS image_rxP'
                ,   'products_categories.title      AS titleC'
                ,   'products_subcategories.title   AS titleS'
            )
                -> orderBy('idP', 'DESC')
                -> where('marca', 'LIKE', "%".$_GET['marca']."%")
                -> get();
            }

            return  view('02_system.05_product.prices')
                ->with([
                        'brands'    => $brandlist
                    ,   'entries'   => $entries
                ]);
        }
    }
    public function pricechangeUpdate(Request $request)
    {
        $producto = new Product;
        $updates = array();
        foreach($request -> idProd AS $k)
        {
            if($request -> precioPromo[$k] > 0)
            {
                /*Product::where('id', '=', $k)
                    -> update(['precio', request -> precioPromo[$k]]);*/
                $updates[] = [
                    'id'        => $k
                ,   'precio'    => $request -> precioPromo[$k]
                ];
            }
        }

        if( Batch::update($producto, $updates, 'id') )
            {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Precios actualizados con éxito.';
            }
            else
            {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Algunos precios no se pudieron actualizar.';
                
            }
            return  back()
                ->with('alert', $this->send);
    }
}
