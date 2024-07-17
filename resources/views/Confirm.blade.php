<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-no-repeat bg-cover bg-center" style="background-image: url('{{ asset('image/img1.JPG') }}');">
    <form method="POST" action="{{ route('Confirm')}}" >
        <div class="p-8 bg-white bg-opacity-75 rounded-lg shadow-lg text-center">
            <h1 class="text-xl font-bold">Veuillez confirmer votre compte pour continuer votre réservation... merci</h1>
        </div>
    </form>
    </div>
</x-app-layout>
