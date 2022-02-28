<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Crop;
use App\Models\CropsInField;
use App\Models\Dislikes;

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

        $cropsInField = CropsInField::all();

        // Gör så att vi kan nå disklikes och använda den ut dem.
        //$dislikes = Dislikes::all();

        $user = Auth::user();

        return view('dashboard', [
            'user' => $user,
            'crops' => $crops,
            'cropsInField' => $cropsInField
        ]);
    }
}
