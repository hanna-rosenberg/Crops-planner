<?php

namespace App\Http\Controllers;

//use App\Models\CropsInField;

use App\Models\Crop;
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

        $incompatibleId = Crop::select('incompatible_id')->where('id', $crop_id)->get();

        foreach ($incompatibleId as $incompatible) {
            $incompatible_id = $incompatible->incompatible_id;

            if ($incompatible->incompatible_id) {
                $incompatibleName = Crop::select()->where('id', '=', $incompatible->incompatible_id)->get();

                foreach ($incompatibleName as $name) {
                    $test = $name->name;
                    return back()->withErrors("Be were! This crop dosen't like $test");
                }
            };
            return redirect('dashboard');
        };
    }
}
