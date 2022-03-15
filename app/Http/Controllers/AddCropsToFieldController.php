<?php

namespace App\Http\Controllers;

//use App\Models\CropsInField;

use App\Models\Crop;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class AddCropsToFieldController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::user()) {
            $field = Field::find($request->input('field-id'));
            $crop_id = $request->input('crop-id');

            $field->crops()->attach([$crop_id]);

            $incompatibleCrops = Crop::select('incompatible_id', 'name')->where('id', $crop_id)->get();

            foreach ($incompatibleCrops as $incompatibleCrop) {
                $cropName = $incompatibleCrop->name;

                if ($incompatibleCrop->incompatible_id) {
                    $incompatibleName = Crop::select()->where('id', '=', $incompatibleCrop->incompatible_id)->get();

                    foreach ($incompatibleName as $name) {
                        $incompatibleCropName = $name->name;
                        return back()->withErrors("Be awere! $cropName dosen't like $incompatibleCropName");
                    }
                };
                return redirect('dashboard');
            };
        }
    }
}
