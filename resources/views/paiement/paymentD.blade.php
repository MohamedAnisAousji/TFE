<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
</head>
<body>
    <h1>Welcome to Stripe Checkout</h1>
    <p>Click the button below to proceed with payment.</p>
    <a href="{{ route('payment.checkout') }}" class="btn btn-primary">Pay with Stripe</a>
</body>
</html>