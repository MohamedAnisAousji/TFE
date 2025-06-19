<x-client-layout>
    <div class="bg-blue-600 text-white py-4 shadow-md">
        <h1 class="text-2xl font-bold text-center">Ajoutez Vos Enfants</h1>
    </div>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="flex flex-row justify-center w-full max-w-4xl mx-auto pl-12">
            <div class="lg:w-1/4 px-6 text-gray-700 relative group">
                <h3 class="text-xl font-semibold mb-4">Informations</h3>
                <p class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                    Remplissez ce formulaire pour ajouter un enfant à votre profil.
                </p>
            </div>

            <div class="bg-white shadow-lg rounded-lg w-full lg:w-3/4 px-8 py-6">
                <h3 class="text-2xl font-bold text-center mb-4">Ajouter un enfant</h3>
                <form action="{{ route('enfants.store') }}" method="POST" id="addChildForm">
                    @csrf

                    <!-- Nom -->
                    <div>
                        <label for="nom_enfant" class="block text-gray-600 font-medium mb-2">Nom de l'enfant</label>
                        <input type="text" id="nom_enfant" name="nom_enfant"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600"
                               required>
                    </div>

                    <!-- Prénom -->
                    <div class="mt-4">
                        <label for="prenom_Enfant" class="block text-gray-600 font-medium mb-2">Prénom de l'enfant</label>
                        <input type="text" id="prenom_Enfant" name="prenom_Enfant"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600"
                               required>
                    </div>

                    <!-- Date de naissance -->
                    <div class="mt-4">
                        <label for="date_Nais" class="block text-gray-600 font-medium mb-2">Date de naissance</label>
                        <input type="date" id="date_Nais" name="date_Nais"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600"
                               max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
                    </div>

                    <!-- Bouton -->
                    <div class="flex items-center justify-between mt-6">
                        <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition">
                            Ajouter l'enfant
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-client-layout>



