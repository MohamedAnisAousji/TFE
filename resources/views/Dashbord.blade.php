<x-Client-layout>
    <!-- Choix de la langue -->
    <div class="fixed top-0 right-0 m-4">
    <form action="{{ route('changeLanguage') }}" method="POST">
    @csrf
    <select name="locale" onchange="this.form.submit()">
        <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
        <option value="fr" {{ session('locale') == 'fr' ? 'selected' : '' }}>Français</option>
    </select>
</form>
    </div>

    <!-- Votre contenu existant -->
    <div class="container mx-auto mt-1">
        <div class="text-center bg-blue-200 p-5 rounded-lg shadow-lg">
            <h1 class="text-xl font-bold">{{ __('messages.dashboard') }} Stardust Park</h1>
        </div>   
    </div>   

    <!-- Barre de menu verticale sur le côté gauche -->
    <div class="flex h-screen overflow-hidden" style="background-image: url('{{ asset('image/img1.JPG') }}'); background-size: cover; background-position: center;">
        <!-- Menu vertical qui occupe toute la hauteur -->
        <div class="bg-orange-400 text-white w-64 py-7 px-2 fixed inset-y-0 left-0 transform md:relative transition duration-200 ease-in-out">
            <!-- Logo ou titre peut aller ici -->
            <a href="/formules/addformule" class="text-white px-6 py-2 block hover:text-gray-300">{{ __('messages.reserve_ordinary') }}</a>
            <a href="/Event/Event" class="text-white px-6 py-2 block hover:text-gray-300">{{ __('messages.reserve_event') }}</a>
            <a href="/Event/Event" class="text-white px-6 py-2 block hover:text-gray-300">{{ __('messages.reserve_school') }}</a>
            <a href="/enfants/mesenfants" class="text-white px-6 py-2 block hover:text-gray-300">{{ __('messages.my_children') }}</a>
            <a href="/reservation/show" class="text-white px-6 py-2 block hover:text-gray-300">{{ __('messages.my_packages') }}</a>
            <a href="#" class="text-white px-6 py-2 block hover:text-gray-300" onclick="document.getElementById('formLogout').submit();">{{ __('messages.logout') }}</a>
            <form id="formLogout" action="{{ route('client.logout') }}" method="POST">
                @csrf
            </form>
        </div>

        <!-- Contenu principal -->
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex justify-center">
                    <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                        <a href="/Client/update" class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ __('messages.modify_profile') }}</a>
                        <i class="fa-solid fa-pen-fancy"></i>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                        <a href="/enfants/create" class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ __('messages.add_child') }}</a>
                        <i class="fa-sharp fa-solid fa-baby"></i>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                        <a href="/commentaire/addcommentaire" class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ __('messages.add_comment') }}</a>
                        <i class="fa-solid fa-comment"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Afficher le nom et le prénom du client en bas de la page -->
    <div class="fixed bottom-0 left-0 w-full bg-gray-800 text-white text-center py-4">
        @if(Auth::guard('client')->check())
            <p>{{ __('messages.welcome_client', ['prenom' => Auth::guard('client')->user()->Prenom_Parent, 'nom' => Auth::guard('client')->user()->Nom_Parent]) }}</p>
        @else
            <p>{{ __('messages.welcome_guest') }}</p>
        @endif
        <!-- Heures d'ouverture -->
        <div class="mt-2">
            <p class="text-lg font-bold">{{ __('messages.opening_hours') }}</p>
            <p>{{ __('messages.monday_friday') }}</p>
            <p>{{ __('messages.saturday') }}</p>
            <p>{{ __('messages.sunday') }}</p>
        </div>
    </div>
</x-Client-layout>