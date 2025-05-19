<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

    // Kullanıcı bilgilerini al
    $user = Auth::user();

    // Kullanıcının durumu aktif değilse çıkış yap ve hata ver
    if ($user->durum != 1) {
        Auth::logout();
        return redirect()->route('login')->withErrors(['error' => 'Hesabınız aktif değil.']);
    }

        //bildirim
        $mesaj = array(
            'bildirim' => 'Giriş Başarılı.',
            'alert-type' => 'success'
        );

        //bildirim


        return redirect()->intended(route('dashboard', absolute: false))->with($mesaj);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        //bildirim
        $mesaj = array(
            'bildirim' => 'Çıkış Başarılı.',
            'alert-type' => 'info'
        );

        //bildirim

        return redirect('/login')->with($mesaj);
    }
}
