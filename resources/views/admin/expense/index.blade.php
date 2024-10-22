@extends('admin.app')
@section('content')
    @include('admin.expense.modals.expense')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Expenses
            </h3>
            <a href="javascript:;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#expenseModal">+ New</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $expense)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>
                                                <a href="{{ Storage::url($expense->picture) }}" target="_blank">
                                                    <img src="{{ Storage::url($expense->picture) }}" alt=""
                                                        width="20px">
                                                </a>
                                            </td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->description }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-danger"
                                                    onclick="confirmAction('{{ route('expense.delete', $expense->id) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
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
        let table = new DataTable('#myTable');
    </script>
@endsection
