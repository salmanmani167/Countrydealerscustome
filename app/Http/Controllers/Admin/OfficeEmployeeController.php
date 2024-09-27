<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddOfficeEmployeeRequest;
use App\Models\AdminOfficeEMployee;
use Illuminate\Http\Request;

class OfficeEmployeeController extends Controller
{
    public function index()
    {
        $data = AdminOfficeEMployee::all();
        return view("admin.officeEmployee.index" , compact("data"));
    }
    public function create()
    {
        return view("admin.officeEmployee.create");
    }
    public function store(AddOfficeEmployeeRequest $request)
    {
        $data = $request->all();

        $fileFields = [
            'image',
            'cnic_front_image',
            'cnic_back_image',
            'father_cnic_front_image',
            'father_cnic_back_image',
            'cv'
        ];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('employeeimage', 'public');
            }
        }
        AdminOfficeEMployee::create($data);
        return redirect()->back()->with('success', 'Record Created Successfully.');
    }

}
