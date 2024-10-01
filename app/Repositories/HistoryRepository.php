<?php

namespace App\Repositories;

use App\Models\AdminOfficeEMployee;
use App\Models\History;

class HistoryRepository
{
    protected $model;

    public function __construct(History $model)
    {
        $this->model = $model;
    }
    public function store($id)
    {
        $employee = AdminOfficeEmployee::find($id);
        if ($employee) {
            $historyData = $employee->toArray();
            $historyData = collect($historyData)->except(['image', 'cnic_front_image' , 'cnic_back_image' , 'father_cnic_front_image' , 'father_cnic_back_image' , 'cv'])->toArray();
            $historyData['employee_id'] = $employee->id;
            History::create($historyData);
        }
    }

    public function find($id)
    {
        $history = History::where('employee_id', $id)->get();
        return $history;
    }
}
