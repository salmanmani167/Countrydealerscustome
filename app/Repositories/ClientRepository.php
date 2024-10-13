<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\SalesOfficer;
use App\Repositories\PlotPaymentRepository;
use App\Repositories\PlotInstallmentRepo;
use App\Repositories\PlotSalesOfficersCommissionRepo;
use App\Repositories\OtherOwnersRepo;
class ClientRepository
{
    protected $model;
    protected $plotRepository;
    protected $plotInstallmentRepository;
    protected $PlotSalesOfficersCommissionRepo;
    protected $otherOwnersRepo;
    public function __construct(
        Client $model,
        PlotPaymentRepository $plotRepository,
        PlotInstallmentRepo $plotInstallmentRepository,
        PlotSalesOfficersCommissionRepo $PlotSalesOfficersCommissionRepo,
        OtherOwnersRepo $otherOwnersRepo,
    ) {
        $this->model = $model;
        $this->plotRepository = $plotRepository;
        $this->plotInstallmentRepository = $plotInstallmentRepository;
        $this->PlotSalesOfficersCommissionRepo = $PlotSalesOfficersCommissionRepo;
        $this->otherOwnersRepo = $otherOwnersRepo;
    }
    public function getSalesOfficers()
    {
        return SalesOfficer::all();
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
        if ($data['payment_type'] == 'yes') {
            $this->plotRepository->store($data, $clientId);
            // if payment is in installments
        } else {
            $this->plotInstallmentRepository->store($data, $clientId);
        }
        if (!empty($data['sales_officer_id'])) {
            $this->PlotSalesOfficersCommissionRepo->store($data, $clientId);
        }
        if (!empty($data['other_owner_name'])) {
            $this->otherOwnersRepo->store($data, $clientId);
        }
    }
    public function show($Id)
    {
        return $this->model->with(['installments', 'owners', 'payments', 'saleOfficers.officer'])->where('id', $Id)->first();
    }
    public function update($data , $Id)
    {
        $record = $this->model->find( $Id);
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
            "vehicles_adjustment" => $data["vehicles_adjustment"],
            "adjustment_price" => $data["adjustment_price"],
            "advance_payment" => $data["advance_payment"],
            "plot_size" => $data["plot_size"],
        ];
        if (isset($data['adjustment_product']) && $data['adjustment_product']->isValid()) {
            $client['adjustment_product'] = $data['adjustment_product']->store('adjustmentproducts', 'public');
        }
        $record->update($client);
    }
    public function delete($id)
    {
        $this->find($id)->delete();
    }
    public function getCashInstallments($id)
    {
        return $this->plotInstallmentRepository->getCashInstallments($id);
    }
    public function updateInstallmentStatus($id)
    {
        return $this->plotInstallmentRepository->updateInstallmentStatus($id);
    }
}
