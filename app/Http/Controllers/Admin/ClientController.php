<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
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
    public function getInstallments($id)
    {
        $data = $this->clientRepository->getCashInstallments($id);
        $newdata = $data[0];
        $paymentMethod = $data[1];
        return view('admin.client.installments', compact('newdata', 'paymentMethod', 'id'));
    }
    public function installmentUpdate($id)
    {
        $data = $this->clientRepository->updateInstallmentStatus($id);
        return redirect()->back()->with('success', 'Status Update Successfully.');
    }

    public function addNewCashInstallment(Request $data, $id)
    {
        $this->plotInstallmentRepository->addCustomCashInstallment($data, $id);
        return redirect()->back()->with('success','Record Added Successfully.');
    }
    public function addNewChequeInstallment(Request $data, $id)
    {
        $this->plotInstallmentRepository->addCustomChequeInstallment($data, $id);
        return redirect()->back()->with('success','Record Added Successfully.');
    }
}
