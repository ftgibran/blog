<?php

namespace App\Http\Controllers\Api;

use App\Repositories\GuestRepository;
use App\Services\IP;
use App\Transformers\GuestTransformer;
use Illuminate\Http\Request;

class GuestController extends ApiController
{
    protected $guest;

    public function __construct(GuestRepository $guest)
    {
        parent::__construct();
        $this->guest = $guest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithPaginator($this->guest->page(), new GuestTransformer);
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

    public function count()
    {
        $count = $this->guest->count();
        return $this->respondWithArray(['count' => $count]);
    }

}
