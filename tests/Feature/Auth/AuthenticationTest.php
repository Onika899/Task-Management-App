<?php

namespace Tests\Feature\Auth;

use App\Models\User;
<<<<<<< HEAD
=======
use App\Providers\RouteServiceProvider;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

<<<<<<< HEAD
    public function test_login_screen_can_be_rendered(): void
=======
    public function test_login_screen_can_be_rendered()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

<<<<<<< HEAD
    public function test_users_can_authenticate_using_the_login_screen(): void
=======
    public function test_users_can_authenticate_using_the_login_screen()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
<<<<<<< HEAD
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
=======
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
<<<<<<< HEAD

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
=======
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
}
