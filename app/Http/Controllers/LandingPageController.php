<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Repositories\GuestRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LandingPageController extends Controller
{

    protected $guest;

    function __construct(GuestRepository $guest)
    {

        $this->guest = $guest;

    }


    public function create(Request $request) {


        $data = [
            'name' => Input::get('nome'),
            'email' => Input::get('email'),
            'ip' => $request->ip()
        ];


        if($this->guest->store($data)){
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
