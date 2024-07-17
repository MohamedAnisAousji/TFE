<x-client-layout>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
            <h1 class="text-xl font-bold mb-4">Confirmation de Réservation</h1>
            <p class="mb-6">Vous recevrez votre confirmation d'événement par email dans 48 heures ouvrables.</p>
            <a href="{{ route('dashbord.client') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Retour au Tableau de Bord
            </a>
        </div>
    </div>
</x-client-layout>
