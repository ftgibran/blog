<?php

namespace App\Repositories;

use App\Guest;

class GuestRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Guest $guest)
    {
        $this->model = $guest;
    }

    /**
     * Store a new record.
     *
     * @param  $input
     * @return User
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
        $model = $model->firstOrNew(['email' => $input['email']]);

        $model->fill($input)->save();

        return $model;
    }

}
