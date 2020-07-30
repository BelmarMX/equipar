<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioImages extends Model
{
    protected $table    = "portfolio_images";

    protected $fillable = [
        'portfolio_id', 'title', 'slug', 'image'
    ];

    protected $hidden = [
        '',
    ];

    protected $dates = ['deleted_at'];

    // relaciones (muchos a 1)
    public function portfolio()
    {
        return $this->belongsTo('App\Portfolio');
    }
}
