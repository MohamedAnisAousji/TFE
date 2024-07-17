<x-Client-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="mt-5 w-full max-w-md">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('storeF') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1 class="text-2xl font-bold text-blue-400 text-center mb-4">Sélectionner une Formule</h1>

                <div class="mb-4">
                    <label for="formule" class="block text-gray-700 text-sm font-bold mb-2">Choisir une Formule :</label>
                    <select id="formule" name="nom_formule" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="updateFormuleInfo()">
                        <option value="" disabled selected>Choisir une formule</option>
                        <option value="normal" data-price="12">Formule Normale 12€</option>
                        <option value="combinee" data-price="25">Formule Combinée 25€</option>
                        <option value="mercredi" data-price="17">Formule Mercredi 17€</option>
                        <option value="vendredi" data-price="10">Formule Vendredi 10€</option>
                    </select>
                </div>

                <div id="childInput" class="mb-4 hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Sélectionner les Enfants :</label>
                    <input type="checkbox" name="enfant_id[]" value="ID_DE_LENFANT">
                    </div>

                <div id="montantInput" class="mb-4 hidden">
                    <label for="montant" class="block text-gray-700 text-sm font-bold mb-2">Montant Total de la Formule :</label>
                    <input type="text" id="Montant" name="Montant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>

                <div id="descInput" class="mb-4 hidden">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description de la Formule :</label>
                    <input type="text" id="desc_formule" name="desc_formule" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Suivant <i class="fas fa-arrow-right ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateFormuleInfo() {
            var select = document.getElementById('formule');
            var selectedOption = select.options[select.selectedIndex];
            var basePrice = parseFloat(selectedOption.getAttribute('data-price'));
            var childInput = document.getElementById('childInput');
            var montantInput = document.getElementById('montantInput');
            var descInput = document.getElementById('descInput');

            if (selectedOption.value) {
                childInput.classList.remove('hidden');
                montantInput.classList.remove('hidden');
                descInput.classList.remove('hidden');
                document.getElementById('desc_formule').value = selectedOption.text;

                fetchChildrenAndUpdateCost(basePrice);
            } else {
                childInput.classList.add('hidden');
                montantInput.classList.add('hidden');
                descInput.classList.add('hidden');
            }
        }

        function fetchChildrenAndUpdateCost(basePrice) {
            // Récupérer les enfants et mettre à jour le coût
            fetch('/get-enfants')
                .then(response => response.json())
                .then(data => {
                    var container = document.getElementById('childInput');
                    container.innerHTML = '';
                    data.forEach(enfant => {
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.name = 'enfant_id[]';
                        checkbox.value = enfant.id;
                        checkbox.onchange = () => calculateTotalCost(basePrice);
                        container.appendChild(checkbox);

                        var label = document.createElement('label');
                        label.textContent = enfant.Nom_enfant + ' ' + enfant.Prenom_enfant;
                        container.appendChild(label);

                        var br = document.createElement('br');
                        container.appendChild(br);
                    });
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des enfants:', error);
                });
        }

        function calculateTotalCost(basePrice) {
            var checkboxes = document.querySelectorAll('input[name="enfant_id[]"]:checked');
            var totalCost = basePrice * checkboxes.length;
            document.getElementById('Montant').value = totalCost.toFixed(2) + '€';
        }
    </script>
</x-Client-layout>


