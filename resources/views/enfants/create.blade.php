<x-client-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <!-- Container principal avec un padding à gauche plus large -->
        <div class="flex flex-row justify-center w-full max-w-4xl mx-auto pl-12">
        <div class="fixed top-0 right-0 m-4">
            <form action="{{ route('changeLanguage') }}" method="POST">
                @csrf
                <label for="locale" class="block">{{ __('messages.select_language') }}</label>
                <select name="locale" id="locale" onchange="this.form.submit()">
                    <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
                </select>
            </form>
        </div>
            <!-- Zone de texte explicatif à gauche -->
            <div class="lg:w-1/4 px-6 text-gray-700">
                <h3 class="text-xl font-semibold mb-4">{{ __('messages.information') }}</h3>
                <p>{{ __('messages.instruction') }}</p>
            </div>
            <!-- Formulaire à droite -->
            <div class="bg-white shadow-lg rounded-lg w-full lg:w-3/4 px-8 py-6">
                <h3 class="text-2xl font-bold text-center">{{ __('messages.add_child') }}</h3>
                <form action="{{ route('enfants.store') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <div>
                            <label for="Nom_enfant" class="block">{{ __('messages.name') }}</label>
                            <input type="text" id="Nom_enfant" name="Nom_enfant"
                                   class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                        </div>
                        <div class="mt-4">
                            <label for="Prenom_enfant" class="block">{{ __('messages.first_name') }}</label>
                            <input type="text" id="Prenom_enfant" name="Prenom_enfant"
                                   class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                        </div>
                        <div class="mt-4">
                            <label for="Date_Naissance" class="block">{{ __('messages.birth_date') }}</label>
                            <input type="date" id="Date_Naissance" name="Date_Naissance"
                                   class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                {{ __('messages.add') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-client-layout>
