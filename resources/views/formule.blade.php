
<x-app-layout>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <div class="flex">
            <div class="flex-auto text-2xl mb-4">Déterminer la formule souhaitez </div>
        </div>
        <table class="w-full text-md rounded mb-4">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">FORMULE</th>
                    <th class="text-left p-3 px-5">Montant</th>
                    <th class="text-left p-3 px-5">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            @foreach($formules as $formule)
            <tr>
                <td>{{ $formule->nom_formule }}</td>
                <td>{{ $formule->Montant }}</td>
                <td><button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded"><a href="/deleteformule/{{$formule->id}}"><i class="fa-solid fa-trash"></i>
                </a></button></td>
            </tr>
        @endforeach
            </tbody>
        </table>
       
</x-app-layout> 
