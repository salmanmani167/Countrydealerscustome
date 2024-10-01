<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HistoryRepository;

class PayrollHistoryControlelr extends Controller
{
    protected $historyRepository;
    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }
    public function store($id)
    {
        $this->historyRepository->store($id);
        return redirect()->back()->with("success","Salary has been paid.");
    }
    public function history($id)
    {
        $history = $this->historyRepository->find($id);
        dd($history);
    }
}
