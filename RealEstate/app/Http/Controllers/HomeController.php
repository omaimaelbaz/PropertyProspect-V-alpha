<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyTypes;
use App\Models\User;
use App\Models\wishlists;
use PhpParser\Node\Expr\PropertyFetch;

class HomeController extends Controller
{

    public function Showprofile()
    {
        return view('User.profile');
    }

    public function updateProfile(Request $request)
    {
        // dd($request);
        // $user = auth()->user();
        $user = User::find(auth()->user()->id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Address' => 'required',
            'City' => 'required',
        ]);


        $user->update($validatedData);

        return redirect('/profile');
    }

    public function ShowWishlist()
    {
        $wishlist = Wishlists::with('user','property')->get();

        return view('User.wishlist',compact('wishlist'));
    }
    public function addwishlist($id)
    {

        $wishlistItem = wishlists::where('property_id',$id)->where('user_id', auth()->user()->id)->count();

        // dd(wishlists::where('property_id',$id)->where('user_id', auth()->user()->id));

        if($wishlistItem == 0)
        {
          wishlists::create([
                'property_id' => $id,
                'user_id' => auth()->user()->id,

            ]);
        }

            return redirect()->back();
    }


    public function index()
    {
        $filter2 = Properties::get();
        $filter1 = PropertyTypes::get();


        return view('User.index',compact('filter1','filter2'));
    }

    public function filter(Request $request)
    {
        $query1 = PropertyTypes::query();
        $query2 = Properties::query();

        // Check if list_types parameter exists
        if ($request->has('list_types')) {
            $listingType = $request->list_types;
            // Adjust filtering logic
            $query1->where('name', $listingType);
        }

        // Check if offer_types parameter exists
        if ($request->has('offer_types')) {
            $offerTypes = $request->offer_types;
            // Adjust filtering logic
            switch ($offerTypes) {
                case 'rent':
                case 'soldout':
                case 'sale':
                    $query2->where('status', $offerTypes);
                    break;
            }
        }
        if ($offerTypes !== 'all') { // If a specific status is selected
            $query2->where('status', $offerTypes);
        }

        $filter1 = $query1->get();
        $filter2 = $query2->get();
        // dd($filter2);

        return view('User.index', compact('filter1', 'filter2'));
    }






}

