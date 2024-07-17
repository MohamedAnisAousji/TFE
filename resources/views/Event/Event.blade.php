<x-Client-layout>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <form action="{{ route('Event.Client') }}" method="POST">
                @csrf 
                <h2 class="text-2xl font-bold mb-6 text-center">Créer un Nouvel Événement</h2>

                <div class="mb-4">
                    <label for="date_debut" class="block text-gray-700 text-sm font-bold mb-2">Date de début</label>
                    <input type="datetime-local" id="date_debut" name="date_debut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="date_fin" class="block text-gray-700 text-sm font-bold mb-2">Date de fin</label>
                    <input type="datetime-local" id="date_fin" name="date_fin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="capacite" class="block text-gray-700 text-sm font-bold mb-2">Capacité</label>
                    <input type="number" id="capacite" name="capacite" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Statut</label>
                    <input type="text" id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="nom_societe" class="block text-gray-700 text-sm font-bold mb-2">Nom de la société</label>
                    <input type="text" id="nom_societe" name="nom_societe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Formule demandée</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="formule_demande" value="salle_jeux_seulement" class="form-radio text-indigo-600" checked>
                            <span class="ml-2">Réserver la salle de jeux seulement</span>
                        </label>
                        <label class="inline-flex items-center mt-3">
                            <input type="radio" name="formule_demande" value="formule_complete" class="form-radio text-indigo-600">
                            <span class="ml-2">Formule complète (toute la plaine de jeu, le resto et la salle avec un buffet)</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Créer Événement
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>
