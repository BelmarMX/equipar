<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeria extends Model
{
    use SoftDeletes;

    protected $table    = "galeria";
    protected $fillable = [
        'title', 'link', 'image', 'image_rx'
    ];

    protected $hidden = [
        '',
    ];

    protected $dates = ['deleted_at'];
}
