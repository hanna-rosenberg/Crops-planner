<?php

namespace App\Http\Controllers;

//use App\Models\CropsInField;

use App\Models\Field;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class RemoveCropsFromFieldController extends Controller
{
    public function __invoke(Request $request, Field $field, Crop $crop)
    {
        if (Auth::user()) {
            $field = Field::find($request->segment(2));
            $crop_id = $request->segment(3);
            $field->crops()->detach([$crop_id]);

            return redirect('/dashboard');
        }
    }
}
