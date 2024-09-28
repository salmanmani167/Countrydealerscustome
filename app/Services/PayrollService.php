<?php

namespace App\Services;

use App\Models\Payroll;
use App\Repositories\PayrollRepository;
use Illuminate\Support\Arr;

class PayrollService
{

    /**
     * @param UsersRepository $repository
     */
    public function __construct(
        protected  PayrollRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param array $filters
     * @param bool $pagination
     * @return mixed
     */
    public function getAll(array $filters = [], bool $pagination = true)
    {
        return $this->repository->getAll($filters, $pagination);
    }

    /**
     * @param array $modelValues
     * @return void
     */
    public function store(array $modelValues = [])
    {
        // Ensure any necessary transformations are done
        $modelValues['fuel_adjustment'] = $modelValues['fuel_adjustment'] ?? 0;
        $modelValues['bonus'] = $modelValues['bonus'] ?? 0;
        $modelValues['loan_deduction'] = $modelValues['loan_deduction'] ?? 0;
        $modelValues['other_allowance'] = $modelValues['other_allowance'] ?? 0;
        $modelValues['net_salary'] = $modelValues['net_salary'] ?? 0;

        // Create a new payroll entry in the database
        $payroll = $this->repository->store($modelValues);
        return $payroll;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $modelValues
     * @param  int $id
     * @return bool
     */
    public function update(array $modelValues, string $id)
    {
        // Find the existing payroll record by ID
        $payroll = Payroll::findOrFail($id); // Assuming you are using the Payroll model

        // Ensure any necessary transformations are done
        $payroll->fuel_adjustment = $modelValues['fuel_adjustment'] ?? 0;
        $payroll->bonus = $modelValues['bonus'] ?? 0;
        $payroll->loan_deduction = $modelValues['loan_deduction'] ?? 0;
        $payroll->other_allowance = $modelValues['other_allowance'] ?? 0;
        $payroll->net_salary = $modelValues['net_salary'] ?? 0;

        // You can also update other fields if necessary
        $payroll->employee_id = $modelValues['employee_id'];
        $payroll->basic_salary = $modelValues['basic_salary'];
        $payroll->status = $modelValues['status'];
        $payroll->payment_date = $modelValues['payment_date'];

        // Save the updated payroll record to the database
        $payroll->save();

        return $payroll;
    }



    /**
     * @param $value
     * @param string $column
     * @param array $filters
     * @param array $with
     * @param string $select
     * @return mixed
     */
    public function getOne($value, $column = 'id', $filters = [], $with = [], $select = '*')
    {
        // get specific
        return $this->repository->getOne($value, $column, $filters, $with, $select);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
