<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\properties;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = properties::all();

        // dd($properties);
        return view('User.home', compact('properties'));
    }

    public function profile()
    {
        return view('User.profile');
    }

    public function updateProfile(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Address' => 'required',
            'City' => 'required',
        ]);

        $user->update($validatedData);

        return redirect('/');
    }

    public function getDetails($id)
    {
        $properties = properties::find($id);


        $prop = $id;

        return view('User.Details', compact('properties', 'prop'));
    }



    public function reservationHistory(){
        $reservations = Reservations::where('user_id',auth()->user()->id)->get();
        return view('User.ReservationHistory', compact('reservations'));

    }
    public function annullerReservation($id){


        dd('ss');
        // Find the reservation by its ID
        $reservation = Reservations::find($id);

        // Check if the reservation exists
        if(!$reservation){

            // If the reservation does not exist, redirect back with an error message
            return back()->with('error', 'Reservation not found.');
        }

        // Delete the reservation
        $reservation->delete();

        // Redirect back with a success message
        return back()->with('success', 'Reservation canceled successfully.');
    }


}
