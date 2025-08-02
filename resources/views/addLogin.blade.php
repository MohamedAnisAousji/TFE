<x-Client-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center"
         style="background-image: url('{{ asset('images/conexion.png') }}');">

        <div class="bg-white bg-opacity-90 backdrop-blur-sm p-8 rounded-xl shadow-2xl w-full max-w-md">
            <h1 class="text-3xl font-bold text-center text-blue-900 mb-6">Connexion</h1>

            {{-- ✅ Messages de session --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm font-medium">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4 text-sm font-medium">
                    ❌ {{ $errors->first('email') }}
                </div>
            @endif

            @if ($errors->has('password'))
                <div class="bg-yellow-100 text-yellow-800 p-3 rounded mb-4 text-sm font-medium">
                    ⚠️ {{ $errors->first('password') }}
                </div>
            @endif

            {{-- ✅ Formulaire de connexion --}}
            <form action="{{ route('Displaylogin') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block mb-1 text-sm font-semibold text-gray-700">Adresse email</label>
                    <div class="flex items-center border border-gray-300 rounded-md px-3 py-2 bg-white">
                        <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 12H8m8 0H8m8-6H8m8 12H8m8 0H8m8 0H8"/>
                        </svg>
                        <input id="email" name="email" type="email" placeholder="exemple@email.com" required
                               class="w-full bg-transparent focus:outline-none">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-1 text-sm font-semibold text-gray-700">Mot de passe</label>
                    <div class="flex items-center border border-gray-300 rounded-md px-3 py-2 bg-white">
                        <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5.5 20h13a2 2 0 002-2v-5a9 9 0 00-18 0v5a2 2 0 002 2z"/>
                        </svg>
                        <input id="password" name="password" type="password" placeholder="••••••••" required
                               class="w-full bg-transparent focus:outline-none">
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-md transition duration-200">
                    Se connecter
                </button>

                <div class="mt-4 text-center text-sm">
                    Pas encore inscrit ?
                    <a href="{{ route('showRegistrationForm') }}" class="text-indigo-600 hover:underline">
                        Inscrivez-vous
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>









