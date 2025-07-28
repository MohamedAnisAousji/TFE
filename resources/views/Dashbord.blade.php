<x-Client-layout>
    {{-- 🌐 Sélecteur de langue --}}
    <div class="fixed top-0 right-0 m-4 z-50">
        <form action="{{ route('changeLanguage') }}" method="POST">
            @csrf
            <select name="locale" class="border border-gray-300 rounded-md bg-white/80 backdrop-blur px-2 py-1" onchange="this.form.submit()">
                <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
            </select>
        </form>
    </div>

    {{-- 🌄 Image de fond --}}
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('images/dashbord.png') }}" alt="background" class="w-full h-full object-cover brightness-90">
    </div>

    {{-- 🧭 Disposition principale --}}
    <div class="flex min-h-screen">

        {{-- 🍊 Menu latéral avec transparence --}}
       <div class="bg-black/70 backdrop-blur-sm text-white w-64 py-10 px-4 fixed inset-y-0 left-0 z-20 shadow-lg rounded-r-xl">
            <a href="/reservations/create" class="block px-4 py-2 mb-2 hover:bg-orange-500 rounded-md transition">{{ __('messages.reserve_ordinary') }}</a>
            <a href="/Event/Event" class="block px-4 py-2 mb-2 hover:bg-orange-500 rounded-md transition">{{ __('messages.reserve_event') }}</a>
            <a href="/Event/Event" class="block px-4 py-2 mb-2 hover:bg-orange-500 rounded-md transition">{{ __('messages.reserve_school') }}</a>
            <a href="/enfants/mesenfants" class="block px-4 py-2 mb-2 hover:bg-orange-500 rounded-md transition">{{ __('messages.my_children') }}</a>
            <a href="/reservation/show" class="block px-4 py-2 mb-2 hover:bg-orange-500 rounded-md transition">{{ __('messages.my_packages') }}</a>
            <a href="#" class="block px-4 py-2 mt-4 hover:bg-orange-500 rounded-md transition" onclick="document.getElementById('formLogout').submit();">{{ __('messages.logout') }}</a>
            <form id="formLogout" action="{{ route('client.logout') }}" method="POST">@csrf</form>
        </div>

        {{-- 📄 Contenu principal --}}
        <div class="flex-1 ml-64 px-10 py-10">
            {{-- 🧊 Titre de bienvenue --}}
            <div class="text-center bg-white-200/70 backdrop-blur-md p-6 rounded-xl shadow-md mb-10">
                <h1 class="text-2xl font-bold text-gray-800">{{ __('messages.dashboard') }} Stardust Park</h1>
            </div>

            {{-- 🔲 Cartes --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/70 backdrop-blur-lg p-6 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
                    <a href="/Client/update" class="text-xl font-semibold text-gray-900 block">{{ __('messages.modify_profile') }}</a>
                    <div class="text-blue-600 mt-3"><i class="fa-solid fa-pen-fancy fa-lg"></i></div>
                </div>

                <div class="bg-white/70 backdrop-blur-lg p-6 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
                    <a href="/enfants/create" class="text-xl font-semibold text-gray-900 block">{{ __('messages.add_child') }}</a>
                    <div class="text-green-600 mt-3"><i class="fa-solid fa-baby fa-lg"></i></div>
                </div>

                <div class="bg-white/70 backdrop-blur-lg p-6 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
                    <a href="/commentaire/addcommentaire" class="text-xl font-semibold text-gray-900 block">{{ __('messages.add_comment') }}</a>
                    <div class="text-purple-600 mt-3"><i class="fa-solid fa-comment fa-lg"></i></div>
                </div>
            </div>
        </div>
    </div>

    {{-- 📍 Pied de page --}}
    <div class="fixed bottom-0 left-0 w-full bg-black/70 text-white text-center p-4 text-sm backdrop-blur-sm z-30">
        @if(Auth::guard('client')->check())
            <p>{{ __('messages.welcome_client', ['prenom' => Auth::guard('client')->user()->prenom_parent, 'nom' => Auth::guard('client')->user()->Nom_Parent]) }}</p>
        @else
            <p>{{ __('messages.welcome_guest') }}</p>
        @endif

        <div class="mt-2">
            <p class="font-semibold">{{ __('messages.opening_hours') }}</p>
            <p>{{ __('messages.monday_friday') }}</p>
            <p>{{ __('messages.saturday') }}</p>
            <p>{{ __('messages.sunday') }}</p>
        </div>

        <div class="mt-2 space-x-4 text-lg">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-tiktok"></i>
        </div>
    </div>
</x-Client-layout>
