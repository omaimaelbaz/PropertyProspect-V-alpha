<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Properties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function getProps()
    {

        $props = Properties::get();
        $imgs = Images::get();
        // dd($props);

        return view('User.propertie', compact('props', 'imgs'));
    }



}

