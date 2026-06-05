<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

<<<<<<< HEAD
    public function test_confirm_password_screen_can_be_rendered(): void
=======
    public function test_confirm_password_screen_can_be_rendered()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/confirm-password');

        $response->assertStatus(200);
    }

<<<<<<< HEAD
    public function test_password_can_be_confirmed(): void
=======
    public function test_password_can_be_confirmed()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

<<<<<<< HEAD
    public function test_password_is_not_confirmed_with_invalid_password(): void
=======
    public function test_password_is_not_confirmed_with_invalid_password()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
