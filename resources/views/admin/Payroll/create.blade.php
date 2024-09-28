@extends('admin.app')
@section('content')
@push('title')
<title>Create Payroll</title>
@endpush
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Create Payroll
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('payrolls.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Employee Selection --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label">Employee</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="employee_id" name="employee_id" required>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Basic Salary --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="basic_salary" class="col-sm-3 col-form-label">Basic Salary</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="basic_salary" name="basic_salary" required step="0.01" placeholder="Enter Basic Salary">
                            </div>
                        </div>
                    </div>

                    {{-- Fuel Adjustment --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="fuel_adjustment" class="col-sm-3 col-form-label">Fuel Adjustment</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="fuel_adjustment" name="fuel_adjustment" step="0.01" placeholder="Enter Fuel Adjustment">
                            </div>
                        </div>
                    </div>

                    {{-- Bonus --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="bonus" class="col-sm-3 col-form-label">Bonus</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="bonus" name="bonus" step="0.01" placeholder="Enter Bonus">
                            </div>
                        </div>
                    </div>

                    {{-- Loan Deduction --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="loan_deduction" class="col-sm-3 col-form-label">Loan Deduction</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="loan_deduction" name="loan_deduction" step="0.01" placeholder="Enter Loan Deduction">
                            </div>
                        </div>
                    </div>

                    {{-- Other Allowance --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="other_allowance" class="col-sm-3 col-form-label">Other Allowance</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="other_allowance" name="other_allowance" step="0.01" placeholder="Enter Other Allowance">
                            </div>
                        </div>
                    </div>

                    {{-- Net Salary --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="net_salary" class="col-sm-3 col-form-label">Net Salary</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="net_salary" name="net_salary" required step="0.01" placeholder="Enter Net Salary">
                            </div>
                        </div>
                    </div>

                    {{-- Bank Name --}}
                    {{-- <div class="col-md-12">
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Bank Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name">
                            </div>
                        </div>
                    </div> --}}

                    {{-- Status --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Date --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="payment_date" class="col-sm-3 col-form-label">Payment Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                            </div>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="col-md-12">
                        <div class="form-group row">
                            <button class="btn btn-sm btn-primary">Submit</button>
                            <a href="{{ route('payrolls.index') }}" class="ml-2 btn btn-sm btn-info border">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
