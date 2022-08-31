<?php

namespace App\Http\Controllers;
use App\Banner
,   App\Promociones;

use App\ProductCategories;
use Carbon\Carbon;

class BaseDashboard extends Controller
{
    public $months;
    public $store;
    private $send;

    public function __construct()
    {
        //$this -> middleware('auth');
        $this -> months = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $this -> send   = array();
    }

    public function viewBanners()
    {
        $banners    = Banner::orderBy('id', 'ASC')
            ->get();
        return $banners;
    }
    public function viewPromos(){
        $promos    = Promociones::where('start', '<=' , Carbon::now())
            -> where('end', '>=', Carbon::now())
            -> orderBy('id', 'DESC')
            -> first();
        return $promos;
    }
    public function viewProducCategories()
    {
        return ProductCategories::all();
    }

    public function imageName( $image, $slug )
    {
        $time       = time();
        $original   = $image -> getClientOriginalName();
        $ext        = pathinfo($original, PATHINFO_EXTENSION);
        $file_name  = $slug . '-' . $time . '.' . $ext;
        $thumb_name = $slug . '-' . $time . '-thumbnail.' . $ext;
        $movil_name = $slug . '-' . $time . '-movil.' . $ext;

        return ["filename" => $file_name, "thumbname" => $thumb_name, "mobilename" => $movil_name];
    }
}
