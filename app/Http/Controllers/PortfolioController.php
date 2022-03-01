<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Portfolio;
use App\PortfolioImages;

class PortfolioController extends BaseDashboard
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
        $this -> folder     = env('PORTFOLIO_FOLDER');
        $this -> width      = env('PORTFOLIO_WIDTH');
        $this -> height     = env('PORTFOLIO_HEIGHT');
        $this -> width_rx   = env('PORTFOLIO_RX_WIDTH');
        $this -> height_rx  = env('PORTFOLIO_RX_HEIGHT');
        $this -> max_size   = env('FILE_MAX_SIZE');
    }
    public function index()
    {
        if(Gate::allows('users.index'))
        {
            $entries    = Portfolio::withTrashed()
                        -> orderBy('id', 'DESC')
                        -> paginate(100);

            return  view('02_system.06_portfolio.index')
                    -> with([
                                'entries'   => $entries
                            ,   'month'     => $this -> months
                        ]);
        }
            return view('02_system.unauthorized');
    }

    public function create()
    {
        if(Gate::allows('users.create'))
        {
            return view('02_system.06_portfolio.create');
        }
            return view('02_system.unauthorized');
    }
    public function store(Request $request)
    {
        if(Gate::allows('users.create'))
        {
            // Validate
            $request['slug']    = str_slug( $request -> title );
            $this -> validate( $request, [
                    'title'     => 'required|string'
                ,   'slug'      => 'required|unique:portfolio|string'
                ,   'image'     => 'required|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:min_width='.$this -> width.',min_height='.$this -> height
                ,   'image_rx'  => 'nullable'
                ,   'content'   => 'required'
            ]);

            $time       = time();
            $original   = request() -> file('image') -> getClientOriginalName();
            $ext        = pathinfo($original, PATHINFO_EXTENSION);
            $file_name  = $request -> slug . '-' . $time . '.' . $ext;
            $thumb_name = $request -> slug . '-' . $time . '-thumbnail.' . $ext;

            // Create
            if( $id = Portfolio::create([
                    'title'         => $request -> title
                ,   'slug'          => $request -> slug
                ,   'publish'       => $request -> publish
                ,   'image'         => $file_name
                ,   'image_rx'      => $thumb_name
                ,   'shortdesc'     => $request -> shortdesc
                ,   'content'       => $request -> content
            ]) )
            {
                $file   = Image::make( $request -> file('image') );
                Storage::put( 'public/' . $this -> folder . $file_name, $file -> stream() );

                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro guardado con éxito.';
                return  redirect()
                        -> route('portfolio.trim', $id)
                        -> with('alert', $this -> send);
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

    public function view()
    {
        $entries = Portfolio::orderBy('id', 'DESC')
                    -> paginate(12);

        $meta['titulo']         = 'Portafolio de proyectos';
        $meta['descripcion']    = 'Descubra aquí nuevas proyectos y como los hemos desarrollado.';
        $meta['imagen']         = asset('images/template/render-ejemplo.jpg');

        return  view('frontend_v2.portafolio')
                -> with([
                        'meta'      => $meta
                    ,   'banners'   => 0
                    ,   'entries'  => $entries
                    ,   'menu_cat'  => $this -> viewProducCategories()
                ]);
    }
    public function show($slug)
    {
        $portfolio  = Portfolio::where('slug', '=', $slug)
            -> first();
        $portfolioImages    = Portfolio::find($portfolio -> id) -> PortfolioImages;

        $meta['titulo']         = $portfolio -> title;
        $meta['descripcion']    = "Nuestro proyecto " . $portfolio -> title . " y su desarrollo.";
        $meta['imagen']         = url('storage/' . $this -> folder . $portfolio -> image);

        return  view('frontend_v2.portafolio-open')
                -> with([
                        'meta'      => $meta
                    ,   'banners'   => 0
                    ,   'entry'     => $portfolio
                    ,   'gallery'   => $portfolioImages
                ]);
    }

    public function edit($id)
    {
        if(Gate::allows('users.edit'))
        {
            $entry  = Portfolio::find($id);
            return  view('02_system.06_portfolio.edit')
                    -> with([
                            'entry'         => $entry
                        ,   'id'            => $id
                    ]);
        }
            return view('02_system.unauthorized');
    }
    public function update(Request $request, $id)
    {
        if(Gate::allows('users.edit'))
        {
            // Validate
            $request['slug']    = str_slug( $request -> title );
            $this -> validate( $request, [
                    'title'         => 'required|string'
                ,   'slug'          => 'required|string|unique:portfolio,slug,'.$id
                ,   'image'         => 'nullable|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:min_width='.$this -> width.',min_height='.$this -> height
                ,   'image_rx'      => 'nullable'
                ,   'content'       => 'required'
            ]);

            // Update
            $entry = Portfolio::find($id);
            $entry -> title         = $request -> title;
            $entry -> slug          = $request -> slug;
            if( Input::hasFile('image') ){
                $original           = request() -> file('image') -> getClientOriginalName();
                $ext                = pathinfo($original, PATHINFO_EXTENSION);
                $tmp_image          = $entry -> image;
                $tmp_image_rx       = $entry -> image_rx;
                $entry -> image     = $request -> slug . '-' . time() . '.' . $ext;
                $entry -> image_rx  = $request -> slug . '-' . time() . '-thumbnail.' . $ext;
            }
            $entry -> content       = $request -> content;

            if( $entry -> save() )
            {
                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro editado con éxito.';

                if( Input::hasFile('image') ){
                    $file   = Image::make( $request -> file('image') );
                    Storage::delete([
                            'public/' . $this -> folder . $tmp_image
                        ,   'public/' . $this -> folder . $tmp_image_rx
                    ]);
                    Storage::put( 'public/' . $this -> folder . $entry -> image, $file -> stream() );

                    return  redirect()
                            -> route('portfolio.trim', $id)
                            -> with('alert', $this -> send);
                }
                return  redirect()
                        -> route('portfolio.index')
                        -> with('alert', $this -> send);
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al editar el registro.';

                return  back()
                        -> withInput()
                        -> with('alert', $this -> send);
            }

            return  redirect()
                    -> route('portfolio.index')
                    -> with('alert', $this -> send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Destroy
    --- --- --- --- --- --- --- --- --- --- */
    public function destroy( $id )
    {
        if(Gate::allows('users.destroy'))
        {
            $entry = Portfolio::find($id);

            if( $entry -> delete() )
            {
                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro eliminado con éxito.';
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al eliminar el registro.';
            }

            return  redirect()
                    -> route('portfolio.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    public function restore( $id )
    {
        if(Gate::allows('users.destroy'))
        {
            if( Portfolio::withTrashed() -> where('id', $id) -> restore() )
            {
                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro restaurado con éxito.';
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al restaurar el registro.';
            }

            return  redirect()
                    -> route('portfolio.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    /* --- --- --- --- --- --- --- --- --- ---
    | Trim
    --- --- --- --- --- --- --- --- --- --- */
    public function trim( $id )
    {
        if(Gate::allows('users.trim'))
        {
            $entry      = Portfolio::find($id);
            $image      = url( 'storage/' . $this -> folder . $entry -> image );
            list($width, $height) = getimagesize($image);

            $opciones = array(
                    'tipo'          => 'portfolio'
                ,   'id'            => $entry -> id
                ,   'ruta'          => $image
                ,   'width'         => $width
                ,   'height'        => $height
                ,   'cut_width'     => $this -> width_rx
                ,   'cut_height'    => $this -> height_rx
            );
            return view('02_system.trimmer') -> with('opciones', $opciones);
        }
            return view('02_system.unauthorized');
    }
}
