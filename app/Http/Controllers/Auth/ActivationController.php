<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{
        public function activating(Request $request)
    {
        $user = User::where('activation_token', $request->token)->firstOrFail();

        $user->update([
            'activation_token' => '',
            'email_verified_at' => now(),
            'active' => 1,
        ]);

        // Optionally, you can automatically log in the user after activation
        auth()->login($user);

        return redirect('/login')->with('message', 'Your account has been activated. You are now logged in.');
    }
}
