<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="mt-5 w-full max-w-md">
            <form method="POST" action="{{ route('createR') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1 class="text-2xl font-bold text-blue-400 text-center mb-4">Choisir le type d'inscription</h1>
                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-bold mb-2">Choisissez le type d'inscription :</p>
                    <div class="flex flex-col">
                        <label for="client" class="inline-flex items-center">
                            <a href="/addclient" class="form-radio">
                                <input type="radio" id="client" name="type_inscription" value="client" class="hidden" required>
                                <span class="ml-2">Client</span>
                            </a>
                        </label>
                        <label for="societe" class="inline-flex items-center">
                            <a href="/newevenements" class="form-radio">
                                <input type="radio" id="societe" name="type_inscription" value="societe" class="hidden" required>
                                <span class="ml-2">Société</span>
                            </a>
                        </label>
                        <label for="ecole" class="inline-flex items-center">
                            <a href="/newevenements" class="form-radio">
                                <input type="radio" id="ecole" name="type_inscription" value="ecole" class="hidden" required>
                                <span class="ml-2">École</span>
                            </a>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
