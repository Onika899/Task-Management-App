<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
=======
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
<<<<<<< HEAD
     */
    public function show(): View
=======
     *
     * @return \Illuminate\View\View
     */
    public function show()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
<<<<<<< HEAD
     */
    public function store(Request $request): RedirectResponse
=======
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

<<<<<<< HEAD
        return redirect()->intended(route('dashboard', absolute: false));
=======
        return redirect()->intended(RouteServiceProvider::HOME);
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
