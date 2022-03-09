<?php

namespace App\Http\Controllers;

use App\Models\Dislikes;
use App\Models\Field;
use Illuminate\Http\Request;

class DislikesController extends Controller
{
    public function __invoke(Request $request)
    {
        $dislikes = Dislikes::all();
        // die(var_dump($dislikes));
        // $dislike = Dislike::all();
        // $field = Field::find($request->segment(1));
    }
}
