<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserTable()
    {
        return view('Admin.user');
    }
}
