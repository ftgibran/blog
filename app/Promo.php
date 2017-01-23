<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'promo_id',
        'name',
        'email',
        'message',
        'ip'
    ];
}
