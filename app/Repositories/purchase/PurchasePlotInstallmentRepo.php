<?php

namespace App\Repositories\purchase;


use App\Models\ClientNotification;
use App\Models\Purchase;
use App\Models\PurchaseNotification;
use App\Models\PurchasePlotInstallments;

class PurchasePlotInstallmentRepo
{
    protected $model;

    public function __construct(PurchasePlotInstallments $model)
    {
        $this->model = $model;
    }
    public function find(int $id)
    {
        return $this->model->find($id);
    }
    public function store(array $data, $client_id)
    {
        if ($data["payment_method"] != "cash") {
            // Iterate over the installment arrays
            for ($i = 0; $i < count($data['cheque_installment_amount']); $i++) {
                // Handle the image upload for each installment
                if (isset($data['cheque_image'][$i]) && $data['cheque_image'][$i]->isValid()) {
                    // Store the image and get the file path
                    $imagePath = $data['cheque_image'][$i]->store('cheque_images', 'public');
                } else {
                    $imagePath = null; // Handle case where no image is provided
                }

                // Create an array for each installment's data
                $installmentPayment = [
                    "client_id" => $client_id,
                    "payment_type" => $data["payment_type"],
                    "payment_method" => $data["payment_method"],

                    // Accessing installment amount, due date, and stored image path
                    "cheque_installment_amount" => $data['cheque_installment_amount'][$i],
                    "cheque_installment_due_date" => $data['cheque_installment_due_date'][$i],
                    "cheque_image" => $imagePath, // Store the image path in the database
                ];

                // Save each installment as a new record in the database
                $this->model->create($installmentPayment);
            }
        } else {
            for ($i = 0; $i < count($data['installment_payment']); $i++) {
                // Create an array for each cash installment's data
                $installmentPayment = [
                    "client_id" => $client_id,
                    "payment_type" => $data["payment_type"],
                    "payment_method" => $data["payment_method"],

                    // Accessing cash installment amount and due date
                    "installment_payment" => $data['installment_payment'][$i],
                    "payment_installment_due_date" => $data['payment_installment_due_date'][$i],
                ];

                // Save each cash installment as a new record in the database
                $this->model->create($installmentPayment);
            }
        }
    }
    public function getCashInstallments($client_id)
    {
        $cashInstallments = $this->model->where('client_id', $client_id)->where('payment_method', '=', 'cash')->get();
        $chequeInstallments = $this->model->where('client_id', $client_id)->where('payment_method', '=', 'cheque')->get();
        return [$cashInstallments, $chequeInstallments];
    }
    public function updateInstallmentStatus($paymentId)
    {
        $payment = $this->find($paymentId);
        $payment->status = 'PAID';
        $payment->save();
        // to delete the notification from the `purchase_notifications` table

        PurchaseNotification::where('purchase_notification_id' , $paymentId)->delete();
    }

    public function checkBalanceForInstallments($data, $id, $paymentField)
    {
        $installmentData = $data->all();
        $client = Purchase::find($id);
        $totalInstallments = $this->model::where('client_id', $id)
            ->selectRaw('COALESCE(SUM(cheque_installment_amount), 0) as cheque_sum, COALESCE(SUM(installment_payment), 0) as installment_sum')
            ->first();
        $finalTotal = $totalInstallments->cheque_sum + $totalInstallments->installment_sum;
        $remainingBalance = $client->plot_sale_price - ($client->adjustment_price + $client->advance_payment + $finalTotal);
        // dd((int) $remainingBalance);
        if ((int) $installmentData[$paymentField] > (int) $remainingBalance) {
            return false;
        } else {
            return true;
        }
        if ((int) $finalTotal > (int) $remainingBalance) {
            return false;
        } else {
            return true;
        }
    }
    public function addCustomCashInstallment($data, $id)
    {
        $data->validate([
            'installment_payment' => 'required',
            'payment_installment_due_date' => 'required',
        ]);
        $checkBalance = $this->checkBalanceForInstallments($data, $id, 'installment_payment');
        if ($checkBalance == false) {
            return false;
        }
        $new = $this->model;
        $new->client_id = $id;
        $new->payment_type = 'no';
        $new->payment_method = 'cash';
        $new->installment_payment = $data['installment_payment'];
        $new->payment_installment_due_date = $data['payment_installment_due_date'];
        $new->save();
        return true;
    }
    public function addCustomChequeInstallment($data, $id)
    {
        $data->validate([
            'cheque_installment_amount' => 'required|string|max:255',
            'cheque_image' => 'required|image',
            'cheque_installment_due_date' => 'required',
        ]);
        $checkBalance = $this->checkBalanceForInstallments($data, $id, 'cheque_installment_amount');
        if ($checkBalance == false) {
            return false;
        }
        $new = $this->model;
        $new->client_id = $id;
        $new->payment_type = 'no';
        $new->payment_method = 'cheque';
        if (isset($data['cheque_image']) && $data['cheque_image']->isValid()) {
            // Store the image and get the file path
            $imagePath = $data['cheque_image']->store('cheque_images', 'public');
        }
        $new->cheque_image = $imagePath;
        $new->cheque_installment_amount = $data['cheque_installment_amount'];
        $new->cheque_installment_due_date = $data['cheque_installment_due_date'];
        $new->save();
        return true;
    }
}
