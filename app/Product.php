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
        return $this -> belongsTo("App\ProductCategories");
    }
    public function subcategory()
    {
        return $this -> belongsTo("App\ProductSubcategories");
    }
    public function cotizaciones()
    {
        return $this -> hasMany("App\Cotizaciones");
    }
}