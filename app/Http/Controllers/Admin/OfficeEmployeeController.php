<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficeEmployeeController extends Controller
{
    public function index()
    {
        return view("admin.officeEmployee.index");
    }
    public function create()
    {
        return view("admin.officeEmployee.create");
    }
    public function store(Request $request)
    {

    }
}
