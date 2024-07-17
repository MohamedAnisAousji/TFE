<x-Client-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white p-5 rounded shadow">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2 class="text-2xl font-bold mb-4">Facture pour la Réservation</h2>
            <p>ID Client : {{ $client->id }}</p>
            <p>Nom Client : {{ $client->Nom_Parent }}</p>
            <p>Montant à Payer : {{ $formule->Montant }}€</p>

            <form method="POST" action="{{ route('paiement.store.facture') }}">
                @csrf
                <input type="hidden" name="client_id" value="{{ $client->id }}">

                <div class="mt-4" style="width: 50%;">
                    <label for="montant_paiement">Montant du Paiement:</label>
                    <input type="number" id="montant_paiement" name="montant_paiement" value="{{ $formule->Montant }}" class="mt-1 block w-full" readonly style="background-color: #f3f4f6; cursor: not-allowed;">
                </div>

                <div class="mt-4" style="width: 50%;">
                    <label for="date_paiementr">Date de Paiement:</label>
                    <input type="date" id="date_paiementr" name="date_paiementr" value="{{ date('Y-m-d') }}" class="mt-1 block w-full" readonly style="background-color: #f3f4f6; cursor: not-allowed;">
                </div>

                <div class="mt-4">
                    <label>
                        <input type="radio" name="paiement_type" value="en_ligne">
                        Payer en ligne
                    </label>
                    <label>
                        <input type="radio" name="paiement_type" value="sur_place">
                        Payer sur place
                    </label>
                </div>

                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Confirmer la Facturation
                </button>
            </form>
        </div>
    </div>
</x-Client-layout>
