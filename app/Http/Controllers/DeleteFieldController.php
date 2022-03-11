<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class DeleteFieldController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $field = Field::find($request->segment(2));
        $field->crops()->detach();

        $fieldId = $field->id;
        Field::Where('id', $fieldId)->delete();

        // Ta id:na från URL:en och ta bort croppen från rätt field (från databasen). 
        // Både crop-id och fields-id hänger mer i URL:en. 

        return redirect('/dashboard');
    }
}
