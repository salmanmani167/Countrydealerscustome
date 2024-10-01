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
}
