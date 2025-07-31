<x-Client-layout>
    <div class="min-h-screen flex items-center justify-between bg-[length:90%] bg-center px-12"
         style="background-image: url('{{ asset('images/bg-register.png') }}');">

        {{-- Titre à gauche (vide ici car intégré dans l’image) --}}
        <div class="hidden md:block w-1/2">
            <!-- espace vide ou texte si besoin -->
        </div>

        {{-- Formulaire à droite --}}
        <div class="w-full max-w-md mt-10 bg-white bg-opacity-90 backdrop-blur-md shadow-xl rounded-xl p-6 space-y-4">
            <form method="POST" action="{{ route('saveclient') }}" class="space-y-4">
                @csrf

                {{-- Nom du parent --}}
                <div>
                    <label for="nom_parent" class="block text-sm font-medium text-gray-700">Nom du parent</label>
                    <input type="text" name="nom_parent" id="nom_parent"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                           placeholder="Dupont" required>
                </div>

                {{-- Prénom --}}
                <div>
                    <label for="prenom_parent" class="block text-sm font-medium text-gray-700">Prénom du parent</label>
                    <input type="text" name="prenom_parent" id="prenom_parent"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                           placeholder="Jean" required>
                </div>

                {{-- Genre --}}
                <div>
                    <label for="genre_parent" class="block text-sm font-medium text-gray-700">Genre</label>
                    <select name="genre_parent" id="genre_parent"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            required>
                        <option value="">Sélectionnez le genre</option>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                    </select>
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                           placeholder="exemple@email.com" required>
                </div>

                {{-- Mot de passe --}}
                <div>
                    <label for="mot_de_passe" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                           placeholder="••••••••" required>
                </div>

                {{-- Type client --}}
                <div>
                    <label for="type_client" class="block text-sm font-medium text-gray-700">Type de client</label>
                    <select name="type_client" id="type_client"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            required>
                        <option value="">Sélectionnez le type de client</option>
                        <option value="societe">Société</option>
                        <option value="client ordinaire">Client ordinaire</option>
                    </select>
                </div>

                {{-- Checkbox --}}
                <div class="flex items-center">
                    <input type="checkbox" name="envoi_mail" id="envoi_mail" value="1" class="mr-2 rounded">
                    <label for="envoi_mail" class="text-sm text-gray-700">Recevoir les mails</label>
                </div>

                {{-- Bouton --}}
                <div>
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        Enregistrer le client
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-Client-layout>
