<?php

namespace App\Repositories;

use App\Models\AdminOfficeEMployee;
use App\Models\Payroll;

class PayrollRepository
{
    protected $model;

    public function __construct(Payroll $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return AdminOfficeEMployee::all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $employee = $this->find($id);
        if ($employee) {
            $employee->update($data);
            return $employee;
        }
        return null;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
