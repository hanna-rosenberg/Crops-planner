<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = new User();
        $user->name = 'Hanna';
        $user->email = 'hanna@hej.se';
        $user->password = Hash::make('321');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'hanna@hej.se',
                'password' => '321',
            ]);

        $response->assertSeeText('Welcome to your farm');
    }

    public function test_login_user_without_password()
    {
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'hanna@hej.se',
            ]);

        $response->assertSeeText('Whoops! Please try to login again.');
    }
}
