<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-center my-4">Ajouter un Enfant</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('storeEnfant')}}" >
        @csrf
            <input type='hidden' name='parent_id' id='parent_id' value='{{ $parent_id}}'/>
            <div class="mb-4">
                <label for="Nom_enfant" class="block text-gray-700 text-sm font-bold mb-2">Nom de l'enfant</label>
                <input type="text" name="Nom_enfant" id="Nom_enfant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="Prenom_enfant" class="block text-gray-700 text-sm font-bold mb-2">Prénom de l'enfant</label>
                <input type="text" name="Prenom_enfant" id="Prenom_enfant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="Date_Naissance" class="block text-gray-700 text-sm font-bold mb-2">Date de naissance</label>
                <input type="date" name="Date_Naissance" id="Date_Naissance" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>



            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
