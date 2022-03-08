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
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Gör så att vi kan nå crops och loopa ut dem.
        $crops = Crop::all();
        //dd($crops);

        //$cropsInField = CropsInField::all();
        //Här borde vi kunna innerjoina med crops för att får illhång till nament inte bara id

        // $cropsInField = CropsInField::join('crops', 'crops.id', '=', 'crops_in_fields.crop_id')
        //     ->get('crops.name', 'crops.id');
        //dd($cropsInField);

        $user = Auth::user();

        //$fields = Field::all();

        return view('dashboard', [
            'user' => $user,
            'crops' => $crops,
            //'fields' => $fields,
            //'cropsInField' => $cropsInField,
        ]);
    }
}
