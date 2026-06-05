<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
<<<<<<< HEAD
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
=======
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
<<<<<<< HEAD
     */
    public function create(): View
=======
     *
     * @return \Illuminate\View\View
     */
    public function create()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
<<<<<<< HEAD
     */
    public function store(LoginRequest $request): RedirectResponse
=======
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $request->authenticate();

        $request->session()->regenerate();

<<<<<<< HEAD
        return redirect()->intended(route('dashboard', absolute: false));
=======
        return redirect()->intended(RouteServiceProvider::HOME);
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }

    /**
     * Destroy an authenticated session.
<<<<<<< HEAD
     */
    public function destroy(Request $request): RedirectResponse
=======
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
