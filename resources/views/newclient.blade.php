<x-app-layout>
<h1 class="text-2xl font-bold text-blue-400 text-center ">Clients</h1>
    <div class="flex justify-center items-center min-h-screen">
        <div class="mt-5 w-full max-w-md">
            <form method="POST" action="{{ route('storeclients') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Erreur!</strong>
                        <span class="block sm:inline">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </span>
                    </div>
                @endif

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Nom_Parent">
                        Nom du parent:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="Nom_Parent" name="Nom_Parent" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Prenom_parent">
                        Prénom du parent:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="Prenom_parent" name="Prenom_Parent" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Genre du parent:</label>
                    <div class="flex items-center">
                        <input type="radio" id="genreHomme" name="Genre" value="0" class="mr-2" required>
                        <label for="genreHomme" class="mr-4">Homme</label>
                        <input type="radio" id="genreFemme" name="Genre" value="1" class="mr-2" required>
                        <label for="genreFemme">Femme</label>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Email">
                        Email:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="Email" name="Email" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Envoie email:</label>
                    <div class="flex items-center">
                        <input type="radio" id="Envoi_Email_Oui" name="Envoi_Email" value="1" class="mr-2" required>
                        <label for="Envoi_Email_Oui" class="mr-4">Oui</label>
                        <input type="radio" id="Envoi_Email_Non" name="Envoi_Email" value="0" class="mr-2" required>
                        <label for="Envoi_Email_Non">Non</label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Ajouter le client
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

