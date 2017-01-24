<?php

namespace App;

use App\Scopes\StatusScope;
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
        'ip',
        'created_at'
    ];

    /**
     * Get the created at attribute.
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }
}
