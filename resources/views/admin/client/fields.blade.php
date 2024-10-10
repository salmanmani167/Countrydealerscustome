<div class="row">
    <div class="col-md-12 my-2">
        <h5 class="">Personal Info</h5>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="{{ $data['name'] ?? '' }}"
                    placeholder="Name Here">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="{{ $data['email'] ?? '' }}"
                    placeholder="Email Here">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">CNIC</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="cnic" value="{{ $data['cnic'] ?? '' }}"
                    placeholder="CNIC Here">
                @error('cnic')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Number</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="number" value="{{ $data['number'] ?? '' }}"
                    placeholder="Number Here">
                @error('number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Fatehr/Husband Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="father_or_husband_name"
                    value="{{ $data['father_or_husband_name'] ?? '' }}" placeholder="Father/Husband Name Here">
                @error('father_or_husband_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-12 my-2">
        <h5 class="">Property Info</h5>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Client Type</label>
            <div class="col-sm-9">
                <select class="form-control" name="client_type">
                    <option disabled selected>-- select an option --</option>
                    @foreach (config('vars.client_type') as $clientType)
                        <option value="{{ $clientType }}" @if (!empty($data->clientType) && $data->clientType == $clientType) selected @endif>
                            {{ $clientType }}
                        </option>
                    @endforeach
                </select>
                @error('client_type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Sale Type</label>
            <div class="col-sm-9">
                <select class="form-control" name="sale_type">
                    <option disabled selected>-- select an option --</option>
                    @foreach (config('vars.sale_type') as $saleType)
                        <option value="{{ $saleType }}" @if (!empty($data->saleType) && $data->saleType == $saleType) selected @endif>
                            {{ $saleType }}
                        </option>
                    @endforeach
                </select>
                @error('client_type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Paid By</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="paid_by" value="{{ $data['paid_by'] ?? '' }}"
                    placeholder="Paid by">
                @error('paid_by')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Plot #</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="plot_number" value="{{ $data['plot_number'] ?? '' }}"
                    placeholder="Plot Number">
                @error('plot_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Plot Size</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="plot_size" value="{{ $data['plot_size'] ?? '' }}"
                    placeholder="Plot Size">
                @error('plot_size')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Location</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="location" value="{{ $data['location'] ?? '' }}"
                    placeholder="location here">
                @error('location')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Plot Price</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="plot_price" value="{{ $data['plot_price'] ?? '' }}"
                    placeholder="Plot price">
                @error('plot_price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Plot Demand</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="plot_demand"
                    value="{{ $data['plot_demand'] ?? '' }}" placeholder="Plot Demand">
                @error('plot_demand')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Plot Sale Price</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="plot_sale_price"
                    value="{{ $data['plot_sale_price'] ?? '' }}" placeholder="Plot Sale Price" id="plotSalePrice">
                @error('plot_sale_price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Advance Payment</label>
            <div class="col-sm-9">
                <input type="number" class="form-control mt-3 ml-1" name="advance_payment" id="advancePayment" placeholder="Advance Payment">
                @error('advance_payment')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-6 col-form-label">Agreement (check for agreement)</label>
            <div class="">
                <input type="checkbox" class="form-control mt-3 ml-1" name="agreement" value="1">
                @error('agreement')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-12 my-2">
        <h5 class="">Adjustment Info</h5>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Properties/Vehicles Adjusted</label>
            <div class="col-md-12">
                <textarea name="vehicles_adjustment" rows="10" id="" class="form-control"
                    placeholder="Details of any properties or vehicles adjusted"></textarea>
                @error('vehicles_adjustment')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Price of adjustment</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="adjustment_price"
                    value="{{ $data['adjustment_price'] ?? '' }}" placeholder="Price Of Adjustment" id="adjustmentPrice">
                @error('adjustment_price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Picture of adjustment product</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="adjustment_product"
                    value="{{ $data['adjustment_product'] ?? '' }}" placeholder="Picture of adjustment product"
                    accept="image/*">
                @error('adjustment_product')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-12" style="display: none" id="priceNoteShow">
        <div class="alert alert-danger" role="alert">
            <strong>Note : </strong> <span id="totalCountAlertText"></span>
        </div>
    </div>

    <div class="col-md-12 my-2">
        <h5 class="">Payment Info</h5>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Select Payment Type</label>
            <div class="col-sm-9">
                <select name="payment_type" id="payment_type" class="form-control">
                    <option disabled selected>-- selelc if payment is full or not --</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                @error('payment_type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6" id="full_payment_box">
        {{-- dynamic html --}}
    </div>
    <div class="col-md-6 full_payment_box">
    </div>
    <div class="col-md-6 cash_field_count_box">
    </div>
</div>
<div class="cheque_boxes row">
</div>
<div class="row" id="cheque_fields_container">
</div>
<div class="col-md-12 my-2">
    <h5 class="">Sales Officers Info</h5>
</div>
<div class="row" id="sales_officer_box">
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Officer</label>
            <div class="">
                <select name="sales_officer_id[]" id="" class="form-control">
                    <option selected disabled>-- select sales officer --</option>
                    @foreach ($salesOfficers as $salesOfficer)
                        <option value="{{ $salesOfficer->id }}">{{ $salesOfficer->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Type</label>
            <div class="col-sm-9">
                <select name="commission_type[]" id="" class="form-control">
                    <option selected disabled>-- select type --</option>
                    <option value="percent">Percent</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Commission</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" placeholder="Commission here" name="commission_amount[]">
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group row">
            <button class="btn btn-sm btn-primary" id="add_more_officers">+</button>
        </div>
    </div>
</div>
<div class="col-md-12 my-2">
    <h5 class="">Other Owners Info</h5>
</div>
<div class="col-md-12">
    <div class="form-group row my-2 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary" id="add_more_owners">+ More Owners</button>
    </div>
</div>
<div class="row" id="add_more_owners_box">

</div>
