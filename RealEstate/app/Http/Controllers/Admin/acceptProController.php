<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\properties;
use App\Models\User;

class acceptProController extends Controller
{
    public function displayProperty()
    {
        $property = properties::get();
        $users = User::all();
        return view('Admin.property',compact('property','users'));
    }

    public function acceptProperty($id)
    {
        $data = properties::find($id);
        $data->postStatus = 'active';
        $data->save();
        return redirect('/property')->with('message','status of property updated');

    }

    public function rejectProperty($id)
    {
        $data = properties::find($id);
        $data->postStatus = 'pending';
        $data->save();
        return redirect('/property')->with('message','status of property updated ');

    }
}
