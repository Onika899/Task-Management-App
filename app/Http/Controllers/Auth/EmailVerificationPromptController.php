<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
=======
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
<<<<<<< HEAD
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
=======
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
                    : view('auth.verify-email');
    }
}
