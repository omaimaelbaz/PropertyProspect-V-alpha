<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\properties;
use App\Models\User;
use App\Models\wishlists;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = properties::all();
        // dd($properties);
        return view('User.home' ,compact('properties'));
    }

    public function profile()
    {
        return view('User.profile');
    }

    public function updateProfile(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Address' => 'required',
            'City' => 'required',
        ]);

        $user->update($validatedData);

        return redirect('/');
    }


    public function getDetails($id)
    {
        $properties = properties::find($id)->get();
        $images = Images::get();
        return view('User.Details',compact('properties','images'));
    }

}
