<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function ShowUsers()
    {
       $users = User::all();
        // dd($users);
        return view('Admin.user',compact('users'));
    }

    public function DeleteUsers($id)
    {
        $users = User::find($id);


    }
}
