<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'girisadi' => 'required|string',
            'password' => 'required|string',
        ]);

        $girisadi = $request->input('girisadi');
        $password = $request->input('password');

        $credentialsList = [
            ['email' => $girisadi, 'password' => $password],
            ['username' => $girisadi, 'password' => $password],
            ['phone' => $girisadi, 'password' => $password],
        ];

        foreach ($credentialsList as $credentials) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
        }

        return back()->with('bildirim', 'Giriş bilgileri hatalı')->with('alert-type', 'error');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
