<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view("admin.client.index");
    }
    public function create()
    {
        $salesOfficers = $this->clientRepository->getSalesOfficers();
        return view("admin.client.create" , compact("salesOfficers"));
    }
}
