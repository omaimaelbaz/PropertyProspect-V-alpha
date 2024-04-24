<?php
namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyTypes;
use App\Models\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $props = Properties::with('images','PropertyTypes','user')->find($id);

        $CategoryId = $props->property_types_id;

        $relatedCategory = Properties::where('property_types_id',  $CategoryId)
        ->where('id', '!=', $id)
        ->with('images','PropertyTypes')->get();

        //
        $countRequest = Requests::where('property_id',$id)
        ->where('user_id', Auth::user()->id)->count();

        //  dd($countRequest);





        return view('User.property-details', compact('props','relatedCategory','countRequest'));
    }

}
