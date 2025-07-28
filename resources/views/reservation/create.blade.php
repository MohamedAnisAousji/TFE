<x-client-layout>
    {{-- 🎨 Image de fond plein écran sans espace blanc --}}
<div class="fixed inset-0 z-[-1] overflow-hidden">
    <img src="{{ asset('images/reservation.png') }}"
         alt="background"
         class="w-full h-screen object-fill brightness-[0.95]">
</div>

    {{-- 📐 Formulaire aligné à droite et transparent --}}
    <div class="min-h-screen flex items-center justify-end px-8 py-8">
        <div class="bg-white/30 backdrop-blur-md border border-white/30 shadow-lg rounded-2xl p-8 w-full max-w-md relative">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">📅 Réserver une date</h1>

            <form action="{{ route('reservations.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- 📅 Date --}}
                <div>
                    <label for="Date" class="block text-sm font-semibold text-gray-700 mb-1">Date :</label>
                    <div class="relative">
                        <input type="date" id="Date" name="Date" required
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80 backdrop-blur-sm">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- 🕐 Heure --}}
                <div>
                    <label for="heure_resrv" class="block text-sm font-semibold text-gray-700 mb-1">Heure :</label>
                    <div class="relative">
                        <input type="time" id="heure_resrv" name="heure_resrv" required
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80 backdrop-blur-sm">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- 👤 Client --}}
                <div>
                    <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-1">Client :</label>
                    <input type="text" value="{{ $client->nom_parent ?? 'Anis' }}" readonly
                           class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm text-gray-700">
                </div>

                {{-- ✅ Bouton --}}
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-md shadow transition duration-200">
                        Suivant
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- 🧠 Script : blocage date + tooltip animé --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('Date');
            const timeInput = document.getElementById('heure_resrv');

            // 🔒 Bloquer les dates passées
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);

            // 🚫 Désactiver heure avant date
            timeInput.disabled = true;

            // 💬 Tooltip animé
            const tooltip = document.createElement('div');
            tooltip.innerText = "⏰ Sélectionnez une date pour voir les heures disponibles";
            tooltip.className = "bg-white text-gray-800 px-4 py-2 text-sm rounded-xl shadow-lg border border-gray-300 animate-fade-in-up z-50 fixed transition-opacity duration-300";
            tooltip.style.display = "none";
            document.body.appendChild(tooltip);

            // 🎯 Quand la date change
            dateInput.addEventListener('change', function () {
                const selectedDate = new Date(this.value);
                const day = selectedDate.getDay();

                let min = "", max = "";
                switch (day) {
                    case 0: min = "12:00"; max = "18:00"; break; // dimanche
                    case 6: min = "10:00"; max = "20:00"; break; // samedi
                    default: min = "10:00"; max = "18:00";
                }

                timeInput.disabled = false;
                timeInput.setAttribute('min', min);
                timeInput.setAttribute('max', max);
                timeInput.title = `🕑 Heures d'ouverture : ${min} - ${max}`;
            });

            // 👆 Tooltip lors du survol si désactivé
            timeInput.addEventListener('mouseenter', function () {
                if (timeInput.disabled) {
                    const rect = timeInput.getBoundingClientRect();
                    tooltip.style.left = rect.left + "px";
                    tooltip.style.top = (rect.top - 50) + "px";
                    tooltip.style.display = "block";
                }
            });

            timeInput.addEventListener('mouseleave', function () {
                tooltip.style.display = "none";
            });
        });
    </script>
    @endpush
</x-client-layout>




