<?php

namespace App\Http\Controllers;

use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\BlogCategories;

class BlogCategoriesController extends BaseDashboard
{
    private $send;

    public function __construct()
    {
        parent::__construct();
        $this -> send       = array();
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
            $entries    = BlogCategories::withTrashed()
                        -> orderBy('id', 'DESC')
                        -> paginate(100);

            return  view('02_system.04_blog-categories.index')
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
            return view('02_system.04_blog-categories.create');
        }
            return view('02_system.unauthorized');
    }
    public function store( Request $request )
    {
        if(Gate::allows('users.create'))
        {
            // Validate
            $request['slug']    = str_slug( $request -> title );
            $this -> validate( $request, [
                    'title' => 'required|string'
                ,   'slug'  => 'required|unique:blog_categories|string'
            ]);

            // Create
            if( BlogCategories::create([
                    'title'         => $request -> title
                ,   'slug'          => $request -> slug
            ]) )
            {
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
            $entry = BlogCategories::find($id);
            return  view('02_system.04_blog-categories.edit')
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
            $request['slug']    = str_slug( $request -> title );
            $this -> validate( $request, [
                    'title' => 'required|string'
                ,   'slug'  => 'required|unique:blog_categories,slug,'.$id.'|string'
            ]);

            // Update
            $entry = BlogCategories::find($id);
            $entry -> title         = $request -> title;
            $entry -> slug          = $request -> slug;

            if( $entry -> save() )
            {
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
                    -> route('blog-categories.index')
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
            $entry = BlogCategories::find($id);

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
                    -> route('blog-categories.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    public function restore( $id )
    {
        if(Gate::allows('users.destroy'))
        {
            if( BlogCategories::withTrashed() -> where('id', $id) -> restore() )
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
                    -> route('blog-categories.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
}
