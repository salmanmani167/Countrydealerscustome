<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficerRerquest;
use Illuminate\Http\Request;
use App\Repositories\SalesOfficerRepo;

class SalesOfficerController extends Controller
{
    protected $SalesOfficerRepo;
    public function __construct(SalesOfficerRepo $SalesOfficerRepo)
    {
        $this->SalesOfficerRepo = $SalesOfficerRepo;
    }
    public function index()
    {
        $data = $this->SalesOfficerRepo->all();
        return view("admin.salesOfficer.index" , compact("data"));
    }
    public function create()
    {
        return view("admin.salesOfficer.create");
    }
    public function store(OfficerRerquest $request)
    {
        $this->SalesOfficerRepo->store($request->all());
        return redirect()->back()->with("success","Record Created Successfully");
    }
    public function delete($id)
    {
        $this->SalesOfficerRepo->delete($id);
        return redirect()->back()->with("success","Record Deleted Successfully");
    }
}
