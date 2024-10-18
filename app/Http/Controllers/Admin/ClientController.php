<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use App\Repositories\PlotInstallmentRepo;

class ClientController extends Controller
{
    protected $clientRepository;
    protected $plotInstallmentRepository;

    public function __construct(
        ClientRepository $clientRepository,
        PlotInstallmentRepo $plotInstallmentRepository
    ) {
        $this->clientRepository = $clientRepository;
        $this->plotInstallmentRepository = $plotInstallmentRepository;
    }
    public function index()
    {
        $data = $this->clientRepository->all();
        return view("admin.client.index", compact("data"));
    }
    public function create()
    {
        $salesOfficers = $this->clientRepository->getSalesOfficers();
        return view("admin.client.create", compact("salesOfficers"));
    }
    public function store(StoreClientRequest $request)
    {
        $this->clientRepository->store($request->all());
        return redirect()->back()->with("success", "Record Created Successfully.");
    }
    public function show($id)
    {
        $data = $this->clientRepository->show($id);
        return view('admin.client.show', compact('data'));
    }
    public function edit($id)
    {
        $data = $this->clientRepository->show($id);
        return view('admin.purchase.edit', compact('data'));
    }
    public function update(UpdateClientRequest $request, $id)
    {
        $this->clientRepository->update($request->all(), $id);
        return redirect()->back()->with('success', 'Record Updated Successfully.');
    }
    public function delete($id)
    {
        $this->clientRepository->delete($id);
        return redirect('admin/client')->with('success', 'Record Deleted Successfully.');
    }
    public function getInstallments($id)
    {
        $data = $this->clientRepository->getCashInstallments($id);
        $chequeInstallments = $data[1];
        $cashInstallments = $data[0];
        return view('admin.client.installments', compact('id', 'chequeInstallments', 'cashInstallments'));
    }
    public function installmentUpdate($id)
    {
        $data = $this->clientRepository->updateInstallmentStatus($id);
        return redirect()->back()->with('success', 'Status Update Successfully.');
    }

    public function addNewCashInstallment(Request $data, $id)
    {
        $customCashInstallment = $this->plotInstallmentRepository->addCustomCashInstallment($data, $id);
        if ($customCashInstallment == false) {
            return redirect()->back()->with('error', 'Installment Amount Is More Than Total Amount.');
        } else {
            return redirect()->back()->with('success', 'Record Added Successfully.');
        }
    }
    public function addNewChequeInstallment(Request $data, $id)
    {
        $customChequeInstallment = $this->plotInstallmentRepository->addCustomChequeInstallment($data, $id);
        if ($customChequeInstallment == false) {
            return redirect()->back()->with('error', 'Installment Amount Is More Than Total Amount.');
        } else {
            return redirect()->back()->with('success', 'Record Added Successfully.');
        }
    }

    public function print($client_id, $installment_id)
    {
        $data = $this->clientRepository->show($client_id);
        $newInstallment = $this->plotInstallmentRepository->find($installment_id);
        return view('admin.client.print', compact('data', 'newInstallment'));
    }
}
