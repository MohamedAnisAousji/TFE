<x-Client-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">Modifier Enfant</h2>
            <form action="{{ route('enfants.update', $enfant->id) }}" method="POST">
                @csrf
             

                <div class="mb-4">
                    <label for="Nom_enfant" class="block text-gray-700 text-sm font-bold mb-2">Nom de l'enfant:</label>
                    <input type="text" id="Nom_enfant" name="Nom_enfant" value="{{ $enfant->Nom_enfant }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="Prenom_enfant" class="block text-gray-700 text-sm font-bold mb-2">Prénom de l'enfant:</label>
                    <input type="text" id="Prenom_enfant" name="Prenom_enfant" value="{{ $enfant->Prenom_enfant }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="Date_Naissance" class="block text-gray-700 text-sm font-bold mb-2">Date de Naissance:</label>
                    <input type="date" id="Date_Naissance" name="Date_Naissance" value="{{ $enfant->Date_Naissance->toDateString() }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Sauvegarder les Modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>
