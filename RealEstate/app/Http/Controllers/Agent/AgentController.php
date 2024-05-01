<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Images;
use App\Models\properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Request;

class AgentController extends Controller
{
    public function index()
    {
        return view('Agent.index');
    }

    public function getProperty()
    {
        $properties = properties::get();

        return view('Agent.property', compact('properties'));

    }

    public function create()
    {
        $properties = properties::get();
        $categories = categories::get();

        return view('Agent.addProperty', compact('properties', 'categories'));

    }

    public function store(Request $request)
    {
        // $properties = properties::find($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'year_built' => 'required',
            'size_area' => 'required',
            'num_bedrooms' => 'required',
            'num_bathrooms' => 'required',
            'status' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'url.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $property = new properties();
        $property->name = $validatedData['name'];
        $property->address = $validatedData['address'];
        $property->city = $validatedData['city'];
        $property->year_built = $validatedData['year_built'];
        $property->size_area = $validatedData['size_area'];
        $property->num_bedrooms = $validatedData['num_bedrooms'];
        $property->num_bathrooms = $validatedData['num_bathrooms'];
        $property->status = $validatedData['status'];
        $property->price = $validatedData['price'];
        $property->description = $validatedData['description'];
        $property->category_id = $validatedData['category_id'];
        $property->postStatus = 'pending';
        $property->user_id = Auth::user()->id;
        $property->save();

        $imagesData = [];
        if ($files = $request->file('url')) {
            foreach ($files as $file) {
                $extention = uniqid().'.'.$file->getClientOriginalExtension();
                $filename =time(). '.' .$extention;
                $path = 'storage/images';
                $file->move($path,$filename);

                $imagesData[] = [

                    'url' => $filename,
                    'property_id' => $property->id,
                ];
                Images::insert($imagesData);

        }

        return redirect('/agent');
    }



}}
