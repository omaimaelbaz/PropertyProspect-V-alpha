<?php

namespace App\Http\Controllers;
use  App\Models\Images;
use  App\Models\properties;

class PropertiesController extends Controller
{
    public function GetProps()
    {
        $props = properties::get();
        $img = Images::get();
        // dd($img);

        return view('User.proprty',compact('props','img'));
    }


}
