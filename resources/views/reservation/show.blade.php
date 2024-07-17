<!-- resources/views/reservations/show.blade.php -->
<x-client-layout>
    <div class="container mx-auto px-4 py-6">
    <form action="{{ route('reservations.show')}}" method="GET">
        <h1 class="text-xl font-bold text-center mb-4">Your Reservations</h1>
        @if($reservations->isEmpty())
            <p>You have no reservations.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">Reservation ID</th>
                            <th scope="col" class="py-3 px-6">Date</th>
                            <th scope="col" class="py-3 px-6">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr class="bg-white border-b">
                                <td class="py-4 px-6">{{ $reservation->id }}</td>
                                <td class="py-4 px-6">{{ $reservation->Date }}</td>
                                <td class="py-4 px-6">{{ $reservation->heure_resrv }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-client-layout>
