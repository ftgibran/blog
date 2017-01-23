<?php

namespace App\Http\Controllers\Api;

use App\Repositories\GuestRepository;
use App\Repositories\PromoRepository;
use App\Services\IP;
use Illuminate\Http\Request;

class PromoController extends ApiController
{
    protected $guest;
    protected $promo;

    public function __construct(GuestRepository $guest, PromoRepository $promo)
    {
        $this->guest = $guest;
        $this->promo = $promo;
    }

    public function store(Request $request)
    {
        $ip = new IP($request);

        $data1 = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'ip' => $ip->get()
        ];

        $data2 = [
            'promo_id' => $request->get('promo_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
            'ip' => $ip->get()
        ];

        $this->guest->store($data1);
        $this->promo->store($data2);

        return $this->respondWithArray(['success']);
    }
}
