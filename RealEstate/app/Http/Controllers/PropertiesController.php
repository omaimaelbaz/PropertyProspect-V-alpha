<?php
namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyType; 

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function getProps()
    {
        $props = Properties::get();
        $imgs = Images::get();

        return view('User.propertie', compact('props', 'imgs'));
    }

    public function getDetails()
    {
        $props = Properties::get();
        $imgs = Images::get();
        $propType = PropertyType::get(); // Use PropertyType model
        return view('User.property-details', compact('props', 'imgs', 'propType'));
    }
}
