<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function installments()
    {
        return $this->hasMany(PlotInstallment::class);
    }
    public function owners()
    {
        return $this->hasMany(PlotOwner::class);
    }
    public function payments()
    {
        return $this->hasMany(PlotPayment::class);
    }
    public function saleOfficers()
    {
        return $this->hasMany(PlotSalesOfficer::class);
    }
}
