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
        $fieldId = $request->input('id');

        $field = Field::with(['crops', 'crops.incompatible'])->find($fieldId);
       //Denna håller allt vi behöver, men hur kommer vi åt det?
        
        dd($field->toArray());

        foreach ($field->toArray() as $item) {
            //i en var_dump ser man datan vi vill åt. Men i en DD visas den som en bool. 
            //Hur kommer vi ner i arrayen och åt inpompatible?
            //var_dump($item);
        }
    }
}
