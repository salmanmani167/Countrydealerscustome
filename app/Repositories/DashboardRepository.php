<?php

namespace App\Repositories;
use App\Models\Client;
use App\Models\Expense;
use App\Models\Purchase;
class DashboardRepository
{
    public function totalSales()
    {
        return Client::all()->count();
    }
    public function expenses()
    {
        return Expense::all()->count();
    }
    public function purchases()
    {
        return Purchase::all()->count();
    }
}
