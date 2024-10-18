<?php

namespace App\Repositories\purchase;

use App\Models\PurchasePlotOwner;
use Illuminate\Support\Facades\Validator;

class PurchasePlotOwners
{
    protected $model;

    public function __construct(PurchasePlotOwner $model)
    {
        $this->model = $model;
    }
    public function store($data , $clientId)
    {
        // $rules = [
        //     'other_owner_name' => 'required',
        //     'other_owner_email' => 'required|email',
        //     'other_owner_number' => 'required',
        //     'other_owner_father_or_husband_name' => 'required',
        // ];
        // $validator = Validator::make($data, $rules);
        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        for ($i = 0; $i < count($data['other_owner_name']); $i++) {
            $otherOwners = [
                "client_id" => $clientId,
                "other_owner_name" => $data['other_owner_name'][$i],
                "other_owner_email" => $data['other_owner_email'][$i],
                "other_owner_number" => $data['other_owner_number'][$i],
                "other_owner_father_or_husband_name" => $data['other_owner_father_or_husband_name'][$i],
            ];
            $this->model->create($otherOwners);
        }
    }
}
