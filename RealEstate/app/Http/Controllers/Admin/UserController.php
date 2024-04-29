<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }
    public function banUsers($id)
    {
        $user = User::find($id);

        if($user)
        {
            if($user->IsBan == 0)
            {
                $user->IsBan = 1;
            } 
             else
            {
                $user->IsBan = 0;

            }

            $user->save();
        }

        return back();
    }





    public function ShowUsers()
    {
        $users = User::get();
        return view('Admin.user' ,compact('users'));
    }
    public function deleteUsers($id)
    {
        $user = User::find($id);
        // dd($user);
        if ($user) {
            $user->delete();
        }
        return redirect('/admin');
    }
    public function Create()
    {
        return view ('Admin.addUser');
    }

}
