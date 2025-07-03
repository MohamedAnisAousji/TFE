<x-client-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-6 text-center text-blue-700">Choisissez votre formule</h2>

        <form method="POST" action="{{ route('formules.add') }}">
            @csrf

            <div class="mb-4">
                <label for="nom_formule" class="block font-semibold mb-2">Nom de la formule</label>
                <select name="nom_formule" id="nom_formule" onchange="updateFields()" class="w-full border rounded p-2">
                    <option disabled selected>Choisissez une formule</option>
                    <option value="Formule normale" data-desc="Formule standard" data-price="12">Formule normale</option>
                    <option value="Formule combinée" data-desc="Deux activités incluses" data-price="25">Formule combinée</option>
                    <option value="Formule mercredi" data-desc="Offre spéciale mercredi" data-price="17">Formule mercredi</option>
                    <option value="Formule vendredi" data-desc="Promo vendredi seulement" data-price="10">Formule vendredi</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="desc_formules" class="block font-semibold mb-2">Description</label>
                <input type="text" id="desc_formules" name="desc_formules" readonly class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label for="montant" class="block font-semibold mb-2">Montant (€)</label>
                <input type="text" id="montant" name="montant" readonly class="w-full border rounded p-2">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">
                    Enregistrer la formule
                </button>
            </div>
        </form>
    </div>

    <script>
        function updateFields() {
            const select = document.getElementById('nom_formule');
            const selected = select.options[select.selectedIndex];

            document.getElementById('desc_formules').value = selected.getAttribute('data-desc');
            document.getElementById('montant').value = selected.getAttribute('data-price');
        }
    </script>
</x-client-layout>