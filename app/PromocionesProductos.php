<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromocionesProductos extends Model
{
    protected $table    = "promociones_productos";
    protected $fillable = [
        'promocion_id', 'producto_id', 'Dtype', 'final_price', 'discount'
    ];

    protected $dates = ['deleted_at'];

    /* --
    | Funciones de relaciones
    -- */
    public function promocion()
    {
        return $this -> belongsTo("App\Promociones");
    }
    public function producto()
    {
        return $this -> belongsToMany("App\Product");
    }
}
