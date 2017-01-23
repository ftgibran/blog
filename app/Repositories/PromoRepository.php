<?php

namespace App\Repositories;

use App\Promo;

class PromoRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Promo $promo)
    {
        $this->model = $promo;
    }

    /**
     * Store a new record.
     *
     * @param  $input
     * @return Promo
     */
    public function store($input)
    {
        return $this->save($this->model, $input);
    }

    /**
     * Save the input's data.
     *
     * @param  $model
     * @param  $input
     * @return User
     */
    public function save($model, $input)
    {
        $model = $model->firstOrNew([
            'promo_id' => $input['promo_id'],
            'email' => $input['email']
        ]);

        $model->fill($input)->save();

        return $model;
    }

}
