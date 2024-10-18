<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function installments()
    {
        return $this->hasMany(PurchasePlotInstallments::class , 'client_id');
    }
    public function owners()
    {
        return $this->hasMany(PurchasePlotOwner::class , 'client_id');
    }
    public function payments()
    {
        return $this->hasMany(PurchasePlotPayment::class , 'client_id');
    }
    public function saleOfficers()
    {
        return $this->hasMany(PurchasePlotSalesOfficer::class , 'client_id');
    }
}
