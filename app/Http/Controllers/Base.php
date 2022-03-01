<?php

namespace App\Http\Controllers;

use App\Banner
,   App\Promociones;

use App\ProductCategories;
use Carbon\Carbon;

class Base extends Controller
{
    public function viewBanners(){
        $banners    = Banner::orderBy('id', 'DESC')
                    ->get();
        return $banners;
    }

    public function viewPromos(){
        $promos    = Promociones::where('start', '>=' , Carbon::now()->startOfMonth())
            -> where('end', '<=', Carbon::now()->endOfMonth())
            -> orderBy('id', 'DESC')
            -> first();
        return $promos;
    }

    public function viewProducCategories()
    {
        return ProductCategories::all();
    }
}
