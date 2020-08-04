<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategories extends Model
{
	use SoftDeletes;

	protected $table    = "products_categories";

	protected $fillable = [
		'title', 'slug', 'image', 'image_rx'
	];

	protected $hidden = [
		'',
	];

	protected $dates = ['deleted_at'];

	// relaciones (1 a muchos)
	public function product()
	{
		return $this->hasMany('App\Product');
	}

	// relaciones (1 a muchos)
	public function subcategories()
	{
		return $this->hasMany('App\ProductSubcategories');
	}
}
