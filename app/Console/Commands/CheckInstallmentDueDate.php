<?php

namespace App\Console\Commands;

use App\Models\ClientNotification;
use App\Models\PlotInstallment;
use App\Models\PurchaseNotification;
use App\Models\PurchasePlotInstallments;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Notification;

class CheckInstallmentDueDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-installment-due-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow();
        $purchaseAlerts = PurchasePlotInstallments::where(function ($query) use ($tomorrow) {
            $query->where('payment_installment_due_date', $tomorrow)
                ->orWhere('cheque_installment_due_date', $tomorrow);
        })
            ->where('status', null)
            ->select('id' , 'client_id')
            ->get();
        if (!empty($purchaseAlerts)) {
            foreach ($purchaseAlerts as $alert) {
                PurchaseNotification::firstOrCreate([
                    'purchase_notification_id' => $alert->id,
                    'client_id' => $alert->client_id,
                    'is_marked' => false,
                ]);
            }
        }

        $plotAlerts = PlotInstallment::where(function ($query) use ($tomorrow) {
            $query->where('payment_installment_due_date', $tomorrow)
                ->orWhere('cheque_installment_due_date', $tomorrow);
        })
            ->where('status', null)
            ->select('id' , 'client_id')
            ->get();
        if (!empty($plotAlerts)) {
            foreach ($plotAlerts as $alert) {
                ClientNotification::firstOrCreate(
                    [
                        'client_notification_id' => $alert->id,
                        'client_id' => $alert->client_id,
                        'is_marked' => false
                        ]
                );
            }
        }
    }
}
