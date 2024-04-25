<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Http\Controllers\UserController;

class AuthController extends Controller
{
    public function registerform()
    {
        $data = User::all();
        return view('Auth.register',compact('data'));

    }
    public function loginform()
    {
        $data = User::all();

        return view('Auth.login',compact('data'));

    }


    public function register(Request $request)
    {
        // dd($request);

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:8',
            'role' => 'required',

        ];

        // dd($rules);

        $validatedData = $request->validate($rules);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => $validatedData['role'],

        ]);

        // dd($user);

        return redirect('/login');
    }





    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            $user = auth()->user();
            if($user->role_id == '3'){
                return redirect('/');
            } elseif($user->role_id == '2'){
                return redirect('/');

            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login')->withErors([
                'email'=>'email invalid'
            ])->onlyInput('email');

        }
    }
    public function LogOut()
    {
        auth::Logout();
        return redirect('/');
    }

}
