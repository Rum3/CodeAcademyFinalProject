<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        // Validate the request
        $request->validate([
            'token' => 'required',
            // 'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $token = $request->token;
        // $email = $request->email;
        $password = $request->password;

        $user = User::where('password_reset_token', $token)->first();

        // Verify if the token matches
        if ($user->password_reset_token != $token) {
            return redirect()->back()->withErrors(['token' => 'Invalid token.']);
        }

        // If token matches, reset the password
        $user->password = Hash::make($password);
        $user->password_reset_token = ''; // Clear the reset token
        $user->save();

        return redirect('/login')->with('message', 'Your password has been successfully reset. Please log in with your new password.');
    }
}
