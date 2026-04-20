<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))) 
        {
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'error' => 'Invalid credentials'
        ])->withInput($request->only('email'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image|max:8192',
        ]);
        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($request->hasFile('avatar')) 
        {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->update([
                'icon_url' => $path
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('login')->with('success', 'Account created.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Goodbye!');
    }
}
