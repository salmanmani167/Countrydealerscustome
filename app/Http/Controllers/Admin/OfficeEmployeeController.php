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

    public function show($id)
    {
        $data = AdminOfficeEMployee::find($id);
        return view("admin.officeEmployee.show", data: compact(var_name: 'data'));
    }
    public function edit($id)
    {
        $data = AdminOfficeEMployee::find($id);
        return view("admin.officeEmployee.edit", data: compact(var_name: 'data'));
    }
    public function update(AddOfficeEmployeeRequest $request , $id)
    {
        $employee = AdminOfficeEMployee::find($id);
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
        $employee->update($data);
        return redirect()->back()->with('success', 'Record Updated Successfully.');
    }

    public function delete($id)
    {
        $employee = AdminOfficeEMployee::find($id);
        $employee->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully.');
    }

}
