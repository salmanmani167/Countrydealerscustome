<?php

namespace App\Repositories;

use App\Models\PlotSalesOfficer;
use Illuminate\Support\Facades\Validator;

class PlotSalesOfficersCommissionRepo
{
    protected $model;

    public function __construct(PlotSalesOfficer $model)
    {
        $this->model = $model;
    }
    public function store(array $data, $clientId)
    {
        $rules = [
            'sales_officer_id' => 'required',
            'commission_type' => 'required',
            'commission_amount' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()
                ->route("client.create")
                ->withErrors($validator)
                ->withInput();
        }
        for ($i = 0; $i < count($data['sales_officer_id']); $i++) {
            $salesOfficers = [
                "client_id" => $clientId,
                "sales_officer_id" => $data['sales_officer_id'][$i],
                "commission_type" => $data['commission_type'][$i],
                "commission_amount" => $data['commission_amount'][$i],
            ];
            $this->model->create($salesOfficers);
        }
    }
}
