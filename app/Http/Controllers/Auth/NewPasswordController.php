<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
=======
use Illuminate\Auth\Events\PasswordReset;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
<<<<<<< HEAD
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
=======
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
<<<<<<< HEAD
     */
    public function create(Request $request): View
=======
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
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
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
<<<<<<< HEAD
            function (User $user) use ($request) {
=======
            function ($user) use ($request) {
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
<<<<<<< HEAD
                        ->withErrors(['email' => __($status)]);
=======
                            ->withErrors(['email' => __($status)]);
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
