<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DeleteFieldTest extends TestCase
{
   use RefreshDatabase;

    public function test_delete_field()
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

            $this
            ->actingAs($user)
            ->get('/field', [
                'name' => 'Field one',
            ]);

        $this->assertDatabaseHas('fields', ['name' => 'Field one']);
    }
}
