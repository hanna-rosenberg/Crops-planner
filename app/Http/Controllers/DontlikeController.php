<?php

namespace App\Http\Controllers;

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
        $dislikes = Dontlikes::where('product_id', '>', 1)->get();
        echo 'Efter detta fields';
        $field = Field::where('id', 1)->get();
        echo $field;
        echo '***********Efter detta dislikes***********';
        echo $dislikes;

        foreach ($dislikes as $dislike) {
            echo $dislike->dislike_id;
        }
        echo 'hello';
    }
}
