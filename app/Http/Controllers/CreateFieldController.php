<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateFieldController extends Controller
{

    public function __invoke(Request $request)
    {
        if (Auth::user()) {
            
            $this->validate($request, [
                'name' => 'required|string|min:3|max:50'
            ]);

            $field = new Field();
            $field->name = $request->input('name');
            $field->user_id = Auth::id();
            $field->save();

            return redirect('/dashboard');
        }
    }
}
