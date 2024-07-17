<<!-- resources/views/reservations/create.blade.php -->
<x-client-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-xl font-bold text-center mb-4">Make a Reservation</h1>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="Date">Date:</label>
                <input type="date" id="Date" name="Date" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
            </div>
            
            <div class="mb-4">
                <label for="heure_resrv">Heure:</label>
                <input type="time" id="heure_resrv" name="heure_resrv" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="client_id">Client ID:</label>
                <input type="number" id="client_id" name="client_id" value="{{ $client->id }}" class="form-input rounded-md shadow-sm mt-1 block w-full" readonly>
            </div>

            <div class="mb-4">
                <label for="client_name">Client Name:</label>
                <input type="text" id="client_name" name="client_name" value="{{ $client->Nom_Parent }}" class="form-input rounded-md shadow-sm mt-1 block w-full" readonly>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Reservation</button>
            </div>
        </form>
    </div>
</x-client-layout>
