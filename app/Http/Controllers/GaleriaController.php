<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Galeria;

class GaleriaController extends BaseDashboard
{
    private $send;
    private $folder;
    private $width;
    private $height;
    private $max_size;

    public function __construct()
    {
        parent::__construct();
        $this -> send       = array();
        $this -> folder     = env('GALLERY_FOLDER');
        $this -> width      = env('GALLERY_WIDTH');
        $this -> height     = env('GALLERY_HEIGHT');
        $this -> max_size   = env('FILE_MAX_SIZE');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | View
    --- --- --- --- --- --- --- --- --- --- */
    public function view()
    {
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Index
    --- --- --- --- --- --- --- --- --- --- */
    public function index()
    {
        if(Gate::allows('users.index'))
        {
            $entries    = Galeria::withTrashed()
                        -> orderBy('id', 'DESC')
                        -> paginate(100);

            return  view('02_system.03_galeria.index')
                    -> with([
                                'entries'   => $entries
                            ,   'month'     => $this -> months
                        ]);
        }
            return view('02_system.unauthorized');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Create
    --- --- --- --- --- --- --- --- --- --- */
    public function create()
    {
        if(Gate::allows('users.create'))
        {
            return view('02_system.03_galeria.create');
        }
            return view('02_system.unauthorized');
    }
    public function store( Request $request )
    {
        if(Gate::allows('users.create'))
        {
            // Validate
            $this -> validate( $request, [
                    'title'         => 'required|string'
                ,   'link'          => 'nullable|url'
                ,   'image'         => 'required|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:min_width='.$this -> width.',min_height='.$this -> height
            ]);
            $slug   = str_slug( $request -> title, '-' );

            $original   = request() -> file('image') -> getClientOriginalName();
            $ext        = pathinfo($original, PATHINFO_EXTENSION);
            $file_name  = $slug . '-' . time() . '.' . $ext;
            $thumb_name = $slug . '-' . time() . '-thumbnail.' . $ext;

            // Create
            if( Galeria::create([
                    'title'         => $request -> title
                ,   'link'          => $request -> link
                ,   'image'         => $file_name
                ,   'image_rx'      => $thumb_name
            ]) )
            {
                $file   = Image::make( $request -> file('image') );
                $thumb  = Image::make( $request -> file('image') ) -> fit( env('GALLERY_RX_WIDTH') );
                Storage::put( 'public/' . $this -> folder . $file_name, $file -> stream() );
                Storage::put( 'public/' . $this -> folder . $thumb_name, $thumb -> stream() );

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

    /* --- --- --- --- --- --- --- --- --- ---
    | Update
    --- --- --- --- --- --- --- --- --- --- */
    public function edit( $id )
    {
        if(Gate::allows('users.edit'))
        {
            $entry = Galeria::find($id);
            return  view('02_system.03_galeria.edit')
                    -> with([
                            'entry' => $entry
                        ,   'id'    => $id
                    ]);
        }
            return view('02_system.unauthorized');
    }
    public function update( Request $request, $id )
    {
        if(Gate::allows('users.edit'))
        {
            // Validate
            $this -> validate( $request, [
                    'title'         => 'required|string'
                ,   'link'          => 'nullable|url'
                ,   'image'         => 'nullable|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:min_width='.$this -> width.',min_height='.$this -> height
            ]);
            $slug   = str_slug( $request -> title, '-' );

            // Update
            $entry = Galeria::find($id);
            $entry -> title         = $request -> title;
            $entry -> link          = $request -> link;
            if( Input::hasFile('image') ){
                $original           = request() -> file('image') -> getClientOriginalName();
                $ext                = pathinfo($original, PATHINFO_EXTENSION);
                $tmp_image          = $entry -> image;
                $tmp_image_rx       = $entry -> image_rx;
                $entry -> image     = $slug . '-' . time() . '.' . $ext;
                $entry -> image_rx  = $slug . '-' . time() . '-thumbnail.' . $ext;
            }

            if( $entry -> save() )
            {
                if( Input::hasFile('image') ){
                    $file   = Image::make( $request -> file('image') );
                    $thumb  = Image::make( $request -> file('image') ) -> fit( env('GALLERY_RX_WIDTH') );
                    Storage::delete([
                            'public/' . $this -> folder . $tmp_image
                        ,   'public/' . $this -> folder . $tmp_image_rx
                    ]);
                    Storage::put( 'public/' . $this -> folder . $entry -> image, $file -> stream() );
                    Storage::put( 'public/' . $this -> folder . $entry -> image_rx, $thumb -> stream() );
                }
                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro editado con éxito.';
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
                    -> route('gallery.index')
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
            $entry = Galeria::find($id);

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
                    -> route('gallery.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    public function restore( $id )
    {
        if(Gate::allows('users.destroy'))
        {
            if( Galeria::withTrashed() -> where('id', $id) -> restore() )
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
                    -> route('gallery.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
}
