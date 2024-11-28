<x-client-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Your Reservations</h1>

        @if($reservations->isEmpty())
            <p class="text-center text-gray-600">You have no reservations.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($reservations as $reservation)
                    <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-200 hover:shadow-xl transition">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Reservation ID: {{ $reservation->id }}</h2>
                        <p class="text-gray-600"><strong>Date:</strong> {{ $reservation->Date }}</p>
                        <p class="text-gray-600"><strong>Time:</strong> {{ $reservation->heure_resrv }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-client-layout>

