<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
<<<<<<< HEAD
use Illuminate\Contracts\Validation\ValidationRule;
=======
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
<<<<<<< HEAD
     */
    public function authorize(): bool
=======
     *
     * @return bool
     */
    public function authorize()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
<<<<<<< HEAD
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
=======
     * @return array
     */
    public function rules()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
<<<<<<< HEAD
     * @throws ValidationException
     */
    public function authenticate(): void
=======
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
<<<<<<< HEAD
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
=======
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
<<<<<<< HEAD
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
=======
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
