<x-app-layout>
    <h1 class="text-2xl font-bold text-orange-400 text-center">Liste des Enfants</h1>
    <p>&nbsp;</p>
    <div class="container mx-auto px-4">
        @if(session('success'))
            <div class="bg-green-100">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('listenfants')}}" method="GET">
        @csrf
        <div class="container">
            <div class="grid grid-cols-4">
                <div class="bg-pink-200 p-2">Nom</div>
                <div class="bg-pink-200 p-2">Prénom</div>
                <div class="bg-pink-200 p-2">Date de Naissance</div>
                <div class="bg-pink-200 p-2">Parent</div>
            </div>
            @foreach($enfants as $index => $enfant)
                @php $rowClass = $index % 2 === 0 ? 'bg-pink-100' : 'bg-pink-400'; @endphp
                <div class="grid grid-cols-4 {{ $rowClass }} p-2">
                    <div>{{ $enfant->Nom_enfant }}</div>
                    <div>{{ $enfant->Prenom_enfant }}</div>
                    <div>{{ $enfant->Date_Naissance }}</div>
                    <div>{{ $enfant->client ? $enfant->client->Nom_Parent : 'Non assigné' }}</div>
                </div>
            @endforeach
        </div>
        </form>
    </div>
</x-app-layout>


