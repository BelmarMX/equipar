<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Banner;

class BannerController extends BaseDashboard
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
        $this -> folder     = env('BANNER_FOLDER');
        $this -> width      = env('BANNER_WIDTH');
        $this -> height     = env('BANNER_HEIGHT');
        $this -> width_mv   = env('BANNER_WIDTH_MV');
        $this -> height_mv  = env('BANNER_HEIGHT_MV');
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
            $entries    = Banner::withTrashed()
                        -> orderBy('id', 'DESC')
                        -> paginate(100);

            return  view('02_system.02_banner.index')
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
            return view('02_system.02_banner.create');
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
                ,   'image'         => 'required|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:width='.$this -> width.',height='.$this -> height
                ,   'image_mv'      => 'required|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:width='.$this -> width_mv.',height='.$this -> height_mv
            ]);
            $slug   = str_slug( $request -> title, '-' );

            $file_name  = $this -> imageName($request -> file('image'), $slug)['filename'];
            $thumb_name = $this -> imageName($request -> file('image'), $slug)['thumbname'];
            $mobilename = $this -> imageName($request -> file('image_mv'), $slug)['mobilename'];

            // Create
            if( Banner::create([
                    'title'         => $request -> title
                ,   'link'          => $request -> link
                ,   'image'         => $file_name
                ,   'image_rx'      => $thumb_name
                ,   'image_mv'      => $mobilename
            ]) )
            {
                $file       = Image::make( $request -> file('image') );
                $thumb      = Image::make( $request -> file('image') ) -> fit(80);
                $fmobile    = Image::make( $request -> file('image') );

                Storage::put( 'public/' . $this -> folder . $file_name, $file -> stream() );
                Storage::put( 'public/' . $this -> folder . $thumb_name, $thumb -> stream() );
                Storage::put( 'public/' . $this -> folder . $mobilename, $fmobile -> stream() );

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
            $entry = Banner::find($id);
            return  view('02_system.02_banner.edit')
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
                ,   'image'         => 'nullable|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:width='.$this -> width.',height='.$this -> height
                ,   'image_mv'      => 'nullable|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:width='.$this -> width_mv.',height='.$this -> height_mv
            ]);
            $slug   = str_slug( $request -> title, '-' );

            // Update
            $entry = Banner::find($id);
            $entry -> title         = $request -> title;
            $entry -> link          = $request -> link;
            if( Input::hasFile('image') ){
                $tmp_image          = $entry -> image;
                $tmp_image_rx       = $entry -> image_rx;
                $entry -> image     = $this -> imageName($request -> file('image'), $slug)['filename'];
                $entry -> image_rx  = $this -> imageName($request -> file('image'), $slug)['thumbname'];            
            }
            if( Input::hasFile('image_mv') ){
                $tmp_image_mv       = $entry -> image_mv;
                $entry -> image_mv  = $this -> imageName($request -> file('image_mv'), $slug)['mobilename'];
            }
            if( $entry -> save() )
            {
                if( Input::hasFile('image') ){
                    $file   = Image::make( $request -> file('image') );
                    $thumb  = Image::make( $request -> file('image') ) -> fit(80);
                    Storage::delete([
                            'public/' . $this -> folder . $tmp_image
                        ,   'public/' . $this -> folder . $tmp_image_rx
                    ]);
                    Storage::put( 'public/' . $this -> folder . $entry -> image, $file -> stream() );
                    Storage::put( 'public/' . $this -> folder . $entry -> image_rx, $thumb -> stream() );
                }
                if( Input::hasFile('image_mv') ){
                    $fmobile   = Image::make( $request -> file('image_mv') );
                    @Storage::delete(['public/' . $this -> folder . $tmp_image_mv]);
                    Storage::put( 'public/' . $this -> folder . $entry -> image_mv, $fmobile -> stream() );
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
                    -> route('banner.index')
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
            $entry = Banner::find($id);

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
                    -> route('banner.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    public function restore( $id )
    {
        if(Gate::allows('users.destroy'))
        {
            if( Banner::withTrashed() -> where('id', $id) -> restore() )
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
                    -> route('banner.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
}
