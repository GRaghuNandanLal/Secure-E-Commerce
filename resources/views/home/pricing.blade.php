@if(Auth::check()) <!-- Check if the user is logged in -->
    <section id="pricing" class="py-20 bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-10 text-center">Choose Your Plan</h2>
        <p class="mb-6 text-center">Select the subscription that best fits your needs.</p>
        <div class="flex flex-wrap justify-around">
            <!-- Free Tier Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg m-4 flex-1 max-w-xs text-center">
                <h3 class="text-xl font-semibold mb-2">Free Tier</h3>
                <p class="mb-4">14-Day Free Trial</p>
                <p class="mb-4">Access to basic features for 14 days. No credit card required!</p>
                <a class="inline-block bg-green-500 text-white font-semibold px-4 py-2 rounded hover:bg-green-400 transition">Free trial started</a>
            </div>
            <!-- Monthly Subscription Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg m-4 flex-1 max-w-xs text-center">
                <h3 class="text-xl font-semibold mb-2">Monthly Subscription</h3>
                <p class="mb-4">$50/month</p>
                <p class="mb-4">Full access to all features, billed monthly. Cancel anytime!</p>
                <button class="inline-block bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-400 transition" onclick="checkout('Monthly Subscription', 5000)">Subscribe Now</button>
            </div>
            <!-- Yearly Subscription Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg m-4 flex-1 max-w-xs text-center">
                <h3 class="text-xl font-semibold mb-2">Yearly Subscription</h3>
                <p class="mb-4">$1200/year</p>
                <p class="mb-4">Best value! Full access to all features, billed annually.</p>
                <button class="inline-block bg-purple-500 text-white font-semibold px-4 py-2 rounded hover:bg-purple-400 transition" onclick="checkout('Yearly Subscription', 120000)">Get Started</button>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');

        function checkout(tier, amount) {
            fetch('/create-checkout-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ tier: tier, amount: amount }),
            })
            .then(response => response.json())
            .then(data => {
                return stripe.redirectToCheckout({ sessionId: data.id });
            })
            .then(result => {
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</section>

@endif