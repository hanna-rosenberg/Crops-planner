<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Crop;
use App\Models\CropsInField;
use App\Models\Dislikes;
use App\Models\Field;

class DashboardController extends Controller
{

    public function __invoke(Request $request)
    {
        $crops = Crop::all();
        $user = Auth::user();
    

        $fields = Field::with('crops')->get();
        //dd($fields[1]);

        $array = $fields->toArray();
       // dd($array);

        //dd($fields->fields->crops->name) ;

        foreach ($array as $field) {
            //DD($field['crops']);
            foreach ($field['crops'] as $crop) {
                //dd($crop['name']);
                // foreach ($crop as $name) {
                //     echo $name['name'];
                // }
            }
        };

        $testarray = $fields;

        // foreach ($testarray as $field) {
        //     foreach ($field as $crops) {
        //         echo $crops->name;
        //     }
        // };

        return view('dashboard', [
            'user' => $user,
            'crops' => $crops,
            'fields' => $fields,
        ]);
    }
}
