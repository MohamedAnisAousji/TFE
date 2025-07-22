<x-app-layout>
    <h1 class="text-2xl font-bold text-orange-400 text-center ">Clients</h1>
    <p>&nbsp;</p>

    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 items-center">
            <div>
                <a href="{{ route('newclient') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Ajouter Client</a>
            </div>

            <div class="text-right">
                <form action="{{ route('listclients') }}" method="GET">
                    <input type="text" name="search" placeholder="Recherche..." class="px-4 py-2 border rounded-l">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <p>&nbsp;</p>

    @if(session('success'))
        <div class="bg-green-100 p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{ $clients->links() }}

    <div class="container">
        <div class="grid grid-cols-7 font-bold bg-pink-200 p-2">
            <div>Nom</div>
            <div>Prénom</div>
            <div>Genre</div>
            <div>Enfants</div>
            <div>Envoi Email</div>
            <div>Email</div>
            <div>Action</div>
        </div>

        @foreach($clients as $index => $client)
            @php $rowClass = $index % 2 === 0 ? 'bg-pink-100' : 'bg-pink-400'; @endphp
            <div class="grid grid-cols-7 {{ $rowClass }} p-2">
                <div>{{ $client->nom_parent }}</div>
                <div>{{ $client->prenom_parent }}</div>
                <div>
                    @if($client->genre_parent === 'M')
                        <i class="fa-solid fa-person"></i>
                    @else
                        <i class="fa-solid fa-person-dress"></i>
                    @endif
                </div>
                <div>
                    @foreach($client->enfants ?? [] as $enfant)
                        <a href="/enfant/{{ $enfant->id }}">{{ $enfant->Nom_enfant }}</a><br/>
                    @endforeach
                </div>
                <div>
                    @if($client->envoi_mail)
                        <i class="fa-sharp fa-solid fa-square-check text-green-600"></i>
                    @else
                        <i class="fa-solid fa-circle-xmark text-red-600"></i>
                    @endif
                </div>
                <div><a href="/Email">{{ $client->email }}</a></div>
                <div class="flex space-x-2">
                    <a href="/editclient/{{ $client->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/deleteclient/{{ $client->id }}"><i class="fa-solid fa-trash text-red-500"></i></a>
                    <a href="/enfants/{{ $client->id }}"><i class="fa-solid fa-square-plus"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
