<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogArticles extends Model
{
    use SoftDeletes;

    protected $table    = "blog_articles";
    protected $fillable = [
        'category_id', 'title', 'slug', 'publish', 'image', 'image_rx', 'shortdesc', 'content'
    ];

    protected $hidden = [
        '',
    ];

    protected $dates = ['deleted_at'];

    // relaciones (1 a 1)
    public function category()
    {
        return $this -> belongsTo("App\BlogCategories");
    }
}
