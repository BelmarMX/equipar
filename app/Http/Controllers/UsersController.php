<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseDashboard;

use Gate;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\User;

class UsersController extends BaseDashboard
{
    private $send;

    public function __construct()
    {
        $this -> middleware('auth');
        parent::__construct();
        $this -> send = array();
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Index
    --- --- --- --- --- --- --- --- --- --- */
    public function index()
    {
        if(Gate::allows('users.isAdmin') && Gate::allows('users.index'))
        {
            $namesPer   = array(444 => 'Lectura', 644 => 'Lectura y escritura', 777 => 'Todos los permisos');
            $entries    = User::withTrashed()
                            -> whereNotIn('role', ['super'])
                            -> paginate(100);

            return  view('02_system.01_usuarios.index')
                    -> with([
                                'entries'   => $entries
                            ,   'namePer'   => $namesPer
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
        if(Gate::allows('users.isAdmin') && Gate::allows('users.create'))
        {
            return view('02_system.01_usuarios.create');
        }
            return view('02_system.unauthorized');
    }
    public function store( Request $request )
    {
        if(Gate::allows('users.isAdmin') && Gate::allows('users.create'))
        {
            // Validate
            $this -> validate( $request, [
                    'name'          => 'required|string'
                ,   'email'         => 'required|email|unique:users'
                ,   'password'      => 'required|min:6|same:confirm'
                ,   'confirm'       => 'required|min:6'
                ,   'role'          => 'required|in:super,admin,user'
                ,   'permissions'   => 'required|in:444,644,777'
                ,   'active'        => 'nullable'
            ]);
            // Create
            if( User::create([
                    'name'          => $request -> name
                ,   'email'         => $request -> email
                ,   'password'      => bcrypt($request -> password)
                ,   'role'          => $request -> role
                ,   'permissions'   => $request -> permissions
                ,   'active'        => 1
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
        if(Gate::allows('users.isAdmin') && Gate::allows('users.edit'))
        {
            $entry = User::find($id);
            return  view('02_system.01_usuarios.edit')
                    -> with([
                            'entry' => $entry
                        ,   'id'    => $id
                    ]);
        }
            return view('02_system.unauthorized');
    }
    public function update( Request $request, $id )
    {
        if(Gate::allows('users.isAdmin') && Gate::allows('users.edit'))
        {
            // Validate
            $this -> validate( $request, [
                    'name'          => 'required|string'
                ,   'email'         => 'required|email|unique:users,email,'.$id
                ,   'password'      => 'nullable|min:6|same:confirm'
                ,   'confirm'       => 'nullable|min:6'
                ,   'role'          => 'required|in:super,admin,user'
                ,   'permissions'   => 'required|in:444,644,777'
                ,   'active'        => 'nullable'
            ]);
            // Update
            $entry = User::find($id);
            $entry -> name          = $request -> name;
            $entry -> email         = $request -> email;
            $entry -> password      = !empty( $request -> password ) ? bcrypt( $request -> password ) : $entry -> password;
            $entry -> role          = $request -> role;
            $entry -> permissions   = $request -> permissions;
            $entry -> active        = 1;

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
                    -> route('users.index')
                    -> with('alert', $this -> send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Destroy
    --- --- --- --- --- --- --- --- --- --- */
    public function destroy( $id )
    {
        if(Gate::allows('users.isAdmin') && Gate::allows('users.destroy') && ( $id != 1 && Auth::user() -> id != $id ) )
        {
            $entry = User::find($id);

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
                    -> route('users.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    public function restore( $id )
    {
        if(Gate::allows('users.isAdmin') && Gate::allows('users.destroy'))
        {
            if( User::withTrashed() -> where('id', $id) -> restore() )
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
                    -> route('users.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
}
