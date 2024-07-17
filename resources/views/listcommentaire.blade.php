<x-app-layout>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-pink-200 dark:bg-pink-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">Commentaire</th>
                    <th scope="col" class="py-3 px-6">Évaluation</th>
                </tr>
            </thead>
            <tbody class="bg-pink-50 dark:bg-pink-800">
                @foreach ($commentaires as $commentaire)
                <tr class="border-b dark:border-pink-700">
                    <td class="py-4 px-6">{{ $commentaire->commentaire }}</td>
                    <td class="py-4 px-6">{{ $commentaire->evaluation }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

