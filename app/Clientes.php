<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use SoftDeletes;

    protected $table    = "clientes";
    protected $fillable = [
        'nombre', 'email', 'phone', 'company', 'city', 'state', 'comment'
    ];

    protected $dates = ['deleted_at'];
}
