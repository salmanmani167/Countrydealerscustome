<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public $model;

    /**
     * @param $filters
     * @param $paginated
     * @return mixed
     */
    public function getAll($filters = [], $paginated = true)
    {
        return ($paginated ? $this->model->paginate(Config('constants.PAGINATION_LIMIT')) : $this->model->all());
    }

    /**
     * @param  array  $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        // dd($attributes);
        return $this->model->create($attributes);
    }

    /**
     * @param  array  $data
     * @param $model
     * @return void
     */
    // public function update(array $data, $model): bool
    // {
    //     return $model->update($data);
    // }


    /**
     * @param $value
     * @param string $column
     * @param array $filters
     * @param array $with
     * @param string $select
     * @param array $whereIn
     * @return mixed
     */
    public function getOne($value, $column = 'id', $filters = [], $with = [], $select = '*', $whereIn = [])
    {

        $model = $this->model->where($column, $value);
        foreach ($filters as $col => $val) {
            $model = $model->where($col, $val);
        }

        // WhereIn filters
        foreach ($whereIn as $col => $val) {
            $model = $model->whereIn($col, $val);
        }

        // get specific
        $model = $model->with($with)
            ->select($select)
            ->first();
        return $model;
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
    public function update($params, $value, $column = 'id', $filters = []) {
        $model = $this->model->where($column, $value);
        foreach ($filters as $col => $val) {
            $model = $model->where($col, $val);
        }
        return $model->update($params);
    }
}
