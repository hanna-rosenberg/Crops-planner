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
        $crops = Crop::all();
        $fields = Field::with('crops')->get();
        //dd($fields);
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user,
            'crops' => $crops,
            'fields' => $fields,
        ]);
    }
}
