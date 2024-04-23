<?php
namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyTypes;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function getProps()
    {
        $props = Properties::get();
        $imgs = Images::get();

        return view('User.propertie', compact('props'));
    }

    public function getDetails($id)
    {



        $props = Properties::with('images','PropertyTypes')->find($id);

        //  dd($props);
        return view('User.property-details', compact('props'));
    }

}
