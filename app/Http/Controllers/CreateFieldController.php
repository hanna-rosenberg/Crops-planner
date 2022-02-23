<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateFieldController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        //dd($request);
        $this->validate($request, [
            'name' => 'required|string|min:3'
        ]);

        $field = new Field();
        $field->name = $request->input('name');
        $field->user_id = Auth::id();
        $field->save();

        return redirect('/dashboard');
    }
}
