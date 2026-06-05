<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
<<<<<<< HEAD
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
=======
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
<<<<<<< HEAD
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
=======
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
<<<<<<< HEAD
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
=======
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

<<<<<<< HEAD
        return redirect(route('dashboard', absolute: false));
=======
        return redirect(RouteServiceProvider::HOME);
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
