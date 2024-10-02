<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\SalesOfficer;

class ClientRepository
{
    protected $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }
    public function getSalesOfficers()
    {
        return SalesOfficer::all();
    }
}
