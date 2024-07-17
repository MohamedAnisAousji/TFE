<x-client-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6 text-center">Modifier votre profil</h2>
            <form method="POST" action="{{ route('client.update') }}">
                @csrf
                <!-- Nom -->
                <div class="mb-4">
                    <label for="Nom_Parent" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
                    <input type="text" id="Nom_Parent" name="Nom_Parent" value="{{ $client->Nom_Parent }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <!-- Prénom -->
                <div class="mb-4">
                    <label for="Prenom_Parent" class="block text-gray-700 text-sm font-bold mb-2">Prénom:</label>
                    <input type="text" id="Prenom_Parent" name="Prenom_Parent" value="{{ $client->Prenom_Parent }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <!-- Genre -->
                <div class="mb-4">
                    <label for="Genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                    <select id="Genre" name="Genre" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1" {{ $client->Genre ? 'selected' : '' }}>Femme</option>
                        <option value="0" {{ !$client->Genre ? 'selected' : '' }}>Homme</option>
                    </select>
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="Email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="Email" name="Email" value="{{ $client->Email }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <!-- Nouveau mot de passe -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Nouveau mot de passe (optionnel):</label>
                    <input type="password" name="password" id="password"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <!-- Confirmer le mot de passe -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmer le mot de passe:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <!-- Envoi Email -->
                <div class="mb-4">
                    <label for="Envoi_Email" class="block text-gray-700 text-sm font-bold mb-2">Envoi d'email:</label>
                    <select id="Envoi_Email" name="Envoi_Email" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1" {{ $client->Envoi_Email ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ !$client->Envoi_Email ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</x-client-layout>
