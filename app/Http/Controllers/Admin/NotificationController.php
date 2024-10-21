<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientNotification;
use App\Models\Purchase;
use App\Models\PurchaseNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
   public function markAsRead($notificationId , $model)
   {
    if($model == 'client')
    {
        ClientNotification::find($notificationId)->delete();
    }
    else{
        PurchaseNotification::find($notificationId)->delete();
    }
    return response()->json(['success']);
   }
}
