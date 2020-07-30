<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promociones extends Model
{
    use SoftDeletes;

    protected $table    = "promociones";
    protected $fillable = [
        'title', 'slug', 'image', 'start', 'end', 'general_disc', 'amount', 'type'
    ];

    protected $dates = ['deleted_at'];

    
    public function productsInPromos()
    {
        return $this -> hasMany('App\PromocionesProductos', 'promocion_id');
    }
}
