<x-Client-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Subscribe</h2>
            <form id="payment-form" method="POST" action="{{ route('payment.process') }}">
                @csrf
                <div id="card-element">
                    <!--Stripe.js injects the Card Element-->
                </div>
                <button id="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Subscribe</button>
            </form>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod('card', cardElement).then(function(result) {
                if (result.error) {
                    console.error(result.error.message);
                } else {
                    // Add the payment method ID to the form
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'payment_method');
                    hiddenInput.setAttribute('value', result.paymentMethod.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
            });
        });
    </script>
</x-Client-layout>
