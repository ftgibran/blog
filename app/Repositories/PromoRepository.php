<?php

namespace App\Repositories;

use App\Promo;
use App\Scopes\StatusScope;

class PromoRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Promo $promo)
    {
        $this->model = $promo;
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
        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
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

    public function getAC()
    {
        $this->model = $this->model->where('promo_id', 1);
        return $this;
    }

    public function getDV()
    {
        $this->model = $this->model->where('promo_id', 2);
        return $this;
    }

    public function countAC()
    {
        return $this->model->where('promo_id', 1)->count();
    }

    public function countDV()
    {
        return $this->model->where('promo_id', 2)->count();
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
