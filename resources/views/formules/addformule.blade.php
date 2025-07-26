<x-client-layout>
    <div class="max-w-xl mx-auto mt-12 bg-white p-8 shadow-xl rounded-lg border border-blue-100">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">🧾 Sélectionnez votre formule</h2>

        {{-- ✅ Messages flash --}}
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-600 text-green-700 p-3 mb-4 text-sm rounded">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-600 text-red-700 p-3 mb-4 text-sm rounded">
                <ul class="list-disc pl-4">
                    @foreach($errors->all() as $error)
                        <li>❌ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✅ Formulaire --}}
        <form method="POST" action="{{ route('formules.add') }}">
            @csrf

            {{-- Formule --}}
            <div class="mb-5">
                <label for="nom_formule" class="block text-sm font-medium text-gray-700 mb-1">🎯 Formule</label>
                <select name="nom_formule" id="nom_formule" onchange="updateFields()" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option disabled selected>Choisissez une formule...</option>
                    <option value="Formule normale" data-desc="Formule standard" data-price="12">Formule normale</option>
                    <option value="Formule combinée" data-desc="Deux activités incluses" data-price="25">Formule combinée</option>
                    <option value="Formule mercredi" data-desc="Offre spéciale mercredi" data-price="17">Formule mercredi</option>
                    <option value="Formule vendredi" data-desc="Promo vendredi seulement" data-price="10">Formule vendredi</option>
                </select>
            </div>

            {{-- Description --}}
            <div class="mb-5">
                <label for="desc_formules" class="block text-sm font-medium text-gray-700 mb-1">📝 Description</label>
                <input type="text" id="desc_formules" name="desc_formules" readonly class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100">
            </div>

            {{-- Montant --}}
            <div class="mb-5">
                <label for="montant" class="block text-sm font-medium text-gray-700 mb-1">💰 Montant Total (€)</label>
                <input type="text" id="montant" name="montant" readonly class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100">
            </div>

            {{-- Enfants dynamiques --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">👶 Sélection des enfants</label>
                <div id="enfants-container" class="space-y-2 text-gray-800 text-sm">
                    <p class="italic text-gray-500">Chargement des enfants...</p>
                </div>
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow transition duration-200">
                    ✅ Valider ma formule
                </button>
            </div>
        </form>
    </div>

    {{-- ✅ Script --}}
    <script>
        let prixUnitaire = 0;

        function updateFields() {
            const select = document.getElementById('nom_formule');
            const selected = select.options[select.selectedIndex];

            prixUnitaire = parseFloat(selected.getAttribute('data-price')) || 0;

            document.getElementById('desc_formules').value = selected.getAttribute('data-desc') || '';
            updateMontant();
        }

        function updateMontant() {
            const checkboxes = document.querySelectorAll('input[name="enfants[]"]:checked');
            const total = prixUnitaire * checkboxes.length;
            document.getElementById('montant').value = total.toFixed(2);
        }

        // Fetch des enfants dynamiquement
        document.addEventListener("DOMContentLoaded", () => {
            fetch('/api/client/enfants')
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('enfants-container');
                    container.innerHTML = "";

                    if (!data || data.length === 0) {
                        container.innerHTML = "<p class='text-sm italic text-gray-500'>Aucun enfant trouvé pour ce compte.</p>";
                    } else {
                        data.forEach(enfant => {
                            const div = document.createElement('div');
                            div.className = 'flex items-center space-x-2';

                            const checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.name = 'enfants[]';
                            checkbox.value = enfant.id;
                            checkbox.className = 'rounded border-gray-300';
                            checkbox.addEventListener('change', updateMontant);

                            const label = document.createElement('label');
                            label.textContent = `${enfant.nom_enfant} ${enfant.prenom_enfant}`;

                            div.appendChild(checkbox);
                            div.appendChild(label);
                            container.appendChild(div);
                        });
                    }
                })
                .catch(error => {
                    console.error("Erreur enfants:", error);
                    document.getElementById('enfants-container').innerHTML = "<p class='text-sm text-red-500'>Erreur lors du chargement.</p>";
                });
        });
    </script>
</x-client-layout>
