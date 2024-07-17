<x-Client-layout>
    <div class="flex justify-center items-center h-screen">
    <div class="flex justify-center items-center min-h-screen">
            <form action="{{ route('evenements.store') }}" method="POST">
                @csrf 
                <div class="mb-4">
                    <label for="date_debut" class="block text-gray-700 text-sm font-bold mb-2">Date de début</label>
                    <input  type="datetime-local" id="date_debut" name="date_debut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="date_fin" class="block text-gray-700 text-sm font-bold mb-2">Date de fin</label>
                    <input  type="datetime-local" id="date_fin" name="date_fin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
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
                    <label for="formule_demande" class="block text-gray-700 text-sm font-bold mb-2">Formule demandée</label>
                    <textarea id="formule_demande" name="formule_demande" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
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
