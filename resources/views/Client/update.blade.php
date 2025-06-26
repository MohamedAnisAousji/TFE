<x-client-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
            <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Modifier votre profil</h2>

            <form method="POST" action="{{ route('client.update') }}">
                @csrf

                <!-- Nom -->
                <div class="mb-4">
                    <label for="nom_parent" class="block text-gray-600 font-medium mb-2">Nom :</label>
                    <input type="text" id="nom_parent" name="nom_parent" value="{{ $client->nom_parent }}"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Prénom -->
                <div class="mb-4">
                    <label for="prenom_parent" class="block text-gray-600 font-medium mb-2">Prénom :</label>
                    <input type="text" id="prenom_parent" name="prenom_parent" value="{{ $client->prenom_parent }}"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Genre -->
                <div class="mb-4">
                    <label for="genre_parent" class="block text-gray-600 font-medium mb-2">Genre :</label>
                    <select id="genre_parent" name="genre_parent"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="M" {{ $client->genre_parent === 'M' ? 'selected' : '' }}>Masculin</option>
                        <option value="F" {{ $client->genre_parent === 'F' ? 'selected' : '' }}>Féminin</option>
                    </select>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-medium mb-2">Email :</label>
                    <input type="email" id="email" name="email" value="{{ $client->email }}"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Nouveau mot de passe -->
                <div class="mb-4">
                    <label for="mot_de_passe" class="block text-gray-600 font-medium mb-2">Nouveau mot de passe :</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Confirmation mot de passe -->
                <div class="mb-4">
                    <label for="mot_de_passe_confirmation" class="block text-gray-600 font-medium mb-2">Confirmer mot de passe :</label>
                    <input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Type de client -->
                <div class="mb-4">
                    <label for="type_client" class="block text-gray-600 font-medium mb-2">Type de client :</label>
                    <select id="type_client" name="type_client"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="societe" {{ $client->type_client === 'societe' ? 'selected' : '' }}>Société</option>
                        <option value="client ordinaire" {{ $client->type_client === 'client ordinaire' ? 'selected' : '' }}>Client ordinaire</option>
                    </select>
                </div>

                <!-- Envoi mail -->
                <div class="mb-6">
                    <label for="envoi_mail" class="block text-gray-600 font-medium mb-2">Recevoir les mails :</label>
                    <select id="envoi_mail" name="envoi_mail"
                        class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="1" {{ $client->envoi_mail ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ !$client->envoi_mail ? 'selected' : '' }}>Non</option>
                    </select>
                </div>

                <!-- Bouton de soumission -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-lg">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-client-layout>
