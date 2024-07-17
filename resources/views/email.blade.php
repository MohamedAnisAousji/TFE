<x-app-layout>

<form action="{{ route('Envoiemail') }}" method="POST" class="p-5 max-w-sm mx-auto">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Email">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
            Subject
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subject" type="text" name="subject" placeholder="Subject">
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
            Message
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message" placeholder="Write your message here"></textarea>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Send Email
        </button>
    </div>
</form>

</x-app-layout>


