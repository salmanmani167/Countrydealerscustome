<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePlotInstallments extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function purchase()
    {
        return $this->belongsTo(Purchase::class , 'client_id');
    }
}
