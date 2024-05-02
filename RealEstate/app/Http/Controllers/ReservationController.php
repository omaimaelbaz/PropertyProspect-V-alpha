<?php

namespace App\Http\Controllers;

use App\Models\properties;
use App\Models\Reservations;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index($id)
    {
        $property_id = $id;
        $reservation = Reservations::get();

        return view('User.reservation', compact( 'reservation', 'property_id'));
    }

    // public function reserverNow(Request $request)
    // {
    //     $dataValidation = $request->validate([
    //         'start_date' => 'required|date|after_or_equal:today',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //         'user_id' => 'required',
    //         'property_id' => 'required',
    //     ]);
    //     $reservation = Reservations::create($dataValidation);
    //     $prop=properties::find($dataValidation['property_id']);

    //     $checkStatus = Reservations::where('room_id', '=', $prop->id)->get();

    //     foreach ($checkStatus as $checkStatu) {
    //         if (!$prop->isAvailableForBooking($checkin, $checkout) && $checkStatu->status != 'cancelled') {

    //             return redirect()->back()->with('failed', 'The room is not available for the selected dates.');
    //         }
    //     }
    //     if (! $reservation) {
    //         return redirect('/reserver')->with('success', 'Reservation failed. Please try again.');
    //     }
    //     $prop = properties::where('id', $request->property_id)->first();
    //     $prop->status = 'soldout';
    //     $prop->save();

    //     return redirect('/reserver')->with('success', 'Your reservation is done.');

    // }
    public function reserverNow(Request $request)
    {
        $dataValidation = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'required',
            'property_id' => 'required',
        ]);

        // Find the property
        $prop = properties::find($dataValidation['property_id']);

        // Check if the property is available for booking
        $availabilityMessage = $prop->isAvailableForBooking($request->start_date, $request->end_date);
        if ($availabilityMessage) {
            // Property is not available for booking, so return a failure message
            return redirect()->back()->with('failed', $availabilityMessage);
        }

        // Create a reservation
        $reservation = Reservations::create($dataValidation);

        // Update property status
        $prop->status = 'soldout';
        $prop->save();

        // Check if the reservation was created successfully
        if (!$reservation) {
            return redirect('/reserver')->with('failed', 'Reservation failed. Please try again.');
        }

        return redirect()->back()->with('seccess','reservation seccess');
        }




    public function CancelReservation($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status = 'concelled';

    }
}
