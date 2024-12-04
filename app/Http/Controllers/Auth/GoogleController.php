<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Two\InvalidStateException;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Create a new user if not exists
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Use Str::random() to generate a random password
                ]);
            }

            // Log the user in
            Auth::login($user);
            

            // Redirect to intended page
            return redirect()->intended('/');
        } catch (InvalidStateException $e) {
            Log::error('Socialite InvalidStateException', ['exception' => $e]);
            return redirect('/')->with('error', 'Authentication failed.');
        }
    }
}
