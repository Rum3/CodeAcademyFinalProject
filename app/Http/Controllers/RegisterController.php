<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegForm() {
        return view('register');
    }

    public function createUser(Request $request) {

        $request->validate([
            'email' => 'required|max:50|email|unique:users',
            'name' => 'required|max:20|min:3|unique:users',
            'password' => 'required|min:4',
            'password_again' => 'required|same:password'
        ]);

        // dd($request->email);

            //Activation code
            $code = Str::random(60);

            $user = User::create([
                'email' => $request['email'],
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
                'code' => $code,
                'active' => 0
            ]);

            auth()->login($user);

            return redirect('/');

        }
    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {

        $userFields = $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);

        // dd($request->name);


        if(auth()->attempt($userFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['name' => 'Invalid Credentials']);
    }

    public function logout(Request $request) {

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message', 'Успешно излизане!');
    }

}
