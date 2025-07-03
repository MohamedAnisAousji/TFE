<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\formule;
use App\Models\Enfant;
use App\Models\Reservation;
use Illuminate\Http\Request;

class FormuleController extends Controller
{
    public function createFormule()
    {
        // On récupère la dernière réservation du client
        $reservation = Reservation::where('client_id', auth()->guard('client')->id())
                          ->with('formule') // relation avec formule
                          ->latest()
                          ->first();

        $formule = $reservation?->formule;


        if (!$reservation) {
            return redirect()->route('reservations.create')->withErrors('Aucune réservation trouvée.');
        }

        return view('formules.addformule', compact('reservation'));
    }

    public function storeFormule(Request $request)
    {
        $request->validate([
            'nom_formule'    => 'required|string|max:100',
            'desc_formules'  => 'required|string|max:200',
            'montant'        => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $formule = new Formule();
        $formule->nom_formule    = $request->nom_formule;
        $formule->desc_formules  = $request->desc_formules;
        $formule->montant        = floatval($request->montant);
        $formule->save();

        // On met à jour la dernière réservation avec l’ID de la formule choisie
        $reservation = Reservation::where('client_id', auth()->guard('client')->id())
                                  ->orderBy('created_at', 'desc')
                                  ->first();


        if ($reservation) {
            $reservation->formule_id = $formule->id;
            $reservation->save();
        }

       return redirect()->route('paiements.facture', ['reservationId' => $reservation->id])
                 ->with('success', 'Formule enregistrée et liée à la réservation.');
    }

}
