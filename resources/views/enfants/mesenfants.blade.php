<x-Client-layout>
    <div class="min-h-screen bg-cover bg-center bg-no-repeat flex flex-col"
         style="background-image: url('{{ asset('images/enfant-header.jpg') }}');">

        <!-- Conteneur semi-transparent pour lisibilité -->
        <div class="bg-white bg-opacity-80 backdrop-blur-sm flex-1 p-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-6 border border-green-300 shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($enfants as $enfant)
                    <div class="bg-white rounded-2xl shadow-md border hover:shadow-lg transition p-6">
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ $enfant->nom_enfant }} {{ $enfant->prenom_Enfant }}
                            </h2>
                            <p class="text-sm text-gray-500 italic">ID: #{{ $enfant->id }}</p>
                        </div>

                        <ul class="text-gray-700 space-y-1 text-sm">
                            <li>
                                <strong>Âge :</strong>
                                <span class="age-calc" data-date="{{ $enfant->date_Nais }}"></span>
                            </li>
                            <li>
                                <strong>Date de naissance :</strong>
                                {{ \Carbon\Carbon::parse($enfant->date_Nais)->format('d/m/Y') }}
                            </li>
                            <li>
                                <strong>Parent :</strong>
                                {{ $enfant->client->nom_parent ?? 'Non assigné' }}
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- JS : Calcul âge --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".age-calc").forEach(el => {
                const dateStr = el.getAttribute("data-date");
                if (!dateStr) return el.textContent = "—";
                const birth = new Date(dateStr);
                const today = new Date();
                let age = today.getFullYear() - birth.getFullYear();
                const m = today.getMonth() - birth.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;
                el.textContent = age + " ans";
            });
        });
    </script>
</x-Client-layout>
