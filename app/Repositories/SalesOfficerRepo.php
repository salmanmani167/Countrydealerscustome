<?php

namespace App\Repositories;

use App\Models\SalesOfficer;

class SalesOfficerRepo
{
    protected $model;

    public function __construct(SalesOfficer $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return SalesOfficer::all();
    }
    public function store($data)
    {
        return SalesOfficer::create($data);
    }
    public function delete($id)
    {
        return SalesOfficer::find($id)->delete();
    }
}
