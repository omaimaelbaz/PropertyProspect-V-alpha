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
         return view('User.reservation',compact('props'));
    }
    public function reserverNow(Request $request)
    {
        $dataValidation = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',
            'agent_id' => 'required',
            'property_id' => 'required'
        ]);

        $reservation = Reservations::create($dataValidation);
        return redirect('/reserver');

    }
    public function CancelReservation($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status="concelled";
        
    }
}
