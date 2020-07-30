<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;

    protected $table    = "portfolio";

    protected $fillable = [
        'title', 'slug', 'image', 'image_rx', 'content'
    ];

    protected $hidden = [
        '',
    ];

    protected $dates = ['deleted_at'];

    // relaciones (1 a muchos)
    public function PortfolioImages()
    {
        return $this -> hasMany('App\PortfolioImages');
    }
}
