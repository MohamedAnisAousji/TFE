<x-Client-layout>
    <!-- Barre supérieure avec le titre -->
    <div class="bg-orange-500 text-black py-4 shadow-md">
        <h1 class="text-2xl font-bold text-center">Liste des Enfants</h1>
    </div>

    <div class="container mx-auto px-4 mt-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('enfants.mesenfants') }}" method="GET">
            @csrf
            <!-- Grille pour les cartes des enfants -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($enfants as $enfant)
                    @php
                        $birthDate = new DateTime($enfant->Date_Naissance);
                        $currentDate = new DateTime();
                        $age = $currentDate->diff($birthDate)->y;
                    @endphp
                    <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-200 hover:shadow-xl transition">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $enfant->Nom_enfant }} {{ $enfant->Prenom_enfant }}</h2>
                        <p class="text-gray-600"><strong>Âge:</strong> {{ $age }} ans</p>
                        <p class="text-gray-600"><strong>Date de Naissance:</strong> {{ $enfant->Date_Naissance }}</p>
                        <p class="text-gray-600"><strong>Parent:</strong> {{ $enfant->client ? $enfant->client->Nom_Parent : 'Non assigné' }}</p>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
</x-Client-layout>
