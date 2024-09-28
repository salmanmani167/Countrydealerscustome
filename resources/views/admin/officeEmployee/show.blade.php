@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Admin Office Employee Details
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="dragula-left" class="py-2">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa fa-user icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Employee Name</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->first_name }} {{ $data->last_name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fas fa-file icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Gender</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->gender }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-cake-candles align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Date Of Birth</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->date_of_birth }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-dollar-sign icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Salary</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->salary }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-user icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Reference</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->reference }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-chair icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Designation</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->designation }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-building-columns icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Bank Account Number</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->account_number }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-comment-dollar icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Loan Amount</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->loan_amount }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-comments-dollar icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Other Allowance</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->other_allowance }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="dragula-right" class="py-2">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa fa-user icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Father Name</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->father_name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-person-digging icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Previous Experience</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->previous_experience }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-gas-pump icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Fuel Adjustment</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->fuel_adjustment }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        {{-- <i class="fa fa-coffee icon-sm align-self-center mr-3"></i> --}}
                                        <i class="fa-solid fa-house icon-sm align-self-center mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Address</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->address }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-building-columns icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Bank Name</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->bank_name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-handshake icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Joining Date</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->joining_date }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-building icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Department</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->department }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-sack-dollar icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">Loan Return</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->loan_return }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <i class="fa-solid fa-address-card icon-sm mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mb-1">CNIC</h6>
                                            <p class="mb-0 text-muted">
                                                {{ $data->cnic }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card rounded border mb-2">
                            <div class="card-body p-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mb-1">Profile Image</h6>
                                        <img src="{{Storage::url($data->image)}}" alt="{{$data->image}}" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded border mb-2">
                            <div class="card-body p-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mb-1">CNIC Front Image</h6>
                                        <img src="{{Storage::url($data->cnic_front_image)}}" alt="{{$data->image}}" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded border mb-2">
                            <div class="card-body p-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mb-1">CNIC Back Image</h6>
                                        <img src="{{Storage::url($data->cnic_back_image)}}" alt="{{$data->image}}" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded border mb-2">
                            <div class="card-body p-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mb-1">Father's CNIC Front Image</h6>
                                        <img src="{{Storage::url($data->father_cnic_front_image)}}" alt="{{$data->image}}" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded border mb-2">
                            <div class="card-body p-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mb-1">Father's CNIC Back Image</h6>
                                        <img src="{{Storage::url($data->father_cnic_back_image)}}" alt="{{$data->image}}" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded border mb-2">
                            <div class="card-body p-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mb-1">CV</h6>
                                        <a href="{{Storage::url($data->cv)}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
