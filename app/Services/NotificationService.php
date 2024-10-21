<?php


namespace App\Services;
use App\Models\ClientNotification;
use App\Models\PurchaseNotification;
class NotificationService
{
    public static function clientNotifications()
    {
        $clientNotifications = ClientNotification::where('is_marked' , false)
        ->with('client')
        ->get();
        return $clientNotifications;
    }
    public static function purchaseNotifications()
    {
        $purchaseNotifications = PurchaseNotification::where('is_marked' , false)
        ->with('purchase')
        ->get();
        return $purchaseNotifications;
    }

    public static function totalNotifications()
    {
        $clientNotifications = ClientNotification::where('is_marked' , false)->count();
        $purchaseNotifications = PurchaseNotification::where('is_marked' , false)->count();
        return $clientNotifications + $purchaseNotifications;
    }
}
