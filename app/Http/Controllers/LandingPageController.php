<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Repositories\GuestRepository;
use App\Repositories\PromoRepository;
use App\Services\IP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class LandingPageController extends Controller
{

    protected $guest;
    protected $promo;

    function __construct(GuestRepository $guest, PromoRepository $promo)
    {
        $this->guest = $guest;
        $this->promo = $promo;
    }


    public function create(Request $request) {

        $ip = new IP($request);

        $data1 = [
            'name' => Input::get('nome'),
            'email' => Input::get('email'),
            'ip' => $ip->get()
        ];

        $data2 = [
            'promo_id' => Input::get('tipo'),
            'name' => Input::get('nome'),
            'email' => Input::get('email'),
            'message' => Input::get('frase'),
            'ip' => $ip->get(),
        ];

        $this->guest->store($data1);

        if($this->promo->store($data2)){
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
