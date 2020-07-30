<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class UsersPolicy
{
    use HandlesAuthorization;
    private $user;

    public function __construct()
    {
        $this -> user = Auth::user();
    }

    public function isAdmin()
    {
        return ($this -> user-> role == 'super' || $this -> user -> role == 'admin');
    }

    public function index()
    {
        return ($this -> user-> role == 'super' || $this -> user -> role == 'admin' || $this -> user -> role == 'user');
    }

    public function create()
    {
        return ($this -> user-> role == 'super' || $this -> user -> role == 'admin' || $this -> user -> role == 'user') && $this -> user -> permissions >= 644;
    }

    public function edit()
    {
        return ($this -> user-> role == 'super' || $this -> user -> role == 'admin' || $this -> user -> role == 'user') && $this -> user -> permissions >= 644;
    }

    public function trim()
    {
        return ($this -> user-> role == 'super' || $this -> user -> role == 'admin' || $this -> user -> role == 'user') && $this -> user -> permissions >= 644;
    }

    public function destroy()
    {
        return ($this -> user-> role == 'super' || $this -> user -> role == 'admin') && $this -> user -> permissions >= 777;
    }
}
