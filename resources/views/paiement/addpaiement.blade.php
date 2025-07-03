<x-Client-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white p-5 rounded shadow">

            <!-- Affichage des erreurs -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>Erreur(s) :</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2 class="text-2xl font-bold mb-4">Facture pour la Réservation</h2>

            <p><strong>ID Réservation :</strong> {{ $reservation->id }}</p>
            <p><strong>ID Client :</strong> {{ $client->id }}</p>
            <p><strong>Nom Client :</strong> {{ $client->nom_Parent }}</p>
            <p><strong>Montant à Payer :</strong> {{ $formule->montant }} €</p>

            <form method="POST" action="{{ route('paiement.store.facture') }}">
                @csrf

                <!-- Champs cachés -->
                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                <input type="hidden" name="client_id" value="{{ $client->id }}">

                <!-- Montant -->
                <div class="mt-4 w-full md:w-1/2">
                    <label for="montant_paiement">Montant du Paiement:</label>
                    <input type="number" id="montant_paiement" name="montant_paiement"
                           value="{{ $formule->montant }}"
                           class="mt-1 block w-full bg-gray-100 cursor-not-allowed"
                           readonly>
                </div>

                <!-- Date -->
                <div class="mt-4 w-full md:w-1/2">
                    <label for="date_paiementr">Date de Paiement:</label>
                    <input type="date" id="date_paiementr" name="date_paiementr"
                           value="{{ date('Y-m-d') }}"
                           class="mt-1 block w-full bg-gray-100 cursor-not-allowed"
                           readonly>
                </div>

                <!-- Type de Paiement -->
                <div class="mt-4">
                    <label class="block font-semibold mb-2">Type de Paiement:</label>
                    <label class="mr-4">
                        <input type="radio" name="paiement_type" value="en_ligne" required>
                        Payer en ligne
                    </label>
                    <label>
                        <input type="radio" name="paiement_type" value="sur_place" required>
                        Payer sur place
                    </label>
                </div>

                <!-- Bouton de validation -->
                <div class="mt-6">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Confirmer la Facturation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>


