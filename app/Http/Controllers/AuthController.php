<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerform()
    {
        return view('Auth.register');

    }
    public function loginform()
    {
        return view('Auth.login');

    }
    public function register()
    {

    }
    public function login()
    {

    }
}
