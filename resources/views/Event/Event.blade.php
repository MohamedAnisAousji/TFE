<x-client-layout>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <!-- Formulaire principal -->
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <form action="{{ route('Event.Client') }}" method="POST" id="eventForm">
                @csrf 
                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('messages.create_event') }}</h2>

                <div class="mb-4">
                    <label for="date_debut" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.start_date') }}</label>
                    <input type="datetime-local" id="date_debut" name="date_debut" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="date_fin" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.end_date') }}</label>
                    <input type="datetime-local" id="date_fin" name="date_fin" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="capacite" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.capacity') }}</label>
                    <input type="number" id="capacite" name="capacite" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.status') }}</label>
                    <input type="text" id="status" name="status" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="nom_societe" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.company_name') }}</label>
                    <input type="text" id="nom_societe" name="nom_societe" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.email') }}</label>
                    <input type="email" id="email" name="email" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.requested_package') }}</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="formule_demande" value="salle_jeux_seulement" 
                                   class="form-radio text-indigo-600" checked>
                            <span class="ml-2">{{ __('messages.reserve_playroom_only') }}</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="radio" name="formule_demande" value="formule_complete" 
                                   class="form-radio text-indigo-600">
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

    <!-- JavaScript pour le contrôle des dates -->
    <script>
        document.getElementById('eventForm').addEventListener('submit', function (e) {
            const startDateInput = document.getElementById('date_debut');
            const endDateInput = document.getElementById('date_fin');
            
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            
            // Vérifie que la date de fin est après la date de début
            if (endDate <= startDate) {
                e.preventDefault();
                alert("La date de fin doit être après la date de début.");
                return;
            }

            // Vérifie que l'horaire est entre 8h et 19h
            if (startDate.getHours() < 8 || startDate.getHours() > 19 || 
                endDate.getHours() < 8 || endDate.getHours() > 19) {
                e.preventDefault();
                alert("L'horaire doit être compris entre 08:00 et 19:00.");
                return;
            }
        });
    </script>
</x-client-layout>
