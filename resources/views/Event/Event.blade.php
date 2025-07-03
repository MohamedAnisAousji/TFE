<x-client-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-xl w-full max-w-2xl p-8 space-y-6 border border-gray-200">
            <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-6">
                <i class="fas fa-calendar-plus mr-2"></i> {{ __('messages.create_event') }}
            </h2>

            <form action="{{ route('Event.Client') }}" method="POST" id="eventForm" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date_debut" class="block text-sm font-semibold text-gray-600 mb-1">
                            {{ __('messages.start_date') }}
                        </label>
                        <input type="datetime-local" name="date_debut" id="date_debut"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="date_fin" class="block text-sm font-semibold text-gray-600 mb-1">
                            {{ __('messages.end_date') }}
                        </label>
                        <input type="datetime-local" name="date_fin" id="date_fin"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="nombre" class="block text-sm font-semibold text-gray-600 mb-1">
                            {{ __('messages.capacity') }}
                        </label>
                        <input type="number" name="nombre" id="nombre" min="1"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-600 mb-1">
                            {{ __('messages.status') }}
                        </label>
                        <select name="status" id="status"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
                            <option value="payer">payer</option>
                            <option value="impayer"selected>impayer</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-600 mb-1">
                        {{ __('messages.email') }}
                    </label>
                    <input type="email" name="email" id="email"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
                </div>

                <div>
                    <label for="nom_societe" class="block text-sm font-semibold text-gray-600 mb-1">
                        {{ __('messages.company_name') }} <span class="text-sm text-gray-400">(Optionnel)</span>
                    </label>
                    <input type="text" name="nom_societe" id="nom_societe"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        {{ __('messages.requested_package') }}
                    </label>
                    <div class="space-y-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="formule_demande" value="salle_jeux_seulement"
                                class="form-radio text-indigo-600" checked>
                            <span class="ml-2">{{ __('messages.reserve_playroom_only') }}</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="formule_demande" value="formule_complete"
                                class="form-radio text-indigo-600">
                            <span class="ml-2">{{ __('messages.full_package') }}</span>
                        </label>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        <i class="fas fa-paper-plane mr-2"></i> {{ __('messages.create_event_button') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript pour les validations -->
    <script>
        document.getElementById('eventForm').addEventListener('submit', function (e) {
            const startDate = new Date(document.getElementById('date_debut').value);
            const endDate = new Date(document.getElementById('date_fin').value);

            if (endDate <= startDate) {
                e.preventDefault();
                alert("La date de fin doit être après la date de début.");
                return;
            }

            if (startDate.getHours() < 8 || startDate.getHours() > 19 ||
                endDate.getHours() < 8 || endDate.getHours() > 19) {
                e.preventDefault();
                alert("L'horaire doit être compris entre 08:00 et 19:00.");
            }
        });
    </script>
</x-client-layout>
