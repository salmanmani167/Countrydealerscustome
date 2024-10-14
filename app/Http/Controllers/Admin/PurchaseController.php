<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use Illuminate\Http\Request;
use App\Repositories\SalesOfficerRepo;
use App\Repositories\purchase\PurchaseRepository;

class PurchaseController extends Controller
{
    protected $SalesOfficerRepo;
    protected $PurchaseRepository;
    public function __construct(SalesOfficerRepo $SalesOfficerRepo , PurchaseRepository $PurchaseRepository)
    {
        $this->SalesOfficerRepo = $SalesOfficerRepo;
        $this->PurchaseRepository = $PurchaseRepository;
    }
    public function index()
    {
        return view("admin.purchase.index");
    }

    public function create()
    {
        $salesOfficers = $this->SalesOfficerRepo->all();
        return view("admin.purchase.create" , compact('salesOfficers'));
    }

    public function store(StorePurchaseRequest $request)
    {
        $this->PurchaseRepository->store($request->all());
        return redirect()->back()->with('success','Record Created Successfully.');
    }
}
