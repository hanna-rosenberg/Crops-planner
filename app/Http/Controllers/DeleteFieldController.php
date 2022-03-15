<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteFieldController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::user()) {
            $field = Field::find($request->segment(2));
            $field->crops()->detach();

            $fieldId = $field->id;
            Field::Where('id', $fieldId)->delete();

            return redirect('/dashboard');
        }
    }
}
