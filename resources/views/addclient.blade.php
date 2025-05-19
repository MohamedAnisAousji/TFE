<x-Client-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 px-4">
        <h1 class="text-3xl font-bold text-blue-500 mb-6">Inscription Client</h1>

        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
            <form method="POST" action="{{ route('saveclient') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="nom_parent" class="block text-sm font-medium text-gray-700">Nom du parent</label>
                    <input type="text" name="nom_parent" id="nom_parent" class="mt-1 w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div>
                    <label for="prenom_parent" class="block text-sm font-medium text-gray-700">Prénom du parent</label>
                    <input type="text" name="prenom_parent" id="prenom_parent" class="mt-1 w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div>
                    <label for="genre_parent" class="block text-sm font-medium text-gray-700">Genre</label>
                    <select name="genre_parent" id="genre_parent" class="mt-1 w-full border border-gray-300 rounded-md p-2" required>
                        <option value="">Sélectionnez le genre</option>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                    </select>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div>
                    <label for="mot_de_passe" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="mt-1 w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div>
                    <label for="type_client" class="block text-sm font-medium text-gray-700">Type de client</label>
                    <select name="type_client" id="type_client" class="mt-1 w-full border border-gray-300 rounded-md p-2" required>
                        <option value="">Sélectionnez le type de client</option>
                        <option value="societe">Société</option>
                        <option value="client ordinaire">Client ordinaire</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="envoi_mail" id="envoi_mail" value="1" class="mr-2">
                    <label for="envoi_mail" class="text-sm text-gray-700">Recevoir les mails</label>
                </div>

                <div class="text-center">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Enregistrer le client
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>
