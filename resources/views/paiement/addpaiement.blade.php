<x-Client-layout>
<div class="relative min-h-screen flex items-center justify-end px-8">
    <!-- Overlay clair -->
    <div class="absolute inset-0 bg-white opacity-40 z-0"></div>

    <!-- Image de fond -->
    <div class="absolute inset-0 bg-cover bg-center z-[-1]"
         style="background-image: url('{{ asset('images/facture-bg1.png') }}'); filter: brightness(1.5);">
    </div>

        <!-- 💬 Bulle commentaire à gauche -->
        <div class="absolute left-8 top-1/2 transform -translate-y-1/2 max-w-sm">
            <div class="bg-blue-100 text-blue-900 p-4 rounded-xl shadow-md relative">
                <span class="text-lg font-semibold flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-9-1h2v6H9V9zm0-4h2v2H9V5z"/>
                    </svg>
                    💡 Info Facturation
                </span>
                <p class="text-sm leading-snug">
                    Vous êtes sur le point de générer une facture pour cette réservation. Veuillez choisir le type de paiement souhaité.
                </p>

                <!-- Flèche bulle -->
                <div class="absolute -right-2 top-6 w-0 h-0 border-t-[10px] border-t-transparent border-b-[10px] border-b-transparent border-l-[10px] border-l-blue-100"></div>
            </div>
        </div>

        <!-- 📋 Formulaire facturation -->
        <div class="bg-white bg-opacity-90 backdrop-blur-sm p-8 rounded-2xl shadow-xl w-full max-w-xl">
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

            <h2 class="text-2xl font-bold mb-4 text-center text-indigo-700">🧾 Facture pour la Réservation</h2>

            <p><strong>ID Réservation :</strong> {{ $reservation->id }}</p>
            <p><strong>ID Client :</strong> {{ $client->id }}</p>
            <p><strong>Nom Client :</strong> {{ $client->nom_Parent }}</p>
            <p><strong>Montant à Payer :</strong> {{ $formule->montant }} €</p>

            <form method="POST" action="{{ route('paiement.store.facture') }}">
                @csrf

                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                <input type="hidden" name="client_id" value="{{ $client->id }}">

                <div class="mt-4">
                    <label for="montant_paiement" class="font-medium">💶 Montant :</label>
                    <input type="number" id="montant_paiement" name="montant_paiement"
                        value="{{ $formule->montant }}"
                        class="mt-1 block w-full bg-gray-100 rounded-md cursor-not-allowed" readonly>
                </div>

                <div class="mt-4">
                    <label for="date_paiementr" class="font-medium">📅 Date :</label>
                    <input type="date" id="date_paiementr" name="date_paiementr"
                        value="{{ date('Y-m-d') }}"
                        class="mt-1 block w-full bg-gray-100 rounded-md cursor-not-allowed" readonly>
                </div>

                <div class="mt-4">
                    <label class="block font-medium mb-2">💳 Type de Paiement :</label>
                    <div class="space-x-4">
                        <label><input type="radio" name="paiement_type" value="en_ligne" required> En ligne</label>
                        <label><input type="radio" name="paiement_type" value="sur_place" required> Sur place</label>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow transition">
                        Confirmer la Facturation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>
