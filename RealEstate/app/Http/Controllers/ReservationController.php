<?php

namespace App\Http\Controllers;

use App\Models\properties;
use App\Models\Reservations;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $props = properties::all();
        $reservation = Reservations::get();
         return view('User.reservation',compact('props','reservation'));
    }
    public function reserverNow(Request $request)
    {
        $dataValidation = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'required',
            'agent_id' => 'required',
            'property_id' => 'required'
        ]);

    $isAvailable = $this->checkAvailability($dataValidation['start_date'], $dataValidation['end_date'], $dataValidation['property_id']);

    if (!$isAvailable) {
        return redirect('/reserver')->withInput()->with('error', 'The selected dates are not available for reservation.');
    }


        $reservation = Reservations::create($dataValidation);
        if (!$reservation) {
            return redirect('/reserver')->with('success', 'Reservation failed. Please try again.');
        }

        return redirect('/reserver')->with('success', 'Your reservation is done.');

    }
    public function CancelReservation($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status="concelled";

    }
}
