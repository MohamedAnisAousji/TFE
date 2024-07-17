<x-Client-layout>
    <div class="py-12">
    <p>&nbsp;</p>
    <div class="container mx-auto px-4">
        @if(session('success'))
            <div class="bg-green-100">
                {{ session('success') }}
            </div>
        @endif
    <form action="{{ route('clients.index')}}" method="GET">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nom du Client</th>
                                <th class="px-4 py-2">Formule Choisie</th>
                                <th class="px-4 py-2">Montant à Payer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                @foreach ($client->formules as $formule)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $client->name }}</td>
                                        <td class="border px-4 py-2">{{ $formule->nom_formule }}</td>
                                        <td class="border px-4 py-2">{{ $formule->Montant }}€</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-Client-layout>