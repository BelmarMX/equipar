<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	protected $table    = "products";
	protected $fillable = [
		'category_id', 'subcategory_id', 'title', 'slug', 'image', 'image_rx', 'ficha', 'modelo', 'marca', 'resumen', 'caracteristicas', 'tecnica', 'precio'
	];

	protected $hidden = [
		'',
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
		return $this -> belongsTo("App\ProductSubcategories", 'subcategory_id');
	}
	public function images()
	{
		return $this -> hasMany('App\ProductImages', 'producto_id');
	}
}