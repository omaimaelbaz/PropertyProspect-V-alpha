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
        return view('Auth.register');

    }
    public function loginform()
    {
        return view('Auth.login');

    }
    public function register(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required ',
            'password' =>'required'
        ]);
        $hashedPassword = Hash::make($validatedData['password']);

        $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => $hashedPassword,
    ]);

            return redirect('/login');
    }





    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        // Authentication successful
        return redirect()->intended('/');
    } else {
        // Authentication failed
        return back()->withInput($request->only('email'))->withErrors([
            'password' => 'The provided credentials are incorrect.',
        ]);
    }
}
}
