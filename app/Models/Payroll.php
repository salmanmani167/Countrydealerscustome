<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'basic_salary',
        'fuel_adjustment',
        'bonus',
        'loan_deduction',
        'other_allowance',
        'net_salary',
        'bank_name',
        'status',
        'payment_date'
    ];

    // Relationship with Employee model
    public function employee()
    {
        return $this->belongsTo(AdminOfficeEmployee::class);
    }
}
