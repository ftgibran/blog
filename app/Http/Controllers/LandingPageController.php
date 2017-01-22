<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LandingPageController extends Controller
{


    public function create(Request $request) {

        $lead = new Guest();
        $lead->name = Input::get('nome');
        $lead->email = Input::get('email');
        $lead->ip = $request->ip();
        $lead->typePop = Input::get('tipo');
        $lead->frase = Input::get('frase');

        if($lead->save()){
            if (Input::get('tipo') == 1) {
                return redirect('/concurso/assassins-creed-success');
            } else {
                return redirect('/concurso/darth-vader-success');
            }
        }

        if (Input::get('tipo') == 1) {
            return redirect('/concurso/assassins-creed');
        } else {
            return redirect('/concurso/darth-vader');
        }

    }


}
