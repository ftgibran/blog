<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Repositories\GuestRepository;
use App\Services\IP;
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

        $ip = new IP($request);

        $data = [
            'name' => Input::get('nome'),
            'email' => Input::get('email'),
            'ip' => $ip->get()
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
