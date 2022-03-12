<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Crop;
use App\Models\Field;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AddCropToFieldTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_crop_to_field()
    {
        $user = new User();
        $user->name = 'Sofia';
        $user->email = 'sofia@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $field = new Field();
        $field->name = 'Field one';
        $user->save();

        //Vet ej om denna behövs... För att skapa två sorps pga logik i contoller
        $crop = new Crop();
        $crop->name = 'strawberry';
        $crop->incompatible_id = 2;
        $user->save();

        $crop = new Crop();
        $crop->name = 'blueberry';
        $crop->incompatible_id = 1;
        $user->save();

        $this
            ->actingAs($user)
            //->followingRedirects()
            ->post('/add-crop', [
                'field-id' => 1,
                'crop-id' => 1
            ]);

        // $this->assertDatabaseHas('fields', ['name' => 'Field one']);

        $this->assertDatabaseHas('crop_field', ['field_id' => 1, 'crop_id' => 1]);
    }
}
