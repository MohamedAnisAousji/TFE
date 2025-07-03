<x-client-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-xl font-bold text-center mb-6">Réserver une date</h1>

        <form action="{{ route('reservations.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="Date" class="block font-medium">Date :</label>
                <input type="date" id="Date" name="Date" required
                       class="form-input mt-1 block w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="heure_resrv" class="block font-medium">Heure :</label>
                <input type="time" id="heure_resrv" name="heure_resrv" required
                       class="form-input mt-1 block w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="client_name" class="block font-medium">Client :</label>
                <input type="text" value="{{ $client->nom_parent }}" readonly
                       class="form-input mt-1 block w-full border rounded-md bg-gray-100">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">
                    Suivant
                </button>
            </div>
        </form>
    </div>
</x-client-layout>
