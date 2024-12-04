<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A secure e-commerce platform for coding challenges.">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Mysqlproject</title>

    <!-- CSS FILES -->
    <?php echo $__env->make("home.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="bg-gray-100">

    <main>
        <?php echo $__env->make("home.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("home.features", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("home.description", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(Auth::check() && $nature == null): ?> <!-- Check if the user is logged in and if nature is null -->
    <section id="pricing" class="py-20 bg-blue-100 text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Choose Your Perfect Plan</h2>
            <p class="mb-12 text-center text-lg text-gray-600">Select a subscription plan that suits your needs and enjoy premium features.</p>

            <!-- Flexbox layout for horizontal stacking on large screens -->
            <div class="flex flex-wrap justify-center gap-10 lg:gap-16">

                <!-- Free Trial Card -->
                <div class="bg-white p-8 rounded-xl shadow-xl text-center transform transition-all hover:scale-105 hover:shadow-2xl w-full sm:w-1/2 lg:w-1/3 xl:w-1/4">
                    <h3 class="text-3xl font-semibold text-gray-800 mb-4">Free Trial</h3>
                    <p class="text-xl text-gray-600 mb-4">14-Day Free Trial</p>
                    <p class="text-sm text-gray-500 mb-8">Get full access for 14 days—no credit card required!</p>
                    <a href="#" class="inline-block bg-green-500 text-white font-semibold px-8 py-3 rounded-full hover:bg-green-400 transition duration-300">Start Free Trial</a>
                </div>

                <!-- Monthly Subscription Card -->
                <div class="bg-white p-8 rounded-xl shadow-xl text-center transform transition-all hover:scale-105 hover:shadow-2xl w-full sm:w-1/2 lg:w-1/3 xl:w-1/4">
                    <h3 class="text-3xl font-semibold text-gray-800 mb-4">Monthly Plan</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-4">$10/month</p>
                    <p class="text-sm text-gray-500 mb-6">Access all features with no commitment. Cancel anytime!</p>
                    <ul class="text-left text-gray-600 mb-6 space-y-2">
                        <li>✔ Full access to all features</li>
                        <li>✔ No long-term commitment</li>
                        <li>✔ Cancel anytime</li>
                    </ul>
                    <button class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-full hover:bg-blue-500 transition duration-300" onclick="checkout('Monthly Subscription', 1000)">Subscribe Now</button>
                </div>

                <!-- Yearly Subscription Card -->
                <div class="bg-white p-8 rounded-xl shadow-xl text-center transform transition-all hover:scale-105 hover:shadow-2xl w-full sm:w-1/2 lg:w-1/3 xl:w-1/4">
                    <h3 class="text-3xl font-semibold text-gray-800 mb-4">Yearly Plan</h3>
                    <p class="text-2xl font-bold text-indigo-600 mb-4">$100/year</p>
                    <p class="text-sm text-gray-500 mb-6">Best value! Save $20 with our annual plan. Full access to all features.</p>
                    <ul class="text-left text-gray-600 mb-6 space-y-2">
                        <li>✔ Full access to all features</li>
                        <li>✔ Save 20% with the annual plan</li>
                        <li>✔ Priority support</li>
                    </ul>
                    <button class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded-full hover:bg-indigo-500 transition duration-300" onclick="checkout('Yearly Subscription', 10000)">Get Started</button>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>

    </main>

    <?php echo $__env->make("home.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("home.script", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>');

        function checkout(tier, amount) {
            fetch('/create-checkout-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '<?php echo e(csrf_token()); ?>',
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

</body>

</html>
<?php /**PATH /home/tonny/Laravel/prog/assignment4/projectsql/resources/views/welcome.blade.php ENDPATH**/ ?>