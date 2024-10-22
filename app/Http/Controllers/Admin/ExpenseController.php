<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use Illuminate\Http\Request;
use App\Repositories\ExpenseRepository;
class ExpenseController extends Controller
{
    protected $expenseRepository;
    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }
    public function index()
    {
        $data = $this->expenseRepository->all();
        return view("admin.expense.index" , compact('data'));
    }
    public function store(StoreExpenseRequest $request)
    {
        $this->expenseRepository->store($request->all());
        return redirect()->back()->with('success' , 'Record Created Successfully.');
    }
    public function delete($id)
    {
        $this->expenseRepository->delete($id);
        return redirect()->back()->with('success' , 'Record Deleted Successfully.');
    }
}
