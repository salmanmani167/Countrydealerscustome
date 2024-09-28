<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminOfficeEMployee;
use App\Services\PayrollService;
// use Hashids\Hashids;
use Illuminate\Http\Request;
// use Hashids\Hashids;


class PayrollController extends Controller
{
    public function __construct(
        protected PayrollService $service
    ) {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $payrolls = $this->service->getAll($filters);
        return view('admin.Payroll.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = AdminOfficeEMployee::all();
        return view('admin.Payroll.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->service->store($request->all());
        $request->session()->flash('success_message', 'Success: User created successfully!');
        return redirect()->route('payrolls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payroll = $this->service->getOne($id); // Fetch the payroll data using the service
        $employees = AdminOfficeEMployee::all(); // Get all employees for the dropdown
        return view('admin.Payroll.edit', compact('payroll', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $input = $request->all();
        $this->service->update($input, $id);
        \Session::flash('success_message', 'Success: Template updated successfully!');
        return redirect()->route('payrolls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->destroy($id);
        \Session::flash('success_message', 'Success: User deleted successfully!');
        return redirect()->route('payrolls.index');
    }
}
