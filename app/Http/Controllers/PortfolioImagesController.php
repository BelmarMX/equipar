<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Portfolio;
use App\PortfolioImages;

class PortfolioImagesController extends BaseDashboard
{
    private $send;
    private $folder;
    private $width;
    private $height;
    private $width_rx;
    private $height_rx;
    private $max_size;

    public function __construct()
    {
        parent::__construct();
        $this -> send       = array();
        $this -> folder     = env('PORTFOLIO_IMG_FOLDER');
        $this -> width      = env('PORTFOLIO_IMG_WIDTH');
        $this -> height     = env('PORTFOLIO_IMG_HEIGHT');
        $this -> width_rx   = env('PORTFOLIO_IMG_RX_WIDTH');
        $this -> height_rx  = env('PORTFOLIO_IMG_RX_HEIGHT');
        $this -> max_size   = env('FILE_MAX_SIZE');
    }

    public function store(Request $request)
    {
        if(Gate::allows('users.create'))
        {
            // Validate
            $request['slug']    = str_slug( $request -> title );
            $this -> validate( $request, [
                    'portfolio_id'  => 'required|int|exists:portfolio,id'
                ,   'title'         => 'required|string'
                ,   'slug'          => 'required|unique:portfolio_images|string'
                ,   'image'         => 'required|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:min_width='.$this -> width.',min_height='.$this -> height
            ]);

            $original   = request() -> file('image') -> getClientOriginalName();
            $ext        = pathinfo($original, PATHINFO_EXTENSION);
            $file_name  = $request -> slug . '-' . time() . '.' . $ext;

            // Create
            if( PortfolioImages::create([
                    'portfolio_id'  => $request -> portfolio_id
                ,   'title'         => $request -> title
                ,   'slug'          => $request -> slug
                ,   'image'         => $file_name
            ]) )
            {
                $file   = Image::make( $request -> file('image') );
                Storage::put( 'public/' . $this -> folder . $file_name, $file -> stream() );

                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro guardado con éxito.';
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al guardar el registro.';

                return  back()
                        -> withInput()
                        -> with('alert', $this -> send);
            }

            return  back()
                    -> with('alert', $this -> send);
        }
    }

    public function edit($id_portfolio)
    {
        if(Gate::allows('users.edit'))
        {
            $portfolio          = Portfolio::find($id_portfolio);
            $portfolioImages    = Portfolio::find($id_portfolio) -> PortfolioImages;

            return  view('02_system.06_portfolio-images.edit')
                    -> with([
                                'portfolio' => $portfolio
                            ,   'entries'   => $portfolioImages
                            ,   'month'     => $this -> months
                    ]);
        }
            return view('02_system.unauthorized');
    }

    public function destroy($id)
    {
        if(Gate::allows('users.destroy'))
        {
            $entry = PortfolioImages::find($id);

            if( $entry -> delete() )
            {
                Storage::delete([ 'public/' . $this -> folder . $entry -> image ]);

                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro eliminado con éxito.';
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al eliminar el registro.';
            }

            return  back()
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
}
