<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view("admin.client.index");
    }
    public function create()
    {
        return view("admin.client.create");
    }
}
