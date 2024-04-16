<?php
namespace App\Http\Controllers;

use App\ProductImages;
use Gate;
use Image;
use Batch;
use App\Product;
use Carbon\Carbon;
use App\ProductCategories;
use App\Promociones;
use Illuminate\Http\Request;
use App\ProductSubcategories;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;;
use Illuminate\Support\Facades\DB;
use Shuchkin\SimpleXLSX;
use Shuchkin\SimpleXLSXGen;

class ProductController extends BaseDashboard
{
    private $send;
    private $folder;
    private $width;
    private $height;
    private $width_rx;
    private $height_rx;
    private $max_size;

    public function __construct()
    {
        parent::__construct();
        $this->send = array();
        $this->folder = env('PRODUCT_FOLDER');
        $this->width = env('PRODUCT_WIDTH');
        $this->height = env('PRODUCT_HEIGHT');
        $this->width_rx = env('PRODUCT_RX_WIDTH');
        $this->height_rx = env('PRODUCT_RX_HEIGHT');
        $this->max_size = env('FILE_MAX_SIZE');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | View
    --- --- --- --- --- --- --- --- --- --- */
    public function view(Route $route, $slugC, $slugS, $slugP)
    {
        $banners            = $this->viewBanners();
        $promos             = $this->viewPromos();
        $entry              = Product::select(
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
            ->join(
                'products_categories'
                , 'products.category_id', '=', 'products_categories.id'
            )
            ->join(
                'products_subcategories'
                , 'products.subcategory_id', '=', 'products_subcategories.id'
            )
            ->leftjoin('promociones_productos', function ($join) {
                $promos = Promociones::where('start', '<=', Carbon::now())
                    ->where('end', '>=', Carbon::now())
                    ->orderBy('id', 'DESC')
                    ->first();
                $promosID = isset($promos->id) ? $promos->id : 0;
                $join->on('producto_id', '=', 'products.id')
                    ->where('promocion_id', '=', $promosID);
            })
            ->orderBy('idP', 'DESC')
            ->where('products.slug', '=', $slugP)
            ->first();

        $gallery            = ProductImages::where('producto_id', $entry->idP)->get();

        $category           = ProductCategories::where('slug', $slugC)->first();
        $subcategory        = ProductSubcategories::where('slug', $slugS)->first();
        $subcategories      = ProductSubcategories::where('category_id', $category->id)->orderBy('title', 'ASC')->get();

        $related            = Product::select(
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
                , 'products.category_id', '=', 'products_categories.id'
            )
            -> join(
                'products_subcategories'
                , 'products.subcategory_id', '=', 'products_subcategories.id'
            )
            -> leftjoin('promociones_productos', function ($join) {
                $promos = Promociones::where('start', '<=', Carbon::now())
                    ->where('end', '>=', Carbon::now())
                    ->orderBy('id', 'DESC')
                    ->first();
                $promosID = $promos->id ?? 0;
                $join->on('producto_id', '=', 'products.id')
                    ->where('promocion_id', '=', $promosID);
            })
            -> where('products_subcategories.id', $subcategory -> id)
            -> orWhere('products.title', 'LIKE', "%{$entry -> titleP}%")
            -> inRandomOrder()
            -> limit(4)
            -> get();
        /* SIDEBAR */
        $CC = ProductCategories::orderBy('title', 'ASC')
            ->get();
        $SS = ProductSubcategories::orderBy('category_id', 'ASC')
            ->orderBy('title', 'ASC')
            ->get();

        /* SIDEBAR */

        $meta['titulo']         = $entry->titleP . " | Modelo " . $entry->modelo;
        $meta['descripcion']    = $entry->resumen;
        $meta['imagen']         = url('storage/' . $this->folder . $entry->imageP);

        return view('frontend_v2.productos-open')
            ->with([
                    'meta'          => $meta
                ,   'banners'       => 0
                ,   'promos'        => $promos
                ,   'gallery'       => $gallery
                ,   'entry'         => $entry
                ,   'CC'            => $CC
                ,   'SS'            => $SS
                ,   'category'      => $category
                ,   'subcategory'   => $subcategory
                ,   'subcategories' => $subcategories
                ,   'related'       => $related
                ,   'menu_cat'      => $this->viewProducCategories()
            ]);
    }

    public function brands($brand)
    {
        $brand      = urldecode($brand);
        $promos     = $this->viewPromos();
        $entries    = Product::select(
            '*'
            , 'products.id                    AS idP'
            , 'products.title                 AS titleP'
            , 'products.slug                  AS slugP'
            , 'products.image                 AS imageP'
            , 'products.image_rx              AS image_rxP'
            , 'products_categories.id         AS idC'
            , 'products_categories.title      AS titleC'
            , 'products_categories.slug       AS slugC'
            , 'products_subcategories.id      AS idS'
            , 'products_subcategories.title   AS titleS'
            , 'products_subcategories.slug    AS slugS'
        )
            ->join(
                'products_categories'
                , 'products.category_id', '=', 'products_categories.id'
            )
            ->join(
                'products_subcategories'
                , 'products.subcategory_id', '=', 'products_subcategories.id'
            )
            ->leftjoin('promociones_productos', function ($join) {
                $promos = Promociones::where('start', '>=', Carbon::now()->startOfMonth())
                    ->where('end', '<=', Carbon::now()->endOfMonth())
                    ->orderBy('id', 'DESC')
                    ->first();
                $promosID = isset($promos->id) ? $promos->id : 0;
                $join->on('producto_id', '=', 'products.id')
                    ->where('promocion_id', '=', $promosID);
            })
            ->orderBy('idP', 'DESC')
            ->where('products.marca', 'LIKE', "%$brand%")
            ->paginate(12);

        $meta['titulo']         = "Productos de la marca " . ucfirst($brand);
        $meta['descripcion']    = "Listado de productos de la marca $brand";
        $meta['imagen']         = asset('v2/images/samples/banner.jpg');
        return view('frontend_v2.productos-marcas')
            ->with([
                    'meta'                      => $meta
                ,   'banners'                   => 0
                ,   'promos'                    => $promos
                ,   'brand'                     => ucfirst($brand)
                ,   'entries'                   => $entries
                ,   'menu_cat'                  => $this->viewProducCategories()
                ,   'related_categories'        => self::categoriesByBrand($brand)
                ,   'related_subcategories'     => []
            ]);
    }

    public function brandsCategories($brand, $slug_category)
    {
        $brand  = urldecode($brand);
        $promos = $this -> viewPromos();
        $entry  = Product::select(
            '*'
            , 'products.id                    AS idP'
            , 'products.title                 AS titleP'
            , 'products.slug                  AS slugP'
            , 'products.image                 AS imageP'
            , 'products.image_rx              AS image_rxP'
            , 'products_categories.id         AS idC'
            , 'products_categories.title      AS titleC'
            , 'products_categories.slug       AS slugC'
            , 'products_subcategories.id      AS idS'
            , 'products_subcategories.title   AS titleS'
            , 'products_subcategories.slug    AS slugS'
        )
            -> join(
                    'products_categories'
                ,   'products.category_id', '=', 'products_categories.id'
            )
            -> join(
                    'products_subcategories'
                ,   'products.subcategory_id', '=', 'products_subcategories.id'
            )
            -> leftjoin('promociones_productos', function ($join) {
                $promos = Promociones::where('start', '>=', Carbon::now()->startOfMonth())
                    ->where('end', '<=', Carbon::now()->endOfMonth())
                    ->orderBy('id', 'DESC')
                    ->first();
                $promosID = isset($promos->id) ? $promos->id : 0;
                $join->on('producto_id', '=', 'products.id')
                    ->where('promocion_id', '=', $promosID);
            })
            -> orderBy('idP', 'DESC')
            -> where('products.marca', 'LIKE', "%$brand%")
            -> where('products_categories.slug', $slug_category)
            -> paginate(12);


        $meta['titulo'] = "Productos de la marca " . ucfirst($brand);
        $meta['descripcion'] = "Listado de productos de la marca $brand";
        $meta['imagen'] = asset('v2/images/samples/banner.jpg');
        return view('frontend_v2.productos-marcas')
            -> with([
                    'meta'      => $meta
                ,   'banners'   => 0
                ,   'promos'    => $promos
                ,   'brand'     => ucfirst($brand)
                ,   'entries'   => $entry
                ,   'menu_cat'  => $this -> viewProducCategories()
                ,   'related_categories'        => self::categoriesByBrand($brand)
                ,   'related_subcategories'     => []
            ]);
    }

    public function brandsSubcategories($brand, $slug_category, $slug_subcategory)
    {
        $brand  = urldecode($brand);
        $promos = $this -> viewPromos();
        $entry  = Product::select(
            '*'
            , 'products.id                    AS idP'
            , 'products.title                 AS titleP'
            , 'products.slug                  AS slugP'
            , 'products.image                 AS imageP'
            , 'products.image_rx              AS image_rxP'
            , 'products_categories.id         AS idC'
            , 'products_categories.title      AS titleC'
            , 'products_categories.slug       AS slugC'
            , 'products_subcategories.id      AS idS'
            , 'products_subcategories.title   AS titleS'
            , 'products_subcategories.slug    AS slugS'
        )
            -> join(
                    'products_categories'
                ,   'products.category_id', '=', 'products_categories.id'
            )
            -> join(
                    'products_subcategories'
                ,   'products.subcategory_id', '=', 'products_subcategories.id'
            )
            -> leftjoin('promociones_productos', function ($join) {
                $promos = Promociones::where('start', '>=', Carbon::now()->startOfMonth())
                    ->where('end', '<=', Carbon::now()->endOfMonth())
                    ->orderBy('id', 'DESC')
                    ->first();
                $promosID = isset($promos->id) ? $promos->id : 0;
                $join->on('producto_id', '=', 'products.id')
                    ->where('promocion_id', '=', $promosID);
            })
            -> orderBy('idP', 'DESC')
            -> where('products.marca', 'LIKE', "%$brand%")
            -> where('products_categories.slug', $slug_category)
            -> where('products_subcategories.slug', $slug_subcategory)
            -> paginate(12);


        $meta['titulo'] = "Productos de la marca " . ucfirst($brand);
        $meta['descripcion'] = "Listado de productos de la marca $brand";
        $meta['imagen'] = asset('v2/images/samples/banner.jpg');
        return view('frontend_v2.productos-marcas')
            -> with([
                    'meta'                      => $meta
                ,   'banners'                   => 0
                ,   'promos'                    => $promos
                ,   'brand'                     => ucfirst($brand)
                ,   'entries'                   => $entry
                ,   'menu_cat'                  => $this -> viewProducCategories()
                ,   'related_categories'        => self::categoriesByBrand($brand)
                ,   'related_subcategories'     => []
            ]);
    }

    public function brandsModelo($brand, $slug_category, $slug_subcategory, $slug_model)
    {
        $brand  = urldecode($brand);
        $promos = $this -> viewPromos();
        $entry  = Product::select(
            '*'
            , 'products.id                    AS idP'
            , 'products.title                 AS titleP'
            , 'products.slug                  AS slugP'
            , 'products.image                 AS imageP'
            , 'products.image_rx              AS image_rxP'
            , 'products_categories.id         AS idC'
            , 'products_categories.title      AS titleC'
            , 'products_categories.slug       AS slugC'
            , 'products_subcategories.id      AS idS'
            , 'products_subcategories.title   AS titleS'
            , 'products_subcategories.slug    AS slugS'
        )
            -> join(
                    'products_categories'
                ,   'products.category_id', '=', 'products_categories.id'
            )
            -> join(
                    'products_subcategories'
                ,   'products.subcategory_id', '=', 'products_subcategories.id'
            )
            -> leftjoin('promociones_productos', function ($join) {
                $promos = Promociones::where('start', '>=', Carbon::now()->startOfMonth())
                    ->where('end', '<=', Carbon::now()->endOfMonth())
                    ->orderBy('id', 'DESC')
                    ->first();
                $promosID = isset($promos->id) ? $promos->id : 0;
                $join->on('producto_id', '=', 'products.id')
                    ->where('promocion_id', '=', $promosID);
            })
            -> orderBy('idP', 'DESC')
            -> where('products.marca', 'LIKE', "%$brand%")
            -> where('products_categories.slug', $slug_category)
            -> where('products_subcategories.slug', $slug_subcategory)
            -> where('slug', $slug_model)
            -> paginate(12);


        $meta['titulo'] = "Productos de la marca " . ucfirst($brand);
        $meta['descripcion'] = "Listado de productos de la marca $brand";
        $meta['imagen'] = asset('v2/images/samples/banner.jpg');
        return view('frontend_v2.productos-marcas')
            -> with([
                    'meta'                      => $meta
                ,   'banners'                   => 0
                ,   'promos'                    => $promos
                ,   'brand'                     => ucfirst($brand)
                ,   'entries'                   => $entry
                ,   'menu_cat'                  => $this -> viewProducCategories()
                ,   'related_categories'        => self::categoriesByBrand($brand)
                ,   'related_subcategories'     => []
            ]);
    }

    public static function categoriesByBrand($brand)
    {
        return ProductCategories::select('title', 'slug')
            -> whereIn('id', function($query) use ($brand){
                $query -> select('category_id')
                    -> from('products')
                    -> where(DB::raw("TRIM(LOWER(marca))"), $brand)
                    -> distinct();
            })
            -> get();
    }
	/* --- --- --- --- --- --- --- --- --- ---
	| Search
	--- --- --- --- --- --- --- --- --- --- */
    public function autocomplete(Request $request)
    {
        if( empty($request['query']) )
        {
            return;
        }

        $productos = Product::where('title', 'LIKE', '%'.$request['query'].'%')
            -> orWhere('modelo', 'LIKE', '%'.$request['query'].'%')
            -> orWhere('marca', 'LIKE', '%'.$request['query'].'%')
            -> whereNotNull('deleted_at')
            -> leftjoin('promociones_productos', function($join)
            {
                $promos    = Promociones::where('start', '<=' , Carbon::now())
                    -> where('end', '>=', Carbon::now())
                    -> orderBy('id', 'DESC')
                    -> first();
                $promosID   = isset($promos -> id) ? $promos -> id : 0;
                $join -> on('producto_id', '=', 'products.id')
                    -> where('promocion_id', '=', $promosID);
            })
            -> with(['category', 'subcategory'])
            -> orderBy('modelo')
            -> distinct()
            -> get();

        $return = [];
        foreach($productos AS $producto)
        {
           $return[] = [
                    'id'            => $producto -> id
                ,   'slug'          => $producto -> slug
                ,   'name'          => $producto -> title
                ,   'title'         => $producto -> title
                ,   'category'      => $producto -> category -> title ?? ''
                ,   'subcategory'   => $producto -> subcategory -> title ?? ''
                ,   'brand'         => $producto -> marca
                ,   'price'         => $producto -> precio
                ,   'final_price'   => $producto -> final_price
                ,   'discount'      => percent($producto -> precio, $producto -> final_price ?? $producto -> precio)
                ,   'image'         => url('storage/productos/'.$producto -> image_rx)
            ];
        }

        return response() -> json($return);
    }

	public function search(Request $search)
	{
		$term = urlencode($search -> search[0]);
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
				$promos    = Promociones::where('start', '<=' , Carbon::now())
                    -> where('end', '>=', Carbon::now())
					-> orderBy('id', 'DESC')
					-> first();
				$promosID   = isset($promos -> id) ? $promos -> id : 0;
				$join -> on('producto_id', '=', 'products.id')
					-> where('promocion_id', '=', $promosID);
			}
		);
		$entries -> whereRaw("(
		    products.title LIKE '%$search%' OR
		    products.slug LIKE '%$search%' OR
		    products.modelo LIKE '%$search%' OR
		    products.marca LIKE '%$search%' OR
		    products_categories.title LIKE '%$search%' OR
		    products_subcategories.title LIKE '%$search%'
		)");

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
		foreach( $Everything -> sortBy('marca') AS $e => $entry )
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

        $categories = ProductCategories::orderBy('title', 'ASC')
            ->get();

		return  view('frontend_v2.productos-search')
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
                ,   'menu_cat'      => $this -> viewProducCategories()
                ,   'categories'    => $categories
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

		return  view('frontend_v2.productos')
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

		return  view('frontend_v2.productos-open')
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
	| AddImages
	--- --- --- --- --- --- --- --- --- --- */
	public function addImages($id)
	{
		if (Gate::allows('users.edit'))
		{
			$entry = Product::with('images') -> where('id', $id) -> first();

			return view('02_system.05_product.addImages')
				-> with('entry', $entry);
		}
		return view('02_system.unauthorized');
	}
	public function addImagesStore($id, Request $request)
	{
		$entry = Product::find($id);
		
		$c = 0;
		foreach( $request -> file('images') AS $file)
		{
			echo 'yes we are in foreach';
			$time		= time();
			$original	= $file -> getClientOriginalName();
			//$ext		= pathinfo($original, PATHINFO_EXTENSION);
			$ext		= $file -> getClientOriginalExtension();
			$file_name	= $entry -> slug . '-' . $time . '-galstock' . $c . '.' . $ext;
			$thumb_name = $entry -> slug . '-' . $time . '-galstock' . $c . '-thumbnail.' . $ext;

			if ($id = ProductImages::create([
					'producto_id'		=> $entry -> id
				,	'image'				=> $file_name
				,	'image_rx'			=> $thumb_name
			])) {
				$ffile	= Image::make($file);
				$thumb	= Image::make($file)
					-> fit(545, 545);

				Storage::put('public/' . $this -> folder . $file_name, $ffile->stream());
				Storage::put('public/' . $this -> folder . $thumb_name, $thumb->stream());

				$c++;
				$this -> send['type']		= 'alert-success';
				$this -> send['message']	= $c . ' Registro(s) guardados(s) con éxito.';
			} else {
				$this -> send['type']		= 'alert-danger';
				$this -> send['message']	= 'Ocurrió un error al guardar el registro.';
			}
		}

		return back()
			-> with('alert', $this -> send);
	}
	public function addImagesDelete($id)
	{
		if (Gate::allows('users.destroy')) {
			$entry = ProductImages::find($id);

			if ($entry->delete()) {
				$this->send['type']       = 'alert-success';
				$this->send['message']    = 'Registro eliminado con éxito.';
			} else {
				$this->send['type']       = 'alert-danger';
				$this->send['message']    = 'Ocurrió un error al eliminar el registro.';
			}

			return back()
				-> with('alert', $this -> send);
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

	public function downloadCsv()
	{
		if(Gate::allows('users.index'))
		{
			$productos = Product::select(
						'products.id'
					,	'products.modelo'
					,	'products.marca'
					,	'products_categories.title AS categoria'
					,	'products_subcategories.title AS subcategoria'
					,	'products.title AS producto'
					,	'products.resumen'
					,	'products.caracteristicas'
					,	'products.tecnica'
					,	'products.precio'
					,	DB::raw("CONCAT('https://www.equi-par.com/storage/productos/', products.image) AS link_imagen")
					,	DB::raw("CONCAT('https://www.equi-par.com/productos/', products_categories.slug, '/', products_subcategories.slug, '/', products.slug) AS link_producto")
					,	'products.created_at'
					,	'products.updated_at'
				)
				-> join(
						'products_categories'
					,   'products_categories.id', '=', 'products.category_id'
				)
				-> join(
						'products_subcategories'
					,   'products_subcategories.id', '=', 'products.subcategory_id'
				)
				-> get();

			$file_name	= "equipar_productos_export_csv_".date('Y_m_d_H_i_s').".csv";
			$headers	= [
					'Content-Encoding'		=> "UTF-8"
				,	'Content-type'			=> "text/csv; charset=UTF-8"
				,	'Content-Disposition'	=> "attachment; filename=$file_name"
				,	'Pragma'				=> "no-cache"
				,	'Cache-Control'			=> "must-revalidate, post-check=0, pre-check=0"
				,	'Expires'				=> "0"
			];
			$columns	= ["ID", "MODELO", "MARCA", "CATEGORIA", "SUBCATEGORIA", "PRODUCTO", "DESCRIPCION", "CARACTERISTICAS", "DIMENSIONES", "PRECIO", "IMAGEN", "LINK", "FECHA_CREACION", "FECHA_ACTUALIZACION"];
			$callback	= function() use($productos, $columns)
			{
				$file = fopen('php://output', 'w');
				fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
				fputcsv($file, $columns);
				foreach($productos AS $producto)
				{
					fputcsv($file, [
							$producto -> id
						,	$producto -> modelo
						,	$producto -> marca
						,	$producto -> categoria
						,	$producto -> subcategoria
						,	$producto -> producto
						,	$producto -> resumen
						,	$producto -> caracteristicas
						,	str_replace(["\r", "\n"], ["", " "], html_entity_decode(strip_tags($producto -> tecnica)))
						,	$producto -> precio
						,	$producto -> link_imagen
						,	$producto -> link_producto
						,	$producto -> created_at
						,	$producto -> updated_at
					]);
				}
				fclose($file);
			};
			
			return response() -> stream($callback, 200, $headers);
		}
	}

	public function downloadTemplate()
	{
		if(Gate::allows('users.index'))
		{
			$productos = Product::select(
						'products.id'
					,	'products.modelo'
					,	'products.marca'
					,	'products.title AS producto'
					,	'products.precio'
				)
				-> get();

			$file_name	= "equipar_productos_price_update_csv_".date('Y_m_d_H_i_s').".csv";
			$headers	= [
					'Content-Encoding'		=> "UTF-8"
				,	'Content-type'			=> "text/csv; charset=UTF-8"
				,	'Content-Disposition'	=> "attachment; filename=$file_name"
				,	'Pragma'				=> "no-cache"
				,	'Cache-Control'			=> "must-revalidate, post-check=0, pre-check=0"
				,	'Expires'				=> "0"
			];
			$columns	= ["ID", "MODELO", "MARCA", "PRODUCTO", "PRECIO"];
			$callback	= function() use($productos, $columns)
			{
				$file = fopen('php://output', 'w');
				fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
				fputcsv($file, $columns);
				foreach($productos AS $producto)
				{
					fputcsv($file, [
							$producto -> id
						,	$producto -> modelo
						,	$producto -> marca
						,	$producto -> producto
						,	$producto -> precio
					]);
				}
				fclose($file);
			};
			
			return response() -> stream($callback, 200, $headers);
		}
	}

	public function pricechangeCsv()
	{
		if (Gate::allows('users.index')) {
			return  view('02_system.05_product.prices-csv');
		}
	}

	public function downloadPricesTemplate()
	{
		if(Gate::allows('users.index'))
		{
			$productos = Product::select(
						'products.id'
					,	'products.modelo'
					,	'products.marca'
					,	'products.title AS producto'
					,	'products.precio'
				)
				-> get();

			$file_name	= "equipar_productos_price_update_csv_".date('Y_m_d_H_i_s').".csv";
			$headers	= [
					'Content-Encoding'		=> "UTF-8"
				,	'Content-type'			=> "text/csv; charset=UTF-8"
				,	'Content-Disposition'	=> "attachment; filename=$file_name"
				,	'Pragma'				=> "no-cache"
				,	'Cache-Control'			=> "must-revalidate, post-check=0, pre-check=0"
				,	'Expires'				=> "0"
			];
			$columns	= ["ID", "MODELO", "MARCA", "PRODUCTO", "PRECIO"];
			$callback	= function() use($productos, $columns)
			{
				$file = fopen('php://output', 'w');
				fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
				fputcsv($file, $columns);
				foreach($productos AS $producto)
				{
					fputcsv($file, [
							$producto -> id
						,	$producto -> modelo
						,	$producto -> marca
						,	$producto -> producto
						,	$producto -> precio
					]);
				}
				fclose($file);
			};
			
			return response() -> stream($callback, 200, $headers);
		}
	}

	public function uploadPricesTemplate(Request $request)
	{
		if(Gate::allows('users.edit'))
		{
			if( $request -> file('csv') && $request -> file('csv') -> getClientOriginalExtension() === 'csv' )
			{
				$csv_file = $request -> file('csv') -> getRealPath();
				
				$saved = 0;
				if( ($handle = fopen($csv_file, 'r')) !== FALSE )
				{
					while( ($row = fgetcsv($handle)) !== FALSE )
					{
						if( !empty($row[0]) && is_numeric($row[0]) &&
                            !empty($row[4]) && is_numeric($row[4])
                        ){
							$saved++;
							$id		= $row[0];
							$price	= $row[4];

							$producto = Product::find($id);
                            if( !$producto )
                            {
                                continue;
                            }
							$producto -> precio = $price;
							$producto -> save();
						}
					}

					if( $saved > 0 )
					{
						$this -> send = [
								'type'		=> 'alert-success'
							,	'message'	=> "Se actualizaron $saved productos con éxito."
						];
					}
					else
					{
						$this -> send = [
								'type'		=> 'alert-danger'
							,	'message'	=> 'Ningún precio fue actualizado, asegurate de cargar un archivo CSV válido.'
						];
					}
				}
				else
				{
					$this -> send = [
							'type'		=> 'alert-danger'
						,	'message'	=> 'El archivo cargado no se pudo leer.'
					];
				}

			}
			else
			{
				$this -> send = [
						'type'		=> 'alert-danger'
					,	'message'	=> 'Debes cargar un archivo CSV válido.'
				];
			}
			
			return  back()
				->with('alert', $this -> send);
		}
	}

    public function allChangeXlsx()
    {
        if (Gate::allows('users.index')) {
            return  view('02_system.05_product.all-xlsx');
        }
    }

    public function downloadProductsTemplate()
    {
        if(Gate::allows('users.index'))
        {
            $productos = Product::all();
            $file_name	= "equipar_productos_all_update_xlsx_".date('Y_m_d_H_i_s').".xlsx";
            $body   = [];
            $body[] = ["ID", "CAT_ID", "SUB_ID", "TITULO", "SLUG", "MODELO", "MARCA", "RESUMEN", "CARACTERISTICAS", "TECNICA", "PRECIO", "IMAGEN", "IMG_MINIATURA", "FICHA", "CREACION"];
            foreach($productos AS $producto)
            {
                $body[] = [
                        $producto -> id
                    ,	$producto -> category_id
                    ,	$producto -> subcategory_id
                    ,	$producto -> title
                    ,	$producto -> slug
                    ,	$producto -> modelo
                    ,	$producto -> marca
                    //,	preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $producto -> resumen)
                    ,	$producto -> resumen
                    //,	preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $producto -> caracteristicas)
                    ,	$producto -> caracteristicas
                    //,	preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $producto -> tecnica)
                    ,	$producto -> tecnica
                    ,	$producto -> precio
                    ,	$producto -> image
                    ,	$producto -> image_rx
                    ,	$producto -> ficha
                    ,	Carbon::parse($producto -> created_at) -> format('d/m/Y H:i')
                ];
            }

            $xlsx = SimpleXLSXGen::fromArray( $body );
            $xlsx -> downloadAs( $file_name );
        }
    }

    public function uploadProductsTemplate(Request $request)
    {
        if(Gate::allows('users.edit'))
        {
            if( $request -> file('xlsx') && $request -> file('xlsx') -> getClientOriginalExtension() === 'xlsx' )
            {
                $xlsx_file = $request -> file('xlsx') -> getRealPath();

                if( $xlsx = SimpleXLSX::parse($xlsx_file) )
                {
                    $producto   = new Product;
                    $updates    = [];
                    $error      = [];

                    foreach($xlsx -> rows() AS $i => $row)
                    {
                        if( $i == 0 )
                        {
                            continue;
                        }
                        if( !empty($row[0]) && !empty($row[6]) && !empty($row[10]) )
                        {
                            $updates[] = [
                                    'id'                => $row[0]
                                ,   'title'             => $row[3]
                                ,   'slug'              => $row[4]
                                ,   'modelo'            => $row[5]
                                ,   'marca'             => $row[6]
                                ,   'resumen'           => nl2br($row[7])
                                ,   'caracteristicas'   => nl2br($row[8])
                                ,   'tecnica'           => nl2br($row[9])
                                ,   'precio'            => $row[10]
                            ];
                        }
                        else{
                            $f = $i + 1;
                            $error[] = "Fila $f no tiene ID, marca o precio";
                        }
                    }

                    if($saved = Batch::update($producto, $updates, 'id') )
                    {
                        $alert = 'alert-success';
                        if( $error )
                        {
                            $alert = 'alert-warning';
                        }

                        $this -> send = [
                                'type'		=> $alert
                            ,	'message'	=> "Se actualizaron $saved productos con éxito. " . implode(", ", $error)
                        ];
                    }
                    else
                    {
                        $this -> send = [
                                'type'		=> 'alert-danger'
                            ,	'message'	=> 'Ningún precio fue actualizado, asegurate de cargar un archivo XLSX válido.'
                        ];
                    }
                }
                else
                {
                    $this -> send = [
                            'type'		=> 'alert-danger'
                        ,	'message'	=> SimpleXLSX::parseError()
                    ];
                }
            }
            else
            {
                $this -> send = [
                        'type'		=> 'alert-danger'
                    ,	'message'	=> 'Debes cargar un archivo XLSX válido.'
                ];
            }

            return  back()
                ->with('alert', $this -> send);
        }
    }

	public function coincidencias(Request $request)
	{
		$like = $request -> phrase;
		$entry = Product::select(
				'products.title                 AS titleP'
			,	'products.slug                  AS slugP'
			,	'products_categories.title      AS titleC'
			,	'products_categories.slug       AS slugC'
			,	'products_subcategories.title   AS titleS'
			,	'products_subcategories.slug    AS slugS'
			,	DB::raw("CONCAT(' [', products_categories.title, ' / ', products_subcategories.title, '] ', products.title) AS text")
			,	DB::raw("CONCAT('https://www.equi-par.com/productos/', products_categories.slug, '/', products_subcategories.slug, '/', products.slug) AS link")
		)
		-> join(
				'products_categories'
			,   'products.category_id', '=', 'products_categories.id'
		)
		-> join(
				'products_subcategories'
			,   'products.subcategory_id', '=', 'products_subcategories.id'
		)
		-> orderBy('titleP', 'ASC')
		-> where('products.title', 'LIKE', "%$like%")
		-> orWhere('products_categories.title', 'LIKE', "%$like%")
		-> orWhere('products_subcategories.title', 'LIKE', "%$like%")
		-> get();

		return json_encode($entry);
	}
}
