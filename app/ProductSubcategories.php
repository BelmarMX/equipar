<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSubcategories extends Model
{
    use SoftDeletes;

    protected $table    = "products_subcategories";

    protected $fillable = [
        'category_id', 'title', 'slug'
    ];

    protected $hidden = [
        '',
    ];

    protected $dates = ['deleted_at'];

    // relaciones (1 a muchos)
    public function product()
    {
        return $this -> hasMany('App\Product');
    }
    // relaciones (1 a 1)
    public function category()
    {
        return $this -> belongsTo('App\ProductCategories');
    }
}
