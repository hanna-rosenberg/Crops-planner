<?php

namespace Database\Seeders;

use App\Models\Crop;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $crops =[
            new Crop(['name' => 'Strawberry', 'incompatible_id' => 2]),
            new Crop(['name' => 'Bluberry', 'incompatible_id' => 3]),
            new Crop(['name' => 'Mangold']),
            new Crop(['name' => 'Salad']),
            new Crop(['name' => 'Beetroot']),
        ];
        foreach ($crops as $crop) {
            $crop->save();
        }

        $user = new User(['name' => 'Henrik', 'email' => 'henrik@yrgo.se', 'password' => Hash::make('123')]);
        $user->save();
    }
}
