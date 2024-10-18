<?php

namespace App\Repositories\purchase;

use App\Models\Purchase;
use App\Repositories\purchase\FullPurchaseRepository;
use App\Repositories\purchase\PurchasePlotInstallmentRepo;
use App\Repositories\purchase\PurchasePlotOwners;
use App\Repositories\purchase\PurchasePlotSalesOfficerRepo;
class PurchaseRepository
{
    protected $model;
    protected $fullPurchaseRepository;
    protected $PurchasePlotInstallmentRepo;
    protected $PurchasePlotOwners;
    protected $PurchasePlotSalesOfficerRepo;
    public function __construct(
        Purchase $model,
        FullPurchaseRepository $fullPurchaseRepository,
        PurchasePlotInstallmentRepo $PurchasePlotInstallmentRepo,
        PurchasePlotSalesOfficerRepo $PurchasePlotSalesOfficerRepo,
        PurchasePlotOwners $PurchasePlotOwners,
    ) {
        $this->model = $model;
        $this->fullPurchaseRepository = $fullPurchaseRepository;
        $this->PurchasePlotInstallmentRepo = $PurchasePlotInstallmentRepo;
        $this->PurchasePlotSalesOfficerRepo = $PurchasePlotSalesOfficerRepo;
        $this->PurchasePlotOwners = $PurchasePlotOwners;
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function all()
    {
        return $this->model->all();
    }
    public function store($data)
    {
        // dd($data);
        $client = [
            "email" => $data["email"],
            "name" => $data["name"],
            "cnic" => $data["cnic"],
            "number" => $data["number"],
            "father_or_husband_name" => $data["father_or_husband_name"],
            "paid_by" => $data["paid_by"],
            "plot_number" => $data["plot_number"],
            "location" => $data["location"],
            "plot_price" => $data["plot_price"],
            "plot_demand" => $data["plot_demand"],
            "plot_sale_price" => $data["plot_sale_price"],
            "client_type" => $data["client_type"],
            "sale_type" => $data["sale_type"],
            "agreement" => $data["agreement"],
            "vehicles_adjustment" => $data["vehicles_adjustment"],
            "adjustment_price" => $data["adjustment_price"],
            "advance_payment" => $data["advance_payment"],
            "plot_size" => $data["plot_size"],
        ];
        if (isset($data['adjustment_product']) && $data['adjustment_product']->isValid()) {
            $client['adjustment_product'] = $data['adjustment_product']->store('adjustmentproducts', 'public');
        }
        $client = $this->model->create($client);
        $clientId = $client->id;
        // if payment is full
        // if ($data['payment_type'] == 'yes') {
        //     $this->fullPurchaseRepository->store($data, $clientId);
        //     // if payment is in installments
        // } else {
        //     $this->PurchasePlotInstallmentRepo->store($data, $clientId);
        // }
        if (!empty($data['sales_officer_id'])) {
            $this->PurchasePlotSalesOfficerRepo->store($data, $clientId);
        }
        if (!empty($data['other_owner_name'])) {
            $this->PurchasePlotOwners->store($data, $clientId);
        }
    }
    public function show($Id)
    {
        return $this->model->with(['installments', 'owners', 'payments', 'saleOfficers.officer'])->where('id', $Id)->first();
    }
    public function update($data , $Id)
    {
        $record = $this->model->find( $Id);
        if (isset($data['adjustment_product']) && $data['adjustment_product']->isValid()) {
            $data['adjustment_product'] = $data['adjustment_product']->store('adjustmentproducts', 'public');
        }
        $record->update($data);
    }
    public function delete($Id)
    {
        $this->model->find( $Id)->delete();
    }
    public function getCashInstallments($id)
    {
        return $this->PurchasePlotInstallmentRepo->getCashInstallments($id);
    }
}
