<?php

namespace App\Http\Controllers\Api;

use App\Repositories\GuestRepository;
use App\Services\IP;
use Illuminate\Http\Request;

class GuestController extends ApiController
{
    protected $guest;

    public function __construct(GuestRepository $guest)
    {
        $this->guest = $guest;
    }
    public function store(Request $request)
    {
        $ip = new IP($request);

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'ip' => $ip->get()
        ];

        $this->guest->store($data);

        return $this->respondWithArray($data);
    }
}
