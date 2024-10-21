<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class , 'client_id');
    }
}
