<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function ShowUsers()
    {
       $users = User::all();
       $roles = Roles::all();
        return view('Admin.user',compact('users','roles'));
    }

    public function DeleteUsers($id)
    {
        $users = User::find($id);

        $users->delete();

        return redirect('/users');

    }
    public function Create()
    {
        return view('Admin.CreateUser');
    }
    public function store(Request $request)
    {
        
    }
}
