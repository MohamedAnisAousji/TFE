<x-Client-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="mt-5 w-full max-w-md">
            <form method="POST" action="{{ route('creatformule') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1 class="text-2xl font-bold text-blue-400 text-center mb-4">Sélectionner une Formule</h1>

               

                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-bold mb-2">Choisir une Formule :</p>
                    <div class="flex flex-col">
                        <label for="combine" class="inline-flex items-center">
                            <input type="checkbox" id="combine" name="formules[]" value="combine" class="form-checkbox" required onchange="toggleCheck(this); toggleChildInput(this)">
                            <span class="ml-2">Formule Combinée</span>
                        </label>
                        <label for="normale" class="inline-flex items-center">
                            <input type="checkbox" id="normale" name="formules[]" value="normale" class="form-checkbox" onchange="toggleCheck(this); toggleChildInput(this)">
                            <span class="ml-2">Formule Normale</span>
                        </label>
                        <label for="entree" class="inline-flex items-center">
                            <input type="checkbox" id="entree" name="formules[]" value="entree" class="form-checkbox" onchange="toggleCheck(this); toggleChildInput(this)">
                            <span class="ml-2">Formule Entrée Groupe</span>
                        </label>
                        <label for="vendredi" class="inline-flex items-center">
                            <input type="checkbox" id="vendredi" name="formules[]" value="vendredi" class="form-checkbox" onchange="toggleCheck(this); toggleChildInput(this)">
                            <span class="ml-2">Formule Vendredi</span>
                        </label>
                        <label for="jeudi" class="inline-flex items-center">
                            <input type="checkbox" id="jeudi" name="formules[]" value="jeudi" class="form-checkbox" onchange="toggleCheck(this); toggleChildInput(this)">
                            <span class="ml-2">Formule Jeudi</span>
                        </label>
                    </div>
                </div>

                <div id="childInput" class="mb-4 hidden">
                    <label for="nbr_enfants" class="block text-gray-700 text-sm font-bold mb-2">Nombre d'enfants :</label>
                    <input type="number" id="nbr_enfants" name="nbr_enfants" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" min="1">
                </div>

                <div class="flex items-center justify-between">
                    <a href="/paiement" class="text-blue-500 hover:text-blue-700"><i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleCheck(checkbox) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function (cb) {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });
        }

        function toggleChildInput(checkbox) {
            var childInput = document.getElementById('childInput');
            childInput.classList.toggle('hidden', !checkbox.checked);
        }
    </script>
</x-Client-layout>






