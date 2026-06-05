<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
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
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
<<<<<<< HEAD
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
=======
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
<<<<<<< HEAD
                        ->withErrors(['email' => __($status)]);
=======
                            ->withErrors(['email' => __($status)]);
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
