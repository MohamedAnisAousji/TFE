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









<!-- <x-Client-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Connectez-vous à votre espace client</h3>
            @if (session('success'))
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Succès
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Erreur
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('Displaylogin') }}" method="POST">
                @csrf
                <div class="mt-4">
                    <div>
                        <label for="email" class="block">Email</label>
                        <input type="email" placeholder="Email" id="email" name="Email"
                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                    </div>
                    <div class="mt-4">
                        <label for="password" class="block">Mot de passe</label>
                        <input type="password" placeholder="Mot de passe" id="password" name="password"
                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Connexion</button>
                        <input type="checkbox" name="remember" class="" id=""/>
                        <a href="#" class="text-sm text-blue-600 hover:underline">Mot de passe oublié?</a>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="text-sm">Pas encore inscrit? <a href="{{ route('showRegistrationForm')}}" class="text-blue-600 hover:underline">Inscrivez-vous</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>
 -->