@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Payroll Listing
            </h3>
            <a href="{{ route('payrolls.create') }}" class="btn btn-sm btn-primary">+ New Payroll</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="payrollListing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>Employee Name</th> --}}
                                        <th>Net Salary</th>
                                        <th>Payment Status</th>
                                        <th>Payment Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrolls as $key => $payroll)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        {{-- <td>{{ $payroll->employee->first_name . ' ' . $payroll->employee->last_name }}</td> --}}
                                        <td>{{ $payroll->net_salary }}</td>
                                        <td>{{ $payroll->status ? 'Paid' : 'Pending' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($payroll->payment_date)->format('d-m-Y') }}</td>
                                        <td>
                                            {{-- <a href="{{ route('payrolls.show', $payroll->id) }}" class="btn btn-outline-primary btn-sm">View</a> --}}
                                            <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>

                                            {{-- Delete Form --}}
                                            <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this payroll?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom-scripts')
    <script>
        let table = new DataTable('#payrollListing');
    </script>
@endsection
