<x-Client-layout>
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

            @if ($errors->has('email'))
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Erreur
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    {{ $errors->first('email') }}
                </div>
            @endif

            @if ($errors->has('password'))
                <div class="bg-yellow-500 text-white font-bold rounded-t px-4 py-2">
                    Erreur de mot de passe
                </div>
                <div class="border border-t-0 border-yellow-400 rounded-b bg-yellow-100 px-4 py-3 text-yellow-700">
                    {{ $errors->first('password') }}
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
                      
                    </div>
                    <div class="mt-4 text-center">
                        <p class="text-sm">Pas encore inscrit? <a href="{{ route('showRegistrationForm')}}" class="text-blue-600 hover:underline">Inscrivez-vous</a></p>
                    </div>
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