<?php

namespace App\Http\Controllers;

use App\Models\CropsInField;
use Illuminate\Http\Request;

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
        echo 'hello';

        //------ I denna behöver vi kolla om det finns ngn grönsak i 
        //samma field_id som är noterad som dislike i dislikes tabellen. 
        // Kanske genom att hämta id på de andra grödorna i odlingen och kolla 
        //om de finns i databasen för dislike.------.


        // dd($request);
        // $this->validate($request, [
        //     'name' => 'required|string|min:3'
        // ]);

        $cropsInField = new CropsInField();
        $cropsInField->crop_id = $request->input('value');
        $cropsInField->field_id = $request->input('value');
        $cropsInField->save();

        return redirect('/dashboard');
    }
}
