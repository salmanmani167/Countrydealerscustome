@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Purchase
            </h3>
        </div>
        <form action="{{ route('purchase.store') }}" method="post" enctype="multipart/form-data">
            <div class="row mb-4">
                <div class="card col-md-12">
                    <div class="col-md-6 mt-4">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Select Old Plot</label>
                            <div class="col-md-9">
                                <select name="" id="get_old_plot_data" class="form-control">
                                    <option selected disabled>-- select plot number --</option>
                                    @foreach ($oldPlots as $oldPlot)
                                        <option value="{{ $oldPlot->id }}">{{ $oldPlot->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
            @include('admin.client.fields')
            <div class="col-md-12">
                <div class="form-group row my-2">
                    <button class="btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('bottom-scripts')
    <script>
        let ifCheque = false;
        // installment payment fields
        function generateChequeFields() {
            let html = `<div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Picture of cheque</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="cheque_image[]" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cheque_installment_amount[]" placeholder="Amount here">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="cheque_installment_due_date[]">
                            </div>
                        </div>
                    </div>
                    `;
            return html;
        }
        // installment payment fields
        function generatePaymentFields() {
            let html = `<div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="installment_payment[]" placeholder="Installment Payment Here">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="payment_installment_due_date[]">
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
                                <input type="file" class="form-control" name="cheque_image" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="due_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="check_amount" placeholder = "Enter Amount Here">
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
            $(document).on('click', '#add_more_owners', function(e) {
                e.preventDefault();
                // count += 1;
                $('#add_more_owners_box').append(
                    `
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="other_owner_name[]" value="{{ $data['other_owner_name'] ?? '' }}"
                                placeholder="Name Here">
                            @error('other_owner_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="other_owner_email[]" value="{{ $data['email'] ?? '' }}" placeholder="Email Here">
                            @error('other_owner_email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="other_owner_number[]" value="{{ $data['number'] ?? '' }}"
                                placeholder="Number Here">
                            @error('other_owner_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fatehr/Husband Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="other_owner_father_or_husband_name[]" value="{{ $data['father_or_husband_name'] ?? '' }}"
                                placeholder="Father Or Husband Name">
                            @error('other_owner_father_or_husband_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                `)
            })

            $(document).on('change', '#get_old_plot_data', function() {
                let clientId = $(this).val();
                $.ajax({
                    type: "get",
                    url: 'admin/get/old/client/' + clientId,
                    success: function(response) {
                        let oldPlot = response.data;
                        $('#vehicles_adjustment').text(oldPlot.vehicles_adjustment);
                        $.each(oldPlot, function(key, value) {
                            // Check if there is an input field with the matching name
                            let input = $(`input[name="${key}"]`);
                            if (input.length) {
                                // Set the input value to the corresponding oldPlot property value
                                input.val(value);
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Optional: Handle any errors here
                        console.error("Error: ", error);
                    }
                });
            })
        })
    </script>
@endsection
