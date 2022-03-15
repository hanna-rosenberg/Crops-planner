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


        return view('dashboard', [
            'user' => $user,
            'crops' => $crops
        ]);
    }
}
