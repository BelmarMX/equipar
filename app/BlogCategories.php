<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategories extends Model
{
    use SoftDeletes;

    protected $table    = "blog_categories";

    protected $fillable = [
        'title', 'slug'
    ];

    protected $hidden = [
        '',
    ];

    protected $dates = ['deleted_at'];

    // relaciones (1 a muchos)
    public function articles()
    {
        return $this -> hasMany('App\Article');
    }
}
