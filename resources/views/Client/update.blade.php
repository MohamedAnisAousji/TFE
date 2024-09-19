<x-client-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <!-- Conteneur principal -->
        <div class="flex flex-col lg:flex-row items-center justify-between bg-white shadow-lg rounded-lg p-8 max-w-5xl w-full">
            <!-- Section de sélection de langue -->
            <div class="bg-gray-200 rounded-lg p-4 mb-6 lg:mb-0 lg:mr-6 w-full lg:w-1/3">
                <form action="{{ route('changeLanguage') }}" method="POST">
                    @csrf
                    <label for="locale" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.select_language') }}</label>
                    <select name="locale" id="locale" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="this.form.submit()">
                        <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
                    </select>
                </form>
            </div>
            <!-- Section de formulaire de modification -->
            <div class="w-full lg:w-2/3">
                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('messages.modify_profile') }}</h2>
                <form method="POST" action="{{ route('client.update') }}">
                    @csrf
                    <!-- Nom -->
                    <div class="mb-4">
                        <label for="Nom_Parent" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.name') }}:</label>
                        <input type="text" id="Nom_Parent" name="Nom_Parent" value="{{ $client->Nom_Parent }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <!-- Prénom -->
                    <div class="mb-4">
                        <label for="Prenom_Parent" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.first_name') }}:</label>
                        <input type="text" id="Prenom_Parent" name="Prenom_Parent" value="{{ $client->Prenom_Parent }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <!-- Genre -->
                    <div class="mb-4">
                        <label for="Genre" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.gender') }}:</label>
                        <select id="Genre" name="Genre" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="1" {{ $client->Genre ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                            <option value="0" {{ !$client->Genre ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                        </select>
                    </div>
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="Email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.email') }}:</label>
                        <input type="email" id="Email" name="Email" value="{{ $client->Email }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <!-- Nouveau mot de passe -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.new_password') }}:</label>
                        <input type="password" name="password" id="password"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <!-- Confirmer le mot de passe -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.confirm_password') }}:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <!-- Envoi Email -->
                    <div class="mb-4">
                        <label for="Envoi_Email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.email_notifications') }}:</label>
                        <select id="Envoi_Email" name="Envoi_Email" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="1" {{ $client->Envoi_Email ? 'selected' : '' }}>{{ __('messages.yes') }}</option>
                            <option value="0" {{ !$client->Envoi_Email ? 'selected' : '' }}>{{ __('messages.no') }}</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                            {{ __('messages.update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-client-layout>
