<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyTypes;
use App\Models\User;

class HomeController extends Controller
{

    public function Showprofile()
    {
        return view('User.profile');
    }

    public function updateProfile(Request $request)
    {
        // dd($request);
        // $user = auth()->user();
        $user = User::find(auth()->user()->id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Address' => 'required',
            'City' => 'required',
        ]);


        $user->update($validatedData);

        return redirect('/profile');
    }

    public function ShowWishlist()
    {
        return view('User.wishlist');
    }
    public function addwishlist()
    {
                
    }


    public function index()
    {
        $props = Properties::get();
        $types = PropertyTypes::get();
        return view('User.index',compact('props','types'));
    }


}

