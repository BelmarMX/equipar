<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
	protected $table    = "product_images";
	protected $fillable = [
		'producto_id', 'image', 'image_rx'
	];

	/* --
	| Funciones de relaciones
	-- */
	public function producto()
	{
		return $this -> belongsTo("App\Product", 'producto_id');
	}
}
