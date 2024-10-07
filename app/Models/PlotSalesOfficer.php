<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotSalesOfficer extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function officer()
    {
        return $this->belongsTo(SalesOfficer::class , 'sales_officer_id');
    }
}
