<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ExpenseChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(ExpenseChart $expenseChart)
    {
        return view("admin.dashboard" , ['expenseChart' => $expenseChart->build()]);
    }
    public function dashboard()
    {
        return view("admin.dashboard");
    }
}
