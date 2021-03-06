<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CreateFieldTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_field()
    {
        $user = new User();
        $user->name = 'Sofia';
        $user->email = 'sofia@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $this
            ->actingAs($user)
            ->post('/field', [
                'name' => 'Field one',
            ]);

        $this->assertDatabaseHas('fields', ['name' => 'Field one']);
    }
    public function test_create_field_without_name()
    {
        $user = new User();
        $user->name = 'Sofia';
        $user->email = 'sofia@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->followingRedirects()->post('/field', [
            'name' => '',
        ]);

        $response->assertSeeText('The name field is required');
    }
}
