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
        // echo $fieldId;

        // $dislikes = Dontlikes::where('product_id', $fieldId)->get();

        //Gets name from crops, id from dontlike, 
        $dislikes = Crop::join('dontlikes', 'crops.id', '=', 'dontlikes.dislike_id')
            ->join('crop_field', 'crops.id', '=', 'crop_field.crop_id')
            ->where('crop_field.field_id', '=', $fieldId)
            ->get();

        echo '********* Efter detta fieldsID ***************';
        echo ($fieldId);

        echo '***********Efter detta dislikes***********';
        echo $dislikes;
    }
}
