<x-app-layout>
    <h1 class="text-2xl font-bold text-blue-400 text-center">Formules</h1>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md"> <!-- Ajustement pour centrer le formulaire -->
            <!-- Début du formulaire -->
            <form method="POST" action="{{ route('store.formules') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf <!-- Token CSRF pour la sécurité, une seule balise @csrf est nécessaire -->
                <div>
                    <label for="nom_formule">Nom de la formule:</label>
                    <input type="text" name="nom_formule" id="nom_formule" required class="border-gray-300 rounded-md shadow-sm" maxlength="100">
                </div>
                <div class="mt-4">
                    <label for="desc_formule">Description </label>
                    <input type="text" name="desc_formule" id="desc_formule" required class="border-gray-300 rounded-md shadow-sm" maxlength="100">
                </div>
                <div class="mt-4">
                    <label for="Montant">Montant:</label>
                    <input type="number" step="0.01" name="Montant" id="Montant" required class="border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer Formule</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>



