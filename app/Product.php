<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Product extends Model
{
	use SoftDeletes, Searchable;

    const OB_ASC                = 'ASC';
    const OB_DESC               = 'DESC';
    const OB_DEFAULT            = 'products.id';
    const OB_TITLE              = 'products.title';
    const OB_PRICE              = 'products.precio';

	protected $table    = "products";
	protected $fillable = [
		'category_id', 'subcategory_id', 'title', 'slug', 'modelo', 'marca', 'resumen', 'caracteristicas', 'tecnica', 'precio', 'image', 'image_rx', 'ficha', 'con_flete'
	];

	protected $dates = ['deleted_at'];

	/* --
	| Funciones de relaciones
	-- */
	public function category()
	{
		return $this -> belongsTo("App\ProductCategories", 'category_id');
	}
	public function subcategory()
	{
		return $this
            -> belongsTo("App\ProductSubcategories", 'subcategory_id');
	}
    public function subcategory_trashed()
    {
        return $this
            -> belongsTo("App\ProductSubcategories", 'subcategory_id')
            -> withTrashed();
    }
	public function images()
	{
		return $this -> hasMany('App\ProductImages', 'producto_id');
	}

    public static function search($search, $brand = NULL, $category = NULL, $promos = FALSE, $order_by = self::OB_DEFAULT, $dir = self::OB_DESC)
    {
        //DB::enableQueryLog();
        DB::statement("SET sql_mode = '';");
        return Product::select(
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
            $promosID   = $promos -> id ?? 0
            ;
            $join -> on('producto_id', '=', 'products.id')
                -> where('promocion_id', '=', $promosID);
        })
        -> whereRaw("(
		    products.title LIKE '%$search%' OR
		    products.slug LIKE '%$search%' OR
		    products.modelo LIKE '%$search%' OR
		    products.marca LIKE '%$search%' OR
		    products_categories.title LIKE '%$search%' OR
		    products_subcategories.title LIKE '%$search%'
		)")
        -> where(function($where) use ($brand, $category, $promos){
            if( !is_null($brand) )
            {
                $where -> where('products.marca', $brand);
            }
            if( !is_null($category) )
            {
                $where -> where('products_categories.slug', $category);
            }
            if( $promos )
            {
                $where -> where('promociones_productos.final_price', '>', 0);
            }
            else
            {
                $where -> where('promociones_productos.final_price', NULL);
            }
        })
        -> groupBy(self::OB_DEFAULT)
        -> orderBy($order_by, $dir)
        -> get();

        /*echo '<small>';
		print_r(DB::getQueryLog());
		echo '</small>';*/
    }

    /* --
	| Algolia Search
	-- */
    public function searchableAs()
    {
        return 'products_index';
    }

    // works with soft deletes
    public function toSearchableArray()
    {
        $this -> with(['category', 'subcategory_trashed']);

        $categoria      = isset($this -> category) && isset($this -> category -> title)
            ? $this -> category -> title
            : 'undefined'
        ;
        $categoria_slug = isset($this -> category) && isset($this -> category -> slug)
            ? $this -> category -> slug
            : 'undefined'
        ;
        $subcategoria      = isset($this -> subcategory_trashed) && isset($this -> subcategory_trashed -> title)
            ? $this -> subcategory_trashed -> title
            : 'undefined'
        ;
        $subcategoria_slug = isset($this -> subcategory_trashed) && isset($this -> subcategory_trashed -> slug)
            ? $this -> subcategory_trashed -> slug
            : 'undefined'
        ;

        $array = [
                'id'            => $this -> id
            ,   'categoria'     => $categoria
            ,   'subcategoria'  => $subcategoria
            ,   'title'         => $this -> title
            ,   'modelo'        => $this -> modelo
            ,   'marca'         => $this -> marca
            ,   'precio'        => $this -> precio + 0
            ,   'slug'          => "$categoria_slug/$subcategoria_slug/{$this -> slug}"
            ,   'image'         => $this -> image
            ,   'thumb'         => $this -> image_rx
            ,   'resumen'       => $this -> resumen
            ,   'info'          => $this -> caracteristicas
        ];

        return $array;
    }
}