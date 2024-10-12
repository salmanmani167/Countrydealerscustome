@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Clients
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('client.update' , $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <h5 class="">Personal Info</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $data['name'] ?? old('name') }}" placeholder="Name Here">
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
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $data['email'] ?? old('email') }}" placeholder="Email Here">
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
                                    <input type="text" class="form-control" name="cnic"
                                        value="{{ $data['cnic'] ?? old('cnic') }}" placeholder="CNIC Here">
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
                                    <input type="text" class="form-control" name="number"
                                        value="{{ $data['number'] ?? old('number') }}" placeholder="Number Here">
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
                                        value="{{ $data['father_or_husband_name'] ?? old('father_or_husband_name') }}"
                                        placeholder="Father/Husband Name Here">
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
                                            <option value="{{ $clientType }}"
                                                @if (!empty($data->client_type) && $data->client_type == $clientType) selected @endif>
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
                                            <option value="{{ $saleType }}"
                                                @if (!empty($data->sale_type) && $data->sale_type == $saleType) selected @endif>
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
                                    <input type="text" class="form-control" name="paid_by"
                                        value="{{ $data['paid_by'] ?? old('paid_by') }}" placeholder="Paid by">
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
                                    <input type="text" class="form-control" name="plot_number"
                                        value="{{ $data['plot_number'] ?? old('plot_number') }}" placeholder="Plot Number">
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
                                    <input type="text" class="form-control" name="plot_size"
                                        value="{{ $data['plot_size'] ?? old('plot_size') }}" placeholder="Plot Size">
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
                                    <input type="text" class="form-control" name="location"
                                        value="{{ $data['location'] ?? old('location') }}" placeholder="location here">
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
                                    <input type="number" class="form-control" name="plot_price"
                                        value="{{ $data['plot_price'] ?? old('plot_price') }}" placeholder="Plot price">
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
                                        value="{{ $data['plot_demand'] ?? old('plot_demand') }}"
                                        placeholder="Plot Demand">
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
                                        value="{{ $data['plot_sale_price'] ?? old('plot_sale_price') }}"
                                        placeholder="Plot Sale Price" id="plotSalePrice">
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
                                    <input type="number" class="form-control mt-3 ml-1" name="advance_payment"
                                        id="advancePayment" placeholder="Advance Payment"
                                        value="{{ $data['advance_payment'] ?? old('advance_payment') }}">
                                    @error('advance_payment')
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
                                        placeholder="Details of any properties or vehicles adjusted">{{ $data['vehicles_adjustment'] ?? old('vehicles_adjustment') }}</textarea>
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
                                        value="{{ $data['adjustment_price'] ?? old('adjustment_price') }}"
                                        placeholder="Price Of Adjustment" id="adjustmentPrice">
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
                                        accept="image/*">
                                    @error('adjustment_product')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <img src="{{Storage::url($data->adjustment_product)}}" alt="" width="200px">
                        </div>
                        <div class="col-md-12" style="display: none" id="priceNoteShow">
                            <div class="alert alert-danger" role="alert">
                                <strong>Note : </strong> <span id="totalCountAlertText"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row my-2">
                                <button class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('bottom-scripts')
<script>
    function getResults() {
                let adjustmentPrice = parseFloat($('#adjustmentPrice').val()) || 0;
                let advancePayment = parseFloat($('#advancePayment').val()) || 0;
                let plotSalePrice = parseFloat($('#plotSalePrice').val()) || 0;
                let totalPrice = (plotSalePrice) - (adjustmentPrice + advancePayment);
                $('#totalCountAlertText').text('Remaining Amount For Installments ' + totalPrice);
            }
            $(document).on('input', '#advancePayment', function() {
                $('#priceNoteShow').show()
                getResults()
            })
            $(document).on('input', '#adjustmentPrice', function() {
                $('#priceNoteShow').show()
                getResults()
            })
            $(document).on('input', '#plotSalePrice', function() {
                $('#priceNoteShow').show()
                getResults()
            })
</script>
@endsection
detet
