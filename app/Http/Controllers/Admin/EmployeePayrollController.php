<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PayrollRepository;

class EmployeePayrollController extends Controller
{
    protected $payrollRepository;
    public function __construct(PayrollRepository $payrollRepository)
    {
        $this->payrollRepository = $payrollRepository;
    }
    public function index()
    {
        $data = $this->payrollRepository->all();
        return view("admin.payrolls.index", compact("data"));
    }
}
