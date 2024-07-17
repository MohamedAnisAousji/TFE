<x-Client-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-2xl font-bold text-center my-4">Ajouter un Enfant</h1>
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Erreur!</strong>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('createenfant')}}" class="mt-4">
                    @csrf
                    
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

                    <div class="mb-4">
                        <p class="block text-gray-700 text-sm font-bold mb-2">Taille de l'enfant :</p>
                        <div class="flex items-center">
                            <input type="radio" id="plus_un_metre" name="taille_enfant" value="plus_un_metre" class="mr-2" required>
                            <label for="plus_un_metre" class="mr-4">+1M</label>
                            <input type="radio" id="moins_un_metre" name="taille_enfant" value="moins_un_metre" class="mr-2" required>
                            <label for="moins_un_metre">Moins d'un mètre</label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="/addformule" class="text-blue-500 hover:text-blue-700"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-Client-layout>


