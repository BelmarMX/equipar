<?php

namespace App\Http\Controllers;

use Gate;
use App\Product;
use Carbon\Carbon;

use App\Promociones;
use App\ProductCategories;
use Illuminate\Http\Request;
use App\ProductSubcategories;

class ProductSubcategoriesController extends BaseDashboard
{
    private $send;

    public function __construct()
    {
        parent::__construct();
        $this->send       = array();
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | View
    --- --- --- --- --- --- --- --- --- --- */
    public function view($slugC, $slugS)
    {
        $banners        = $this->viewBanners();
        $promos         = $this -> viewPromos();
        $category       = ProductCategories::where('slug', $slugC) -> first();
        $subcategory    = ProductSubcategories::where('slug', $slugS)->first();
        $subcategories  = ProductSubcategories::where('category_id', $category -> id) -> orderBy('title', 'ASC')-> get();
        $entry          = Product::select(
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
                $promos    = Promociones::where('start', '<=' , Carbon::now())
                    -> where('end', '>=', Carbon::now())
                    -> orderBy('id', 'DESC')
                    -> first();
                $promosID   = isset($promos -> id) ? $promos -> id : 0;
                $join -> on('producto_id', '=', 'products.id')
                    -> where('promocion_id', '=', $promosID);
            })
            -> orderBy('idP', 'DESC')
            -> where('products_subcategories.slug', '=', $slugS)
            -> paginate(12);

            /* SIDEBAR */
            $CC = ProductCategories::orderBy('id', 'ASC')
                -> where('id', '!=', $category -> id)
                -> orderBy('title', 'ASC')
                -> get();
            $SS = ProductSubcategories::orderBy('category_id', 'ASC')
                -> orderBy('title', 'ASC')
                -> get();
            /* SIDEBAR */

        $meta['titulo']         = $subcategory -> title;
        $meta['descripcion']    = 'Productos dentro de la categoría ' . $category -> title;
        $meta['imagen']         = url('storage/' . env('PRODUCT_CAT_FOLDER') . $category->image);
        return view('frontend_v2.productos-listado')
            ->with([
                    'meta'          => $meta
                ,   'banners'       => 0
                ,   'promos'        => $promos
                ,   'category'      => $category
                ,   'subcat'        => $subcategory
                ,   'subcategories' => $subcategories
                ,   'CC'            => $CC
                ,   'SS'            => $SS
                ,   'entries'       => $entry
                ,   'menu_cat'  => $this -> viewProducCategories()
            ]);
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Index
    --- --- --- --- --- --- --- --- --- --- */
    public function index()
    {
        if (Gate::allows('users.index')) {
            $categories = ProductCategories::withTrashed()
                ->orderBy('id', 'ASC')
                ->get();
            $entries    = ProductSubcategories::withTrashed()
                ->orderBy('id', 'DESC')
                ->paginate(100);
            $category   = array();
            foreach ($categories as $value) {
                $category[$value->id] = $value->title;
            }

            return  view('02_system.05_product-subcategories.index')
                ->with([
                        'entries'   => $entries
                    ,   'category'  => $category
                    ,   'month'     => $this -> months
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
            if (count($categories) == 0) {
                return view('02_system.isVoid')
                    ->with([
                        'actions' => [
                            'Tienes que dar de alta una categoría'
                        ]
                    ]);
            }

            return view('02_system.05_product-subcategories.create')
                ->with([
                        'categories'    => $categories
                    ,   'month'         => $this->months
                ]);
        }
        return view('02_system.unauthorized');
    }
    public function store(Request $request)
    {
        if (Gate::allows('users.create')) {
            // Validate
            $request['slug']        = str_slug($request->title);
            $this -> validate($request, [
                    'category_id'   => 'required|int|exists:products_categories,id'
                ,   'title'         => 'required|string'
                ,   'slug'          => 'required|unique:products_subcategories|string'
            ]);

            // Create
            if (ProductSubcategories::create([
                    'category_id'   => $request -> category_id
                ,   'title'         => $request -> title
                ,   'slug'          => $request -> slug
            ])) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro guardado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al guardar el registro.';

                return back()
                    -> withInput()
                    -> with('alert', $this->send);
            }

            return back()
                -> with('alert', $this->send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Update
    --- --- --- --- --- --- --- --- --- --- */
    public function edit($id)
    {
        if (Gate::allows('users.edit')) {
            $entry      = ProductSubcategories::find($id);
            $categories = ProductCategories::orderBy('title', 'ASC')
                -> get();
            return  view('02_system.05_product-subcategories.edit')
                ->with([
                        'entry'         => $entry
                    ,   'categories'    => $categories
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
                    'category_id'   => 'required|int|exists:products_categories,id'
                ,   'title'         => 'required|string'
                ,   'slug'          => 'required|unique:products_subcategories,slug,' . $id . '|string'
            ]);

            // Update
            $entry = ProductSubcategories::find($id);
            $entry->category_id   = $request->category_id;
            $entry->title         = $request->title;
            $entry->slug          = $request->slug;

            if ($entry->save()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro editado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al editar el registro.';

                return  back()
                    ->withInput()
                    ->with('alert', $this->send);
            }

            return  redirect()
                ->route('product-subcategories.index')
                ->with('alert', $this->send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Destroy
    --- --- --- --- --- --- --- --- --- --- */
    public function destroy($id)
    {
        if (Gate::allows('users.destroy')) {
            $entry = ProductSubcategories::find($id);

            if ($entry->delete()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro eliminado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al eliminar el registro.';
            }

            return  redirect()
                ->route('product-subcategories.index')
                ->with('alert', $this->send);
        }
        return view('02_system.unauthorized');
    }
    public function restore($id)
    {
        if (Gate::allows('users.destroy')) {
            if (ProductSubcategories::withTrashed()->where('id', $id)->restore()) {
                $this->send['type']       = 'alert-success';
                $this->send['message']    = 'Registro restaurado con éxito.';
            } else {
                $this->send['type']       = 'alert-danger';
                $this->send['message']    = 'Ocurrió un error al restaurar el registro.';
            }

            return  redirect()
                ->route('product-subcategories.index')
                ->with('alert', $this->send);
        }
        return view('02_system.unauthorized');
    }
}
