<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Properties;



class HomeController extends Controller
{
    public function index()
    {
        $props = Properties::get();
        // dd($props);
        $imgs = Images::get();
        return view('User.index',compact('props','imgs'));
    }

}
