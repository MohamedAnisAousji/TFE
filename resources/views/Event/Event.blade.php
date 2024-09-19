<x-client-layout>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <!-- Ajouter le sélecteur de langue -->
        <div class="absolute top-4 left-4 bg-white p-4 rounded-lg shadow-lg">
            <form action="{{ route('changeLanguage') }}" method="POST">
                @csrf 
                <label for="locale" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.select_language') }}</label>
                <select name="locale" id="locale" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="this.form.submit()">
                    <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
                </select>
            </form>
        </div>
        
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <form action="{{ route('Event.Client') }}" method="POST">
                @csrf 
                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('messages.create_event') }}</h2>

                <div class="mb-4">
                    <label for="date_debut" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.start_date') }}</label>
                    <input type="datetime-local" id="date_debut" name="date_debut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="date_fin" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.end_date') }}</label>
                    <input type="datetime-local" id="date_fin" name="date_fin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="capacite" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.capacity') }}</label>
                    <input type="number" id="capacite" name="capacite" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.status') }}</label>
                    <input type="text" id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="nom_societe" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.company_name') }}</label>
                    <input type="text" id="nom_societe" name="nom_societe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.email') }}</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.requested_package') }}</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="formule_demande" value="salle_jeux_seulement" class="form-radio text-indigo-600" checked>
                            <span class="ml-2">{{ __('messages.reserve_playroom_only') }}</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="radio" name="formule_demande" value="formule_complete" class="form-radio text-indigo-600">
                            <span class="ml-2">{{ __('messages.full_package') }}</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        {{ __('messages.create_event_button') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-client-layout>
