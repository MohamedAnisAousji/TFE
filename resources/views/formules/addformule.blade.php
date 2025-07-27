<x-client-layout>
    <!-- ✅ Image de fond -->
    <div class="min-h-screen bg-no-repeat bg-center bg-[length:100%]"
         style="background-image: url('{{ asset('images/formule.png') }}');
                background-color: rgba(0, 0, 0, 0.2);
                background-blend-mode: multiply;">
      <div class="relative z-10 flex min-h-screen items-center justify-center px-8 py-16">

            <!-- 🧭 Conteneur global avec explication gauche + formulaire droite -->
            <div class="flex flex-row justify-between items-center max-w-7xl w-full gap-16">

                <!-- 💬 Bulle à gauche style message avec flèche -->
                <div class="w-1/2 flex justify-start items-center h-full">
                    <div id="explication-formule"
                         class="hidden relative bg-white bg-opacity-90 text-gray-800 text-base leading-relaxed rounded-2xl shadow-md px-6 py-4 max-w-md">
                        <span class="absolute left-[-12px] top-4 w-0 h-0 border-t-8 border-b-8 border-r-8 border-transparent border-r-white"></span>
                        <!-- Texte dynamique ici -->
                    </div>
                </div>

                <!-- 📋 Formulaire à droite -->
                <div class="w-1/2 max-w-xl bg-white bg-opacity-70 backdrop-blur-md p-8 rounded-xl shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">🧾 Sélectionnez votre formule</h2>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-3 mb-4 text-sm rounded">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-3 mb-4 text-sm rounded">
                            <ul class="list-disc pl-4">
                                @foreach($errors->all() as $error)
                                    <li>❌ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('formules.add') }}">
                        @csrf

                        <div class="mb-5">
                            <label for="nom_formule" class="block text-sm font-medium text-gray-700 mb-1">🎯 Formule</label>
                            <select name="nom_formule" id="nom_formule" onchange="updateFields()" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option disabled selected>Choisissez une formule...</option>
                                <option value="Formule normale" data-desc="Formule standard" data-price="12">Formule normale</option>
                                <option value="Formule combinée" data-desc="Deux activités incluses" data-price="25">Formule combinée</option>
                                <option value="Formule mercredi" data-desc="Offre spéciale mercredi" data-price="17">Formule mercredi</option>
                                <option value="Formule vendredi" data-desc="Promo vendredi seulement" data-price="10">Formule vendredi</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="desc_formules" class="block text-sm font-medium text-gray-700 mb-1">📝 Description</label>
                            <input type="text" id="desc_formules" name="desc_formules" readonly class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100">
                        </div>

                        <div class="mb-5">
                            <label for="montant" class="block text-sm font-medium text-gray-700 mb-1">💰 Montant Total (€)</label>
                            <input type="text" id="montant" name="montant" readonly class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">👶 Sélection des enfants</label>
                            <div id="enfants-container" class="space-y-2 text-gray-800 text-sm">
                                <p class="italic text-gray-500">Chargement des enfants...</p>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow transition duration-200">
                                ✅ Valider ma formule
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 🧠 Script -->
    <script>
        let prixUnitaire = 0;

        const descriptionsLongues = {
            "Formule normale": "✅ *Formule normale* : entrée standard au parc avec toutes les activités classiques. Parfait pour une sortie simple.",
            "Formule combinée": "💡 *Formule combinée* : deux activités incluses pour une expérience enrichie. Recommandée pour les groupes ou fêtes.",
            "Formule mercredi": "🎯 *Formule mercredi* : offre spéciale uniquement le mercredi avec collation offerte et animations ciblées.",
            "Formule vendredi": "⚠️ *Formule vendredi* : promo du vendredi ! Entrée à prix réduit pour bien commencer le week-end."
        };

        function updateFields() {
            const select = document.getElementById('nom_formule');
            const selected = select.options[select.selectedIndex];

            prixUnitaire = parseFloat(selected.getAttribute('data-price')) || 0;
            document.getElementById('desc_formules').value = selected.getAttribute('data-desc') || '';
            updateMontant();

            // 💬 Afficher le message explicatif
            const textDiv = document.getElementById('explication-formule');
            const key = selected.value;
            if (descriptionsLongues[key]) {
                textDiv.innerHTML = descriptionsLongues[key];
                textDiv.classList.remove('hidden');
            } else {
                textDiv.classList.add('hidden');
            }
        }

        function updateMontant() {
            const checkboxes = document.querySelectorAll('input[name="enfants[]"]:checked');
            const total = prixUnitaire * checkboxes.length;
            document.getElementById('montant').value = total.toFixed(2);
        }

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