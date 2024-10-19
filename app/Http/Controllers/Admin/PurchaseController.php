<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use Illuminate\Http\Request;
use App\Repositories\SalesOfficerRepo;
use App\Repositories\purchase\PurchaseRepository;
use App\Repositories\purchase\PurchasePlotInstallmentRepo;
use App\Repositories\ClientRepository;

class PurchaseController extends Controller
{
    protected $SalesOfficerRepo;
    protected $clientRepository;
    protected $PurchaseRepository;
    protected $PurchasePlotInstallmentRepo;
    public function __construct(SalesOfficerRepo $SalesOfficerRepo, PurchaseRepository $PurchaseRepository, PurchasePlotInstallmentRepo $PurchasePlotInstallmentRepo, ClientRepository $clientRepository)
    {
        $this->SalesOfficerRepo = $SalesOfficerRepo;
        $this->PurchaseRepository = $PurchaseRepository;
        $this->PurchasePlotInstallmentRepo = $PurchasePlotInstallmentRepo;
        $this->clientRepository = $clientRepository;
    }
    public function index()
    {
        $data = $this->PurchaseRepository->all();
        return view("admin.purchase.index", compact("data"));
    }

    public function create()
    {
        $oldPlots = $this->clientRepository->getOldPlots();
        // dd($oldPlots);
        $salesOfficers = $this->SalesOfficerRepo->all();
        return view("admin.purchase.create", data: compact('salesOfficers', 'oldPlots'));
    }
    public function show($id)
    {
        $data = $this->PurchaseRepository->show($id);
        return view('admin.purchase.show', compact('data'));
    }
    public function store(StorePurchaseRequest $request)
    {
        $this->PurchaseRepository->store($request->all());
        return redirect()->back()->with('success', 'Record Created Successfully.');
    }
    public function edit($id)
    {
        $data = $this->PurchaseRepository->show($id);
        return view('admin.purchase.edit', compact('data'));
    }

    public function update(UpdatePurchaseRequest $request, $id)
    {
        $this->PurchaseRepository->update($request->all(), $id);
        return redirect()->back()->with('success', 'Record Updated Successfully.');
    }
    public function delete($id)
    {
        $this->PurchaseRepository->delete($id);
        return redirect()->back()->with('success', 'Record Deleted Successfully.');
    }

    // purchase installments
    public function getInstallments($id)
    {
        $data = $this->PurchaseRepository->getCashInstallments($id);
        $chequeInstallments = $data[1];
        $cashInstallments = $data[0];
        return view('admin.purchase.installments', compact('id', 'chequeInstallments', 'cashInstallments'));
    }

    public function addNewCashInstallment(Request $data, $id)
    {
        $customCashInstallment = $this->PurchasePlotInstallmentRepo->addCustomCashInstallment($data, $id);
        if ($customCashInstallment == false) {
            return redirect()->back()->with('error', 'Installment Amount Is More Than Total Amount.');
        } else {
            return redirect()->back()->with('success', 'Record Added Successfully.');
        }
    }
    public function addNewChequeInstallment(Request $data, $id)
    {
        $customChequeInstallment = $this->PurchasePlotInstallmentRepo->addCustomChequeInstallment($data, $id);
        if ($customChequeInstallment == false) {
            return redirect()->back()->with('error', 'Installment Amount Is More Than Total Amount.');
        } else {
            return redirect()->back()->with('success', 'Record Added Successfully.');
        }
    }
    public function installmentUpdate($id)
    {
        $data = $this->PurchasePlotInstallmentRepo->updateInstallmentStatus($id);
        return redirect()->back()->with('success', 'Status Update Successfully.');
    }

    public function print($client_id, $installment_id)
    {
        $data = $this->PurchaseRepository->show($client_id);
        $newInstallment = $this->PurchasePlotInstallmentRepo->find($installment_id);
        return view('admin.client.print', compact('data', 'newInstallment'));
    }
    public function getOldClient($client_id)
    {
        $data = $this->clientRepository->find($client_id);
        return response()->json(['data'=> $data]);
    }
}
