<?php

namespace App\Http\Controllers;

//use App\Models\CropsInField;

use App\Models\Field;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class RemoveCropsFromFieldController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // Ta id:na från URL:en och ta bort croppen från rätt field (från databasen). 
        // Både crop-id och fields-id hänger mer i URL:en. 

        return redirect('/dashboard');
    }
}
