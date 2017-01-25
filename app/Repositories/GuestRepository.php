<?php

namespace App\Repositories;

use App\Guest;
use App\Scopes\StatusScope;

class GuestRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Guest $guest)
    {
        $this->model = $guest;
    }

    /**
     * Get the list of all the user without myself.
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->model
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Get the user by name.
     *
     * @param  string $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->model
            ->where('name', $name)
            ->first();
    }

    /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginate
     */
    public function page($number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        return $this->model->withoutGlobalScope(StatusScope::class)->orderBy($sortColumn, $sort)->paginate($number);
    }

    /**
     * Get the article record without draft scope.
     *
     * @param  int $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->withoutGlobalScope(StatusScope::class)->findOrFail($id);
    }

    /**
     * Count all data.
     *
     * @return Guest
     */
    public function count()
    {
        return $this->model->count();
    }

    /**
     * Store a new record.
     *
     * @param  $input
     * @return User
     */
    public function store($input)
    {
        $model = $this->model->where('email', $input['email'])->orWhere('ip', $input['ip'])->first();
        return $this->save($model, $input);
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
        if(!$model)
            $model = $this->model;

        $model->fill($input)->save();

        return $model;
    }

}
