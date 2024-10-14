<?php

namespace App\Repositories\purchase;


use App\Models\PurchasePlotInstallments;

class PurchasePlotInstallmentRepo
{
    protected $model;

    public function __construct(PurchasePlotInstallments $model)
    {
        $this->model = $model;
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
}
