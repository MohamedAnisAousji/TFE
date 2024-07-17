<x-Client-layout>
<form action="{{ route('commentaire.store') }}" method="POST" class="space-y-4">
    @csrf 

    {{-- Champ de commentaire --}}
    <div>
        <label for="commentaire" class="block text-sm font-medium text-gray-700">Commentaire</label>
        <textarea id="commentaire" name="commentaire" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Votre commentaire ici..."></textarea>
    </div>

    {{-- Évaluation - Menu déroulant --}}
    <div>
        <label for="evaluation" class="block text-sm font-medium text-gray-700">Évaluation</label>
        <select id="evaluation" name="evaluation" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>

    {{-- Bouton de soumission --}}
    <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Soumettre
        </button>
    </div>
</form>
</x-Client-layout>

