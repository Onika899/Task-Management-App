<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
=======
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
<<<<<<< HEAD
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
=======
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

<<<<<<< HEAD
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
=======
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
