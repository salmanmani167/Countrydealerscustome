<?php

namespace App\Repositories;
use App\Models\Expense;
class ExpenseRepository
{
    protected $model;

    public function __construct(Expense $model)
    {
        $this->model = $model;
    }
    public function all()
    {
       return $this->model->all();
    }
    public function store($data)
    {
        if (isset($data['picture']) && $data['picture']->isValid()) {
            $data['picture'] = $data['picture']->store('expenseImages', 'public');
        }
        $this->model->create($data);
    }
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
