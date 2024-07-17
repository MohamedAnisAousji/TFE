<x-client-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white p-5 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Subscribe</h1>
            <form method="POST" action="{{ route('subscriptions.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="payment_method" class="block text-gray-700 text-sm font-bold mb-2">Payment Method:</label>
                    <input type="text" id="payment_method" name="payment_method" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Start Subscription</button>
            </form>
        </div>
    </div>
</x-client-layout>
