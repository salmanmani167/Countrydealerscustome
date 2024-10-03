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
                <form action="{{ route('employee.office.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.client.fields')
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
        let ifCheque = false;

        function generateChequeFields() {
            let html = `<div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Picture of cheque</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="cheque_image_installment_payment" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cheque_installment_amount" placeholder="Amount here">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="cheque_installment_due_date">
                            </div>
                        </div>
                    </div>
                    `;
            return html;
        }

        function generatePaymentFields() {
            let html = `<div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="installment_payment">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="payment_installment_due_date">
                            </div>
                        </div>
                    </div>`;
            return html;
        }
        $(document).ready(function() {

            $(document).on('change', '#payment_type', function() {
                if ($(this).val() == 'yes') {
                    $('.cheque_boxes').empty();
                    $('#full_payment_box').html(
                        `<div class="form-group row">
            <label class="col-sm-3 col-form-label">Payment Method</label>
            <div class="col-sm-9">
                <select name="payment_method" id="full_payment" class="form-control">
                    <option disabled selected>-- selelc payment method --</option>
                    <option value="cheque">Cheque</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
        </div>`)

                } else {
                    $('.cheque_boxes').empty();
                    $('#full_payment_box').html(`<div class="form-group row">
            <label class="col-sm-3 col-form-label">Payment Method</label>
            <div class="col-sm-9">
                <select name="payment_method" id="installment_payment" class="form-control">
                    <option disabled selected>-- selelc payment method --</option>
                    <option value="cheque">Cheque</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
        </div>`)
                    $('.full_payment_box').html('')
                }
            })
            $(document).on('change', '#full_payment', function() {
                $('#cheque_fields_container').empty();
                if ($(this).val() == 'cheque') {
                    $('.cheque_boxes').html(`
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Picture of cheque</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="cheque_image_payment_full" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="cheque_due_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="check_amount_full_payment" placeholder = "Enter Amount Here">
                            </div>
                        </div>
                    </div>`)
                    $('.full_payment_box').html('')
                } else {
                    $('.cheque_boxes').html('')
                    $('.full_payment_box').html(
                        `<div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Payment</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="full_payment" placeholder="Full Payment Here">
                            @error('full_payment')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>`)
                }
            })
            $(document).on('change', '#installment_payment', function() {
                $('#cheque_fields_container').empty();
                if ($(this).val() == 'cheque') {
                    ifCheque = true
                } else {
                    ifCheque = false
                }
                $('.cash_field_count_box').html(`<div class="form-group row">
            <label class="col-sm-3 col-form-label">Enter The Number Of Months</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="cash_field_count_box">
                <a href="javascript:;" class="btn btn-sm btn-primary mt-2" id="add_fields">Add</a>
            </div>
        </div>`)
            })
            $(document).on('click', '#add_fields', function(e) {
                e.preventDefault();
                let number = $('#cash_field_count_box').val();
                $('#cheque_fields_container').empty();

                // Loop to generate the required number of fields
                if (ifCheque == true) {
                    for (let i = 0; i < number; i++) {
                        let html = generateChequeFields();
                        $('#cheque_fields_container').append(html);
                    }
                } else {
                    for (let i = 0; i < number; i++) {
                        let html = generatePaymentFields();
                        $('#cheque_fields_container').append(html);
                    }
                }
            })

            $(document).on('click', '#add_more_officers', function(e) {
                e.preventDefault();
                $('#sales_officer_box').append(
                    `<div class="row col-md-12 officer-row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Select Sales Officer</label>
                            <div class="col-sm-9">
                                <select name="" id="" class="form-control">
                                    <option selected disabled>-- select sales officer --</option>
                                    @foreach ($salesOfficers as $salesOfficer)
                                        <option value="{{ $salesOfficer->id }}">{{ $salesOfficer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sales Officer Commission</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Commission here">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button class="btn btn-sm btn-danger delete-officer">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>`
                )
                $(document).on('click', '.delete-officer', function(e) {
                    e.preventDefault();
                    $(this).closest('.officer-row').remove();
                });
            })
            let count = 0;
            $(document).on('click', '#add_more_owners', function(e) {
                e.preventDefault();
                count += 1;
                $('#add_more_owners_box').append(
                `
                <div class="col-md-6">
                    <h5>${count}</h5>
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
                            <input type="text" class="form-control" name="email" value="{{ $data['email'] ?? '' }}" placeholder="Email Here">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="number" value="{{ $data['number'] ?? '' }}"
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
                            <input type="text" class="form-control" name="father_or_husband_name" value="{{ $data['father_or_husband_name'] ?? '' }}"
                                placeholder="Email Here">
                            @error('father_or_husband_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                `)
            })
        })
    </script>
@endsection
