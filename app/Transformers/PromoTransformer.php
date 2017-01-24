<?php

namespace App\Transformers;

use App\Promo;
use League\Fractal\TransformerAbstract;

class PromoTransformer extends TransformerAbstract
{
    public function transform(Promo $promo)
    {
        return [
            'id' => $promo->id,
            'promo_id' => $promo->promo_id,
            'name' => $promo->name,
            'email' => $promo->email,
            'message' => $promo->message,
            'ip' => $promo->ip,
            'created_at' => $promo->created_at
        ];
    }
}
