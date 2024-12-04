<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\User;

class PaymentController extends Controller
{
    // Create a Checkout session
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a new Checkout session with payment details
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $request->tier,
                        ],
                        'unit_amount' => $request->amount, // Amount in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}', // Pass session_id as a query parameter
            'cancel_url' => route('payment.cancel'),
            'metadata' => [
                'user_id' => auth()->id(), // Store user id to reference after payment
                'amount_paid' => $request->amount, // Store the amount in metadata (in cents)
            ],
        ]);

        // Return session ID to the frontend
        return response()->json(['id' => $session->id]);
    }

    // Handle successful payment
    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Retrieve the session ID from the query parameter
        $sessionId = $request->query('session_id');

        try {
            // Fetch the session details from Stripe using the session ID
            $session = Session::retrieve($sessionId);

            // Check if the payment is successful
            if ($session->payment_status === 'paid') {
                // Retrieve the user ID and the payment amount from session metadata
                $userId = $session->metadata->user_id;
                $amountPaid = $session->amount_total; // The amount in cents, so divide by 100 for dollars if needed

                // Find the user by ID
                $user = User::find($userId);

                if ($user) {
                    // Update the payment column with the amount paid
                    $user->current_team_id = $amountPaid; // Update payment column (amount is in cents)
                    $user->save();
                }

                // Optionally, pass the amount to the view if you want to show it to the user
                return view('home.payment', ['amount' => $amountPaid]); // Display success page
            } else {
                // Handle the case where the payment status is not 'paid'
                return view('home.payment-failed'); // Payment failed page
            }
        } catch (\Exception $e) {
            // Handle any errors (e.g., session retrieval failure)
            return view('home.payment-failed'); // Payment failed page
        }
    }

    // Handle canceled payment
    public function cancel()
    {
        return view('home.cancel'); // Payment canceled page
    }
}
