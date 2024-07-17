<x-app-layout>

    <div class="overflow-x-auto relative">
    <div class="flex justify-between items-center mb-4">
            <div class="text-lg">Liste des événements</div>
            <form action="{{ route('evenements.create') }}" method="GET"> 
                @csrf
                <a href="/newevenements"><i class="fa-solid fa-square-plus">Add</i></a>
                  
            </form>
        </div>    
    
    
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">Date de début</th>
                    <th scope="col" class="py-3 px-6">Date de fin</th>
                    <th scope="col" class="py-3 px-6">Capacité</th>
                    <th scope="col" class="py-3 px-6">Statut</th>
                    <th scope="col" class="py-3 px-6">Nom de la société</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Formule demandée</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evenements as $evenement)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">{{ $evenement->date_debut }}</td>
                    <td class="py-4 px-6">{{ $evenement->date_fin }}</td>
                    <td class="py-4 px-6">{{ $evenement->capacite }}</td>
                    <td class="py-4 px-6">{{ $evenement->status }}</td>
                    <td class="py-4 px-6">{{ $evenement->nom_societe }}</td>
                    <td class="py-4 px-6">{{ $evenement->email }}</td>
                    <td class="py-4 px-6">{{ $evenement->formule_demande }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>





