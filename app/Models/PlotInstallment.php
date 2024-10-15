<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotInstallment extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $casts = [     // Cast price to float
        'cheque_installment_amount' => 'integer', // Cast quantity to integer
        'installment_payment' => 'integer',
    ];
}
