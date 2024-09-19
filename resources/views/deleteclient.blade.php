<div>

<form method="POST" action="{{route('editclient.save') }}">
    <input name="id" type="hidden" value="{{ $client->id }}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <table>
      

    
        <tr>
            <td><label  for="parentNom">Nom du parent:</label></td>
            <td><input type="text" id="Nom_Parent" name="Nom_Parent" value="{{$client->Nom_Parent}}" required></td>
        </tr>
        <tr>
            <td><label for="Prenom_parent">Prénom du parent:</label></td>
            <td><input type="text" id="Prenom_parent" name="Prenom_Parent" value="{{$client->Prenom_Parent}}" required></td>
        </tr>
        <tr>
            <td><label>Genre du parent:</label></td>
            <td>
                <label for="genreHomme">Homme</label>
                <input type="radio" id="genreHomme" name="Genre" value="0"
                @if($client->Genre == 0)
                checked
                @endif
                required>
                <label for="genreFemme">Femme</label>
                <input type="radio" id="genreFemme" name="Genre" value="1" 
                @if($client->Genre == 1)
                checked
                @endif 
                required>
            </td>
        </tr>
        <tr>
            <td><label for="Email">Email:</label></td>
            <td><input type="text" id="Email" name="Email"  value="{{$client->Email}}" required></td>
        </tr>
        <tr>
            <td><label>Envoie email:</label></td>
            <td>
                <label for="Envoie email">oui</label>
                <input type="radio" id="Envoi_Email" name="Envoi_Email" value="0" 
                @if($client->Envoi_Email == 0)
                checked
                @endif
                required>
                <label>non</label>
                <input type="radio" id="Envoi_Email" name="Envoi_Email" value="1" 
                @if($client->Envoi_Email == 1)
                checked
                @endif
                required>

            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <button type="submit" class="">Supprimer le client</button>
            </td>
        </tr>
    </table>
</form>


</form>
</div>
