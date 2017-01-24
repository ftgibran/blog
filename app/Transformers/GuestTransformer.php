<?php

namespace App\Transformers;

use App\Guest;
use League\Fractal\TransformerAbstract;

class GuestTransformer extends TransformerAbstract
{
    public function transform(Guest $guest)
    {
        return [
            'id' => $guest->id,
            'name' => $guest->name,
            'email' => $guest->email,
            'ip' => $guest->ip,
            'created_at' => $guest->created_at
        ];
    }
}
