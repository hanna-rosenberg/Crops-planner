<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Dontlikes;
use App\Models\Field;
use Illuminate\Http\Request;

class DontlikeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)

    {
        // $fieldId = $request->input('id');
        // $crop = Crop::join('crop_field', 'crops.id', '=', 'crop_field.crop_id')
        //     ->where('crop_field.field_id', $fieldId)
        //     ->get();


        // foreach ($crop as $test) {
        //     echo ($test->name);
        //     echo ($test->incompatible_id);
        // }

    }
}
