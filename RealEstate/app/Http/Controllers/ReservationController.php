<?php

namespace App\Http\Controllers;

use App\Models\properties;
use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $props = properties::all();
        $reservation = Reservations::get();

        return view('User.reservation', compact('props', 'reservation'));
    }

    public function reserverNow(Request $request)
    {
        $dataValidation = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'required',
            'agent_id' => 'required',
            'property_id' => 'required',
        ]);

        $reservation = Reservations::create($dataValidation);
        if (! $reservation) {
            return redirect('/reserver')->with('success', 'Reservation failed. Please try again.');
        }

        return redirect('/reserver')->with('success', 'Your reservation is done.');

    }

    public function CancelReservation($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status = 'concelled';

    }
}
