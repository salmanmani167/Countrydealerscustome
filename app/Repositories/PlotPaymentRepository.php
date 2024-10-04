<?php

namespace App\Repositories;


use App\Models\PlotPayment;

class PlotPaymentRepository
{
    protected $model;

    public function __construct(PlotPayment $model)
    {
        $this->model = $model;
    }
    public function store(array $data , $clinet_id)
    {
        $payment = [
            "client_id"=> $clinet_id,
            "payment_type"=> $data["payment_type"],
            "payment_method"=> $data["payment_method"],
        ];
        if($data["payment_method"] == "cash"){
            $payment["full_payment"] = $data["full_payment"];
        }else{
            $payment["check_amount"] = $data["check_amount"];
            $payment["due_date"] = $data["due_date"];
            if (isset($data['cheque_image']) && $data['cheque_image']->isValid()) {
                $payment['cheque_image'] = $data['cheque_image']->store('fullpayment/cheque', 'public');
            }
        }
        $this->model->create($payment);
    }
}
