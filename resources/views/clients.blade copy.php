


<h1>Clients</h1>

<div style="position: relative;">
    <a href="{{route('newclient')}}" style="position: absolute; right: 0; top: 0;">Ajouter Client</a>
 @if (session('success'))
 {{ session('success') }}  

 @endif
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>ID</th>
            <th>Genre</th>
            <th>Enfants</th>
            <th>Envoi Email</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->Nom_Parent }}</td>
                <td>{{ $client->Prenom_Parent }}</td>
                <td>{{ $client->id_Cli }}</td>
                <td>{{ $client->Genre }}</td>
                <td>{{ $client->Envoi_Email ? 'Oui' : 'Non' }}</td>
                <td>{{ $client->Email }}</td>
                <td><a href="/editclient/{{$client->id}}">Editer</a> <a href="/deleteclient/{{$client->id}}">delete</a></td>
            
            </tr>
        @endforeach
    </tbody>
</table>



   
  
<div>
 
</div>
 