<?php

namespace Tests\Feature\Auth;

<<<<<<< HEAD
=======
use App\Providers\RouteServiceProvider;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

<<<<<<< HEAD
    public function test_registration_screen_can_be_rendered(): void
=======
    public function test_registration_screen_can_be_rendered()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

<<<<<<< HEAD
    public function test_new_users_can_register(): void
=======
    public function test_new_users_can_register()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
<<<<<<< HEAD
        $response->assertRedirect(route('dashboard', absolute: false));
=======
        $response->assertRedirect(RouteServiceProvider::HOME);
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
