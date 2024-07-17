<x-app-layout>
    <h1 class="text-2xl font-bold text-orange-400 text-center ">Clients</h1>
    <p>&nbsp;</p>
    <div class="container mx-auto px-4">
  <div class="grid grid-cols-2 items-center">
    <!-- Bouton à gauche -->
    <div>
    <a href="{{ route('newclient') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded ">Ajouter Client</a>
    </div>

    <!-- Formulaire de recherche à droite -->
    <div class="text-right">
      <form action="{{ route('listclients')}}" method="GET">
        <input type="text" name="search" placeholder="Recherche..." class="px-4 py-2 border rounded-l">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r"><i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
  </div>
</div>

   
    <p>&nbsp;</p>
    @if(session('success'))
        <div class="bg-green-100">
            {{ session('success') }}
        </div>
    @endif
    {{$clients->links()}}
    <div class="container">
        <div class="grid grid-cols-7 ">
            <div class="bg-pink-200 p-2">Nom</div>
            <div class="bg-pink-200 p-2">Prénom</div>
            <div class="bg-pink-200 p-2">Genre</div>
            <div class="bg-pink-200 p-2">Enfants</div>
            <div class="bg-pink-200 p-2">Envoi Email</div>
            <div class="bg-pink-200 p-2">Email</div>
            <div class="bg-pink-200 p-2">Action</div>

            @foreach($clients as $index => $client)
                @php $rowClass = $index % 2 === 0 ? 'bg-pink-100' : 'bg-pink-400'; @endphp
                <div class="{{ $rowClass }} p-2">{{ $client->Nom_Parent }}</div>
                <div class="{{ $rowClass }} p-2">{{ $client->Prenom_Parent }}</div>
                <div class="{{ $rowClass }} p-2">
                @if($client->Genre)
                <i class="fa-solid fa-person"></i>
                @else
                <i class="fa-solid fa-person-dress"></i>
                @endif
                </div>
                <div class="{{ $rowClass }} p-2">
                    @foreach($client->enfants as $enfant)
                        <a href="/enfant/{{ $enfant->id }}">{{ $enfant->Nom_enfant }}</a><br/>
                    @endforeach
                </div>
                <div class="{{ $rowClass }} p-2">
                @if($client->Envoi_Email)
                <i class="fa-sharp fa-solid fa-square-check"></i>
                @else
                <i class="fa-solid fa-circle-xmark"></i>
                @endif
                </div>
                <div class="{{ $rowClass }} p-2"><a href="/Email">{{ $client->Email }}</a></div>
                <div class="{{ $rowClass }} p-2">
                    <a href="/editclient/{{$client->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/deleteclient/{{$client->id}}"><i class="fa-solid fa-trash text-red-500"></i></a>
                    <a href="/enfants/{{$client->id}}"><i class="fa-solid fa-square-plus"></i></a>
                </div>
            @endforeach
        </div> 
    </div>
</x-app-layout>