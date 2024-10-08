<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Http\Request;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
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
        return view('admin.client.show' , compact('data'));
    }
    public function getInstallments($id)
    {
        $data = $this->clientRepository->getInstallments($id);
        return view('admin.client.installments' , compact('data'));
    }
    public function installmentUpdate($id)
    {
        $data = $this->clientRepository->updateInstallmentStatus($id);
        return redirect()->back()->with('success','Status Update Successfully.');
    }
}
