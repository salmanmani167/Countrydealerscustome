<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseNotification extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;
    public function purchase()
    {
        return $this->belongsTo(Purchase::class , 'client_id');
    }
}
