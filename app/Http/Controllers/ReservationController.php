<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create()
    {
        $client = Auth::guard('client')->user();
        return view('reservation.create', compact('client'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Date' => 'required|date',
            'heure_resrv' => 'required|date_format:H:i',
        ]);

        $reservation = new Reservation();
        $reservation->date = $request->Date;
        $reservation->heure = $request->heure_resrv;
        $reservation->client_id = Auth::guard('client')->id();

        $reservation->save();

        // Envoyer l'ID de la réservation à l'étape suivante (formule)
        return redirect()->route('create.formules')->with('reservation_id', $reservation->id);
    }

    



}
