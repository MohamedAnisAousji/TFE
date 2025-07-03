<x-client-layout>
    <!-- Arrière-plan image pour toute la page -->
    <div class="min-h-screen bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('images/enfant-header.jpg') }}');">
        <!-- Superposition transparente -->
        <div class="bg-white bg-opacity-80 min-h-screen py-12 px-4">

            <!-- Conteneur centré -->
            <div class="flex items-center justify-center">
                <div class="flex flex-col lg:flex-row justify-center w-full max-w-4xl mx-auto">
                    <!-- Informations -->
                    <div class="lg:w-1/4 px-4 text-gray-700 relative group hidden lg:block">
                        <h3 class="text-xl font-semibold mb-4">Informations</h3>
                        <p class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                            Remplissez ce formulaire pour ajouter un enfant à votre profil.
                        </p>
                    </div>

                    <!-- Formulaire -->
                    <div class="bg-white bg-opacity-100 shadow-xl rounded-xl w-full lg:w-3/4 px-8 py-6">
                        <h3 class="text-2xl font-bold text-center mb-6 text-blue-700">Ajouter un enfant</h3>
                        <form action="{{ route('enfants.store') }}" method="POST" id="addChildForm">
                            @csrf

                            <!-- Nom -->
                            <div class="mb-4">
                                <label for="nom_enfant" class="block text-gray-600 font-medium mb-2">Nom de l'enfant</label>
                                <input type="text" id="nom_enfant" name="nom_enfant"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600"
                                       required>
                            </div>

                            <!-- Prénom -->
                            <div class="mb-4">
                                <label for="prenom_Enfant" class="block text-gray-600 font-medium mb-2">Prénom de l'enfant</label>
                                <input type="text" id="prenom_Enfant" name="prenom_Enfant"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600"
                                       required>
                            </div>

                            <!-- Date de naissance -->
                            <div class="mb-6">
                                <label for="date_Nais" class="block text-gray-600 font-medium mb-2">Date de naissance</label>
                                <input type="date" id="date_Nais" name="date_Nais"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600"
                                       max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
                            </div>

                            <!-- Bouton -->
                            <div class="flex items-center justify-center">
                                <button type="submit"
                                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-lg">
                                    Ajouter l'enfant
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-client-layout>





