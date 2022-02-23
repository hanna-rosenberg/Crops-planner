<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Crop;

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

        $user = Auth::user();

        return view('dashboard', [
            'user' => $user,
            'crops' => $crops
        ]);
    }
}
