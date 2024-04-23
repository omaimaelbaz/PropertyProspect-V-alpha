<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyTypes;



class HomeController extends Controller
{
    public function index()
    {
        $props = Properties::get();
        $types = PropertyTypes::get();
        return view('User.index',compact('props','types'));
    }

}
