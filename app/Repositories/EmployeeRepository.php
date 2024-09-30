<?php

namespace App\Repositories;

use App\Models\AdminOfficeEMployee;

class EmployeeRepository
{
    protected $model;

    public function __construct(AdminOfficeEMployee $model)
    {
        $this->model = $model;
    }
    public function handleFileUploads(array $data)
    {
        $fileFields = [
            'image',
            'cnic_front_image',
            'cnic_back_image',
            'father_cnic_front_image',
            'father_cnic_back_image',
            'cv'
        ];
        foreach ($fileFields as $field) {
            if (isset($data[$field]) && $data[$field]->isValid()) {
                $data[$field] = $data[$field]->store('employeeimage', 'public');
            }
        }
        return $data;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        $data = $this->handleFileUploads($data);
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $employee = $this->find($id);
        if ($employee) {
            $data = $this->handleFileUploads($data);
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
