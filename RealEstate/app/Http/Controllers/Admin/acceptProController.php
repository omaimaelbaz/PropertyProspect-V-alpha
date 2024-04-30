<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\properties;

class acceptProController extends Controller
{
    public function displayProperty()
    {
        $property = properties::get();
        return view('Admin.property',compact('property'));
    }
}
