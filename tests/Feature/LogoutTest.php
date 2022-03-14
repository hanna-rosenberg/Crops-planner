<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_logout()
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

        // $response = $this->$user->get('logout');
        // har vi testat knappen? 


        $logout = $this
            ->followingRedirects()
            ->get('logout');

        $logout->assertOk();

        $response = $this->get('/'); // skickar till startsidan 

        $response->assertStatus(200); // får meddelande att allt är okej
    }
}
