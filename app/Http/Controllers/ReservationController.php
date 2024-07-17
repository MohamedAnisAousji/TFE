<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createR()
    {
        return view ("inscription");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les entrées de l'utilisateur
        $request->validate([
            'Date' => 'required|date',
            'heure_resrv' => 'required|date_format:H:i'
        ]);
    
        // Créer une nouvelle instance de Reservation
        $reservation = new Reservation();
        $reservation->Date = $request->Date;
        $reservation->heure_resrv = $request->heure_resrv;
    
        // Utiliser l'ID du client authentifié pour le client_id
        $reservation->client_id = auth()->guard('client')->id();
    
        // Enregistrer la nouvelle réservation
        $reservation->save();
    
        // Rediriger l'utilisateur vers une route de succès
        return redirect()->route('dashbord.client')->with('success', 'Réservation  ajouté avec succès.');
    }
    

    /**
     * Display the specified resource.
     */
    public function create()
    {

        $client = auth()->guard('client')->user(); // Assurez-vous que le guard est correctement configuré
        return view('/reservation/create', compact('client'));
    }

    /**
     * show the reservation
     */
    public function showReservations()
    {
        $client_id = auth()->guard('client')->id(); // Assurez-vous que l'utilisateur est authentifié avec le guard 'client'
        $reservations = Reservation::where('client_id', $client_id)->get();
        return view('reservation.show', compact('reservations'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
