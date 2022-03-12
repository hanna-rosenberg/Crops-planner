<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class removeCropFromField extends TestCase
{
   // Route::get('remove-crop/{field}/{crop}', RemoveCropsFromFieldController::class)->name('remove')->middleware('auth');

 
    public function test_remove_crop()
    {
        $user = new User();
        $user->name = 'Sofia';
        $user->email = 'sofia@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $this
            ->actingAs($user)
            ->get('/delete-field/1');

        $this->assertDatabaseMissing('fields', ['id' => 1]);
    }
}
