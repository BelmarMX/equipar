<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use App\Product;
use Carbon\Carbon;
use App\Promociones;
use App\ProductCategories;
use Illuminate\Http\Request;

use App\ProductSubcategories;
use App\PromocionesProductos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ProductCategoriesController extends BaseDashboard
{
    private $send;

    public function __construct()
    {
        parent::__construct();
        $this->send       = array();
        $this->folder     = env('PRODUCT_CAT_FOLDER');
        $this->width      = env('PRODUCT_CAT_WIDTH');
        $this->height     = env('PRODUCT_CAT_HEIGHT');
        $this->width_rx   = env('PRODUCT_CAT_RX_WIDTH');
        $this->height_rx  = env('PRODUCT_CAT_RX_HEIGHT');
        $this->max_size   = env('FILE_MAX_SIZE');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | View
    --- --- --- --- --- --- --- --- --- --- */
    public function view()
    {
        $banners        = $this->viewBanners();
        $promos         = $this -> viewPromos();
        $categories     = ProductCategories::orderBy('id', 'ASC')
            -> get();
        $subcategories  = ProductSubcategories::orderBy('category_id', 'ASC')
            -> orderBy('title', 'ASC') 
            -> get();

        $meta['titulo']         = 'Somos proveedores';
        $meta['descripcion']    = 'Manejamos las mejores marcas en el mercado, con precios competitivos para diseñar la cocina perfecta.';
        $meta['imagen']         = asset('images/template/bn-acerca-de.jpg');
        return view('frontend_v2.productos')
            -> with([
                    'meta'          => $meta
                ,   'banners'       => 0
                ,   'promos'        => $promos
                ,   'categories'    => $categories
                ,   'subcategories' => $subcategories
                ,   'menu_cat'  => $this -> viewProducCategories()
            ]);
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Show
    --- --- --- --- --- --- --- --- --- --- */
    public function show( $slug )
    {
        $banners    = $this->viewBanners();
        $promos         = $this -> viewPromos();
        $category       = ProductCategories::where('slug', $slug) -> first();
        $CC = ProductCategories::orderBy('id', 'ASC')
            -> where('id', '!=', $category -> id)
            -> orderBy('title', 'ASC')
            -> get();
        $SS = ProductSubcategories::orderBy('category_id', 'ASC')
            -> orderBy('title', 'ASC')
            -> get();
        $subcategories  = ProductSubcategories::where('category_id', $category -> id)
            -> orderBy('title', 'ASC')-> get();
        $entries    = Product::select(
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
            -> where('products_categories.slug', '=', $slug)
            -> paginate(18);

        $meta['titulo']         = $category -> title;
        $meta['descripcion']    = 'Listado de productos perteneciente a la categoría: ' . $category -> title;
        $meta['imagen']         = url('storage/' . $this -> folder . $category -> imageP);
        return view('frontend_v2.productos-categorias-listado')
            -> with([
                    'meta'          => $meta
                ,   'banners'       => 0
                ,   'promos'        => $promos
                ,   'CC'            => $CC
                ,   'SS'            => $SS
                ,   'category'      => $category
                ,   'subcategories' => $subcategories
                ,   'entries'       => $entries
                ,   'menu_cat'  => $this -> viewProducCategories()
            ]);
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Index
    --- --- --- --- --- --- --- --- --- --- */
    public function index()
    {
        if (Gate::allows('users.index')) {
            $entries    = ProductCategories::withTrashed()
                ->orderBy('id', 'DESC')
                ->paginate(100);

            return  view('02_system.05_product-categories.index')
                ->with([
                    'entries'   => $entries,   'month'     => $this->months
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
            return view('02_system.05_product-categories.create');
        }
        return view('02_system.unauthorized');
    }
    public function store(Request $request)
    {
        if (Gate::allows('users.create')) {
            // Validate
            $request['slug']    = str_slug($request->title);
            $this->validate($request, [
                    'title'     => 'required|string'
                ,   'slug'      => 'required|unique:blog_categories|string'
                ,   'image'     => 'required|file|image|mimes:jpeg,jpg,png|max:' . $this->max_size . '|dimensions:min_width=' . $this-> width_rx . ',min_height=' . $this->height_rx
                ,   'image_rx'  => 'nullable'
            ]);

            $time       = time();
            $original   = request()->file('image')->getClientOriginalName();
            $ext        = pathinfo($original, PATHINFO_EXTENSION);
            $file_name  = $request->slug . '-' . time() . '-' . $time . '.' . $ext;
            $thumb_name = $request->slug . '-' . time() . '-' . $time . '-thumbnail.' . $ext;

            // Create
            if ($id = ProductCategories::create([
                    'title'         => $request -> title
                ,   'slug'          => $request -> slug
                ,   'image'         => $file_name
                ,   'image_rx'      => $thumb_name
            ])) {
                $file   = Image::make($request->file('image'));
                Storage::put('public/' . $this->folder . $file_name, $file->stream());

                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro guardado con éxito.';

                return  redirect()
                    ->route('product-categories.trim', $id)
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
            $entry = ProductCategories::find($id);
            return  view('02_system.05_product-categories.edit')
                ->with([
                        'entry' => $entry
                    ,   'id'    => $id
                ]);
        }
        return view('02_system.unauthorized');
    }
    public function update(Request $request, $id)
    {
        if (Gate::allows('users.edit')) {
            // Validate
            $request['slug']    = str_slug($request->title);
            $this -> validate($request, [
                    'title'     => 'required|string'
                ,   'slug'      => 'required|unique:blog_categories,slug,' . $id . '|string'
                ,   'image'     => 'nullable|file|image|mimes:jpeg,jpg,png|max:' . $this->max_size . '|dimensions:min_width=' . $this->width . ',min_height=' . $this->height
                ,   'image_rx'  => 'nullable'
            ]);

            // Update
            $entry          = ProductCategories::find($id);
            $entry -> title = $request -> title;
            $entry -> slug  = $request -> slug;

            if (Input::hasFile('image')) {
                $original           = request()->file('image')->getClientOriginalName();
                $ext                = pathinfo($original, PATHINFO_EXTENSION);
                $tmp_image          = $entry->image;
                $tmp_image_rx       = $entry->image_rx;
                $entry -> image     = $request->slug . '-' . time() . '.' . $ext;
                $entry -> image_rx  = $request->slug . '-' . time() . '-thumbnail.' . $ext;
            }

            if ($entry -> save()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro editado con éxito.';

                if (Input::hasFile('image')) {
                    $file   = Image::make($request->file('image'));
                    Storage::delete([
                            'public/' . $this->folder . $tmp_image
                        ,   'public/' . $this->folder . $tmp_image_rx
                    ]);
                    Storage::put('public/' . $this->folder . $entry->image, $file->stream());

                    return  redirect()
                        ->route('product-categories.trim', $id)
                        ->with('alert', $this->send);
                }
                return  redirect()
                    ->route('product-categories.index')
                    ->with('alert', $this->send);
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al editar el registro.';

                return  back()
                    ->withInput()
                    ->with('alert', $this->send);
            }

            return  redirect()
                ->route('blog-categories.index')
                ->with('alert', $this->send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Destroy
    --- --- --- --- --- --- --- --- --- --- */
    public function destroy($id)
    {
        if (Gate::allows('users.destroy')) {
            $entry = ProductCategories::find($id);

            if ($entry->delete()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro eliminado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al eliminar el registro.';
            }

            return  redirect()
                ->route('product-categories.index')
                ->with('alert', $this->send);
        }
        return view('02_system.unauthorized');
    }
    public function restore($id)
    {
        if (Gate::allows('users.destroy')) {
            if (ProductCategories::withTrashed()->where('id', $id)->restore()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro restaurado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al restaurar el registro.';
            }

            return  redirect()
                ->route('product-categories.index')
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
            $entry      = ProductCategories::find($id);
            $image      = url('storage/' . $this->folder . $entry->image);
            list($width, $height) = getimagesize($image);

            $opciones = array(
                    'tipo'          => 'product-categories'
                ,   'id'            => $entry->id
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
}
