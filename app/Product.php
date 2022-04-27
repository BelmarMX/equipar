<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
	use SoftDeletes, Searchable;

	protected $table    = "products";
	protected $fillable = [
		'category_id', 'subcategory_id', 'title', 'slug', 'modelo', 'marca', 'resumen', 'caracteristicas', 'tecnica', 'precio', 'image', 'image_rx', 'ficha'
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