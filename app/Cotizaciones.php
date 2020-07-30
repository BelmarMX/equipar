<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizaciones extends Model
{
    use SoftDeletes;

    protected $table    = "cotizaciones";
    protected $fillable = [
        'cliente_id', 'product_id', 'cantidad', 'precio_final', 'notes'
    ];

    protected $dates = ['deleted_at'];

    /* --
    | Funciones de relaciones
    -- */
    public function cliente()
    {
        return $this -> belongsTo("App\Clientes");
    }

    public function producto()
    {
        return $this -> belongsTo("App\Product");
    }
}
