<x-client-layout>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="mt-5 w-full max-w-md">
            <!-- Ajouter le sélecteur de langue -->
            <div class="mb-4 text-right">
                <form action="{{ route('changeLanguage') }}" method="POST">
                    @csrf
                    <label for="locale" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.select_language') }}</label>
                    <select name="locale" id="locale" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="this.form.submit()">
                        <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
                    </select>
                </form>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ __('messages.required_field') }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('storeF') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1 class="text-2xl font-bold text-blue-400 text-center mb-4">{{ __('messages.select_package') }}</h1>

                <div class="mb-4">
                    <label for="formule" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.choose_package') }}</label>
                    <select id="formule" name="nom_formule" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="updateFormuleInfo()">
                        <option value="" disabled selected>{{ __('messages.choose_package') }}</option>
                        <option value="normal" data-price="12">{{ __('messages.normal_package') }}</option>
                        <option value="combinee" data-price="25">{{ __('messages.combined_package') }}</option>
                        <option value="mercredi" data-price="17">{{ __('messages.wednesday_package') }}</option>
                        <option value="vendredi" data-price="10">{{ __('messages.friday_package') }}</option>
                    </select>
                </div>

                <div id="childInput" class="mb-4 hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.select_children') }}</label>
                </div>

                <div id="montantInput" class="mb-4 hidden">
                    <label for="montant" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.total_amount') }}</label>
                    <input type="text" id="Montant" name="Montant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>

                <div id="descInput" class="mb-4 hidden">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('messages.package_description') }}</label>
                    <input type="text" id="desc_formule" name="desc_formule" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                        {{ __('messages.next') }} <i class="fas fa-arrow-right ml-1"></i>
                    </button>
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
</x-client-layout>

