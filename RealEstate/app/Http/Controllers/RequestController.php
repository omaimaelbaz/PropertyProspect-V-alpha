<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Property;
use App\Models\Requests; // Import the Requests model
use Illuminate\Http\Request as HttpRequest; // Import the HttpRequest class
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function SendRequest(HttpRequest $request)
{
//    dd($request);



    // Validation des données du formulaire
    $validateData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
        'agent_id' => 'required',
        'property_id' => 'required',
        'user_id' => 'required',
    ]);

    $requestObject = Requests::create($validateData);

 


    return redirect('/details/'.$requestObject->property_id);
}

}
