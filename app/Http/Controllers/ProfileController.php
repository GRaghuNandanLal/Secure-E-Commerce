<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Import SqlExecutionResult model


class ProfileController extends Controller
{
    public function show()
{
    // Get the current user's team ID from the database
    $submissions = User::where("id", Auth::user()->id)->pluck("current_team_id")->first();

    // Divide the submission value by 100
    $value = $submissions / 100;

    // Set the $mesho variable based on the divided value
    if ($value == 10) {
        $mesho = '10 $ monthly subscription active';
    } elseif ($value == 100) {
        $mesho = '100 $ yearly subscription active';
    } else {
        $mesho = 'No active subscription';
    }

    // Dump the value of $mesho for debugging

    // Pass the data to the view
    return view('profile.show', compact("submissions", "mesho"));
}


    // Update the profile information (name, email)
    public function update(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Update the user's profile
        $user = Auth::user();
        $user->update($validated);

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully!');
    }

    // Update the password
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile.show')->with('error', 'Current password is incorrect.');
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.show')->with('status', 'Password updated successfully!');
    }

    // Logout the user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
