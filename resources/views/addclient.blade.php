<x-Client-layout>
<h1 class="text-2xl font-bold text-blue-400 text-center ">Clients</h1>
    <div class="flex justify-center items-center min-h-screen">
        <div class="mt-5 w-full max-w-md">

            <form method="POST" action="{{ route('saveclient')}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            
    @csrf

    <input type="text" name="nom_parent" placeholder="Nom du parent" required>
    <input type="text" name="prenom_parent" placeholder="Prénom du parent" required>

    <select name="genre_parent" required>
        <option value="">Sélectionnez le genre</option>
        <option value="M">Masculin</option>
        <option value="F">Féminin</option>
    </select>

    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>

    <select name="type_client" required>
        <option value="">Sélectionnez le type client</option>
        <option value="societe">Société</option>
        <option value="client ordinaire">Client ordinaire</option>
    </select>

    <label>
        <input type="checkbox" name="envoi_mail" value="1"> Recevoir les mails
    </label>

    <button type="submit">Enregistrer le client</button>
</form>
</x-Client-layout>