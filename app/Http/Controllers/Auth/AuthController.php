<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Str;

class AuthController extends Controller
{

    public function index()
    {

        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $remember = (bool)$request->remember;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return Redirect::route('home.index');
        }

        return back()->withErrors([
            'email' => 'Email e/ou senha incorretos.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function signupAction(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|string|min:8',
            'password_confirm' => 'required|string|min:8|same:password'
        ]);
        $user = User::create([
            'name' => ucwords(trim($validated['name']) . ' ' . trim($validated['last_name'])),
            'email' => trim(strtolower($validated['email'])),
            'password' => bcrypt($validated['password']),
        ]);

        event(new Registered($user));

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password']
        ];

        $request->session()->invalidate();

        if (Auth::attempt($credentials, false)) {
            $request->session()->regenerate();

            return Redirect::route('home.index');
        }

        return Redirect::route('home.index');
    }
}
