<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosDestacados extends Model
{
	protected $table	= "productos_destacados";

	protected $fillable = [
		'product_id', 'category'
	];

	public function producto()
	{
		return $this -> belongsTo('App\Product', 'product_id');
	}
}
