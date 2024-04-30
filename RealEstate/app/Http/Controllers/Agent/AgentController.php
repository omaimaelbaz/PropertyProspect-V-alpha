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

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'address' => 'required',
    //         'city' => 'required',
    //         'year_built' => 'required',
    //         'size_area' => 'required',
    //         'num_bedrooms' => 'required',
    //         'num_bathrooms' => 'required',
    //         'status' => 'required',
    //         'price' => 'required',
    //         'description' => 'required',
    //         'category_id' => 'required',
    //         'url.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Save the property details
    //     $property = new properties();
    //     $property->name = $validatedData['name'];
    //     $property->address = $validatedData['address'];
    //     $property->city = $validatedData['city'];
    //     $property->year_built = $validatedData['year_built'];
    //     $property->size_area = $validatedData['size_area'];
    //     $property->num_bedrooms = $validatedData['num_bedrooms'];
    //     $property->num_bathrooms = $validatedData['num_bathrooms'];
    //     $property->status = $validatedData['status'];
    //     $property->price = $validatedData['price'];
    //     $property->description = $validatedData['description'];
    //     $property->category_id = $validatedData['category_id'];
    //     $property->is_published = 0;
    //     $property->user_id = Auth::user()->id;
    //     $property->save();

    //     // Handle file uploads
    //     if ($request->hasFile('url')) {
    //         foreach ($request->file('url') as $imageFile) {
    //             $filename = uniqid().'.'.$imageFile->getClientOriginalExtension();
    //             Storage::putFileAs('public/images', $imageFile, $filename);

    //             // Save image details to the database
    //             $image = new Images();
    //             $image->property_id = $property->id;
    //             $image->url = $filename;
    //             $image->save();
    //         }
    //     }

    //     return redirect('/agent');
    // }

    public function store(Request $request)
{
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
        'url.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Save the property details
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
    $property->is_published = 0;
    $property->user_id = Auth::user()->id;
    $property->save();

    // Handle file uploads
    $imageUrls = [];
    if ($request->hasFile('url')) {
        foreach ($request->file('url') as $imageFile) {
            $filename = uniqid().'.'.$imageFile->getClientOriginalExtension();
            Storage::putFileAs('public/images', $imageFile, $filename);
            $imageUrls[] = $filename;
        }
    }

    // Save the array of image URLs as a serialized string
    $property->image_urls = serialize($imageUrls);
    $property->save();

    return redirect('/agent');
}

}
