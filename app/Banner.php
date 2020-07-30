<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $table    = "banner";
    protected $fillable = [
        'title', 'link', 'image', 'image_rx', 'image_mv'
    ];

    protected $hidden = [
        '',
    ];

    protected $dates = ['deleted_at'];
}
