<?php

namespace App\Http\Controllers;

//use App\Models\CropsInField;

use App\Models\Field;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AddCropsToFieldController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $field = Field::find($request->input('field-id'));
        $crop_id = $request->input('crop-id');

        $field->crops()->attach([$crop_id]);

        // $cropsInField = new CropsInField();
        // $cropsInField->crop_id = $request->input('add-crop');
        // $cropsInField->field_id = $request->input('field-id');
        // $cropsInField->save();

        return redirect('/dashboard');
    }
}
