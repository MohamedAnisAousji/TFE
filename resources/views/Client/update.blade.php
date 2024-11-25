<x-client-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <!-- Conteneur principal avec taille réduite -->
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
            <!-- Titre -->
            <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">{{ __('messages.modify_profile') }}</h2>
            <!-- Formulaire -->
            <form method="POST" action="{{ route('client.update') }}">
                @csrf
                <!-- Nom -->
                <div class="mb-4">
                    <label for="Nom_Parent" class="block text-gray-600 font-medium mb-2">{{ __('messages.name') }}:</label>
                    <input type="text" id="Nom_Parent" name="Nom_Parent" value="{{ $client->Nom_Parent }}"
                           class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <!-- Prénom -->
                <div class="mb-4">
                    <label for="Prenom_Parent" class="block text-gray-600 font-medium mb-2">{{ __('messages.first_name') }}:</label>
                    <input type="text" id="Prenom_Parent" name="Prenom_Parent" value="{{ $client->Prenom_Parent }}"
                           class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <!-- Genre -->
                <div class="mb-4">
                    <label for="Genre" class="block text-gray-600 font-medium mb-2">{{ __('messages.gender') }}:</label>
                    <select id="Genre" name="Genre" class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="1" {{ $client->Genre ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                        <option value="0" {{ !$client->Genre ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                    </select>
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="Email" class="block text-gray-600 font-medium mb-2">{{ __('messages.email') }}:</label>
                    <input type="email" id="Email" name="Email" value="{{ $client->Email }}"
                           class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <!-- Nouveau mot de passe -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 font-medium mb-2">{{ __('messages.new_password') }}:</label>
                    <input type="password" name="password" id="password"
                           class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <!-- Confirmer le mot de passe -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-600 font-medium mb-2">{{ __('messages.confirm_password') }}:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <!-- Envoi Email -->
                <div class="mb-4">
                    <label for="Envoi_Email" class="block text-gray-600 font-medium mb-2">{{ __('messages.email_notifications') }}:</label>
                    <select id="Envoi_Email" name="Envoi_Email" class="w-full border border-gray-300 rounded-lg py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="1" {{ $client->Envoi_Email ? 'selected' : '' }}>{{ __('messages.yes') }}</option>
                        <option value="0" {{ !$client->Envoi_Email ? 'selected' : '' }}>{{ __('messages.no') }}</option>
                    </select>
                </div>
                <!-- Bouton de mise à jour -->
                <div class="flex items-center justify-end">
                    <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-lg">
                        {{ __('messages.update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-client-layout>
