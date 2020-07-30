<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\BlogArticles;
use App\ProductCategories;
use App\Product;
use App\Portfolio;

class TrimController extends BaseDashboard
{
    private $send;
    private $folder;
    private $width;
    private $height;
    private $entry;
    private $file_name;

    public function __construct()
    {
        parent::__construct();
        $this -> send       = array();
    }

    public function update(Request $request, $tipo)
    {
        $id = $request -> xid;

        $xinicial   = $request -> xinicial;
        $yinicial   = $request -> yinicial;
        $wcorte     = $request -> ancho;
        $hcorte     = $request -> alto;

        if( $tipo == 'blog-articles' )
        {
            $this -> folder     = env('ARTICLE_FOLDER');
            $this -> width      = env('ARTICLE_RX_WIDTH');
            $this -> height     = env('ARTICLE_RX_HEIGHT');
            $this -> entry      = BlogArticles::find($id);
            $this -> file_name  = $this -> entry -> image_rx;
        }
        elseif ($tipo == 'product-categories')
        {
            $this->folder     = env('PRODUCT_CAT_FOLDER');
            $this->width      = env('PRODUCT_CAT_RX_WIDTH');
            $this->height     = env('PRODUCT_CAT_RX_HEIGHT');
            $this->entry      = ProductCategories::find($id);
            $this->file_name  = $this->entry->image_rx;
        }
        elseif ($tipo == 'product')
        {
            $this->folder     = env('PRODUCT_FOLDER');
            $this->width      = env('PRODUCT_RX_WIDTH');
            $this->height     = env('PRODUCT_RX_HEIGHT');
            $this->entry      = Product::find($id);
            $this->file_name  = $this->entry->image_rx;
        }
        elseif ($tipo == 'portfolio')
        {
            $this->folder     = env('PORTFOLIO_FOLDER');
            $this->width      = env('PORTFOLIO_RX_WIDTH');
            $this->height     = env('PORTFOLIO_RX_HEIGHT');
            $this->entry      = Portfolio::find($id);
            $this->file_name  = $this->entry->image_rx;
        }

        $file   = Image::make( url( 'storage/' . $this -> folder . $this -> entry -> image ) )
                -> crop ( $wcorte, $hcorte, $xinicial, $yinicial )
                -> resize($this -> width, $this -> height);

        Storage::delete([ 'public/' . $this -> folder . $this -> entry -> image_rx ]);

        if( Storage::put( 'public/' . $this -> folder . $this -> file_name, $file -> stream() ) )
        {
            $this -> send['type']       = 'alert-success';
            $this -> send['message']    = 'Recorte guardado con éxito.';
        }
        else
        {
            $this -> send['type']       = 'alert-danger';
            $this -> send['message']    = 'Ocurrió un error al guardar el registro.';
        }
        return  redirect()
                -> route($tipo.'.index')
                -> with('alert', $this -> send);
    }
}