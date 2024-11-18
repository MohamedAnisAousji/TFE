<x-client-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white p-5 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Subscribe</h1>
            <form id="payment-form" method="POST" action="{{ route('subscriptions.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="card-element" class="block text-gray-700 text-sm font-bold mb-2">Card Details:</label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <input type="hidden" id="payment_method" name="payment_method">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Start Subscription</button>
            </form>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51PTirEGOkT7NMKHolJee8DJwhjrzQHPa2iCIRjiJHEdztjPpmfMxpAldpuRRMZVFqflR9nW8k87HLiMVYctgEi0p00hHW4qEpi');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style, hidePostalCode: true});

        // Add an instance of the card Element into the `card-element` div.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    // Include any other billing details here.
                },
            }).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    document.getElementById('payment_method').value = result.paymentMethod.id;
                    form.submit();
                }
            });
        });
    </script>
</x-client-layout>

