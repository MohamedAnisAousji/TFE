<x-client-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-xl font-bold text-center mb-4">Make a Reservation</h1>
        
        <!-- Note sur les horaires -->
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg mb-6 shadow">
            <p><strong>Reservation Hours:</strong></p>
            <ul class="list-disc pl-5">
                <li><strong>Monday - Friday:</strong> 10:00 - 18:00</li>
                <li><strong>Saturday:</strong> 10:00 - 20:00</li>
                <li><strong>Sunday:</strong> 12:00 - 18:00</li>
            </ul>
        </div>

        <form action="{{ route('reservations.store') }}" method="POST" id="reservationForm">
            @csrf
            <!-- Date -->
            <div class="mb-4">
                <label for="Date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                <input type="date" id="Date" name="Date" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
            </div>
            
            <!-- Heure -->
            <div class="mb-4">
                <label for="heure_resrv" class="block text-gray-700 text-sm font-bold mb-2">Heure:</label>
                <input type="time" id="heure_resrv" name="heure_resrv" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
            </div>

            <!-- Client ID -->
            <div class="mb-4">
                <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">Client ID:</label>
                <input type="number" id="client_id" name="client_id" value="{{ $client->id }}" class="form-input rounded-md shadow-sm mt-1 block w-full" readonly>
            </div>

            <!-- Client Name -->
            <div class="mb-4">
                <label for="client_name" class="block text-gray-700 text-sm font-bold mb-2">Client Name:</label>
                <input type="text" id="client_name" name="client_name" value="{{ $client->Nom_Parent }}" class="form-input rounded-md shadow-sm mt-1 block w-full" readonly>
            </div>
            
            <!-- Bouton de soumission -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Reservation</button>
            </div>
        </form>
    </div>

    <!-- Script JavaScript pour valider les horaires -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dateInput = document.getElementById('Date');
            const timeInput = document.getElementById('heure_resrv');
            const reservationForm = document.getElementById('reservationForm');

            // Fixe la date minimale à aujourd'hui
            const today = new Date();
            const minDate = today.toISOString().split('T')[0]; // Format YYYY-MM-DD
            dateInput.setAttribute('min', minDate);

            // Validation lors de la soumission du formulaire
            reservationForm.addEventListener('submit', function (e) {
                const selectedDate = new Date(dateInput.value);
                const selectedDay = selectedDate.getDay(); // 0 = Dimanche, 1 = Lundi, ..., 6 = Samedi
                const selectedTime = timeInput.value;

                // Plages horaires par jour
                const timeRanges = {
                    0: { start: "12:00", end: "18:00" }, // Dimanche
                    1: { start: "10:00", end: "18:00" }, // Lundi
                    2: { start: "10:00", end: "18:00" }, // Mardi
                    3: { start: "10:00", end: "18:00" }, // Mercredi
                    4: { start: "10:00", end: "18:00" }, // Jeudi
                    5: { start: "10:00", end: "18:00" }, // Vendredi
                    6: { start: "10:00", end: "20:00" }, // Samedi
                };

                const timeRange = timeRanges[selectedDay];

                // Vérifie si l'heure est dans la plage autorisée
                if (selectedTime < timeRange.start || selectedTime > timeRange.end) {
                    e.preventDefault();
                    alert(`Invalid time! Reservations for this day must be between ${timeRange.start} and ${timeRange.end}.`);
                    return;
                }
            });
        });
    </script>
</x-client-layout>
