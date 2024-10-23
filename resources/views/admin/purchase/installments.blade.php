@extends('admin.app')
@section('content')
    @include('admin.purchase.modals.installment')
    @include('admin.purchase.modals.chequeInstallment')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">
                Cash Installment Details
            </h3>
            <a href="javascript:;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#installmentModal">+
                New</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card px-2">
                    <div class="table-responsive">
                        <table id="cashInstallmentTable" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Type</th>
                                    <th>Payment Method</th>
                                    <th>Installment Payment</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cashInstallments as $key => $installment)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $installment->payment_type === 'yes' ? 'Full Payment' : 'Installment' }}
                                        </td>
                                        <td>{{ $installment->payment_method }}</td>
                                        <td>{{ $installment->installment_payment }}</td>
                                        <td>{{ Carbon\Carbon::parse($installment->payment_installment_due_date)->format('D-M-Y') }}
                                        </td>
                                        <td>
                                            @if ($installment->status == null)
                                                <div class="badge badge-danger badge-pill">UNPAID</div>
                                            @else
                                                <div class="badge badge-success badge-pill">PAID</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($installment->status == 'PAID')
                                                <button class="btn btn-sm btn-success" disabled>Paid</button>
                                                {{-- this id is client id --}}
                                                <a href="{{ route('purchase.print', ['client_id' => $id, 'installment_id' => $installment->id]) }}"
                                                    class="btn btn-outline-primary btn-sm" target="_blank">
                                                    <i class="fas fa-solid fa-print"></i>
                                                </a>
                                            @else
                                                <a href="javascript:;" class="btn btn-outline-success btn-sm"
                                                    onclick="confirmAction('{{ route('purchase.installment.status.update', $installment->id) }}')">
                                                    <i class="fas fa-regular fa-check"></i>
                                                </a>
                                            @endif
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
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Cheque Installment Details
            </h3>
            <a href="javascript:;" class="btn btn-primary btn-sm" data-toggle="modal"
                data-target="#chequechequeInstallmentModal">+ New</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card px-2">
                    <div class="table-responsive">
                        <table id="chequeInstallmentTable" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Type</th>
                                    <th>Payment Method</th>
                                    <th>Cheque Image</th>
                                    <th>Installment Amount</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th style="width: 150px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chequeInstallments as $key => $installment)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $installment->payment_type === 'yes' ? 'Full Payment' : 'Installment' }}
                                        </td>
                                        <td>{{ $installment->payment_method }}</td>
                                        <td><a href="{{ Storage::url($installment->cheque_image) }}" target="_blank"><img
                                                    src="{{ Storage::url($installment->cheque_image) }}" alt="Cheque Image"
                                                    height="20px"></a></td>
                                        <td>{{ $installment->cheque_installment_amount }}</td>
                                        <td>{{ Carbon\Carbon::parse($installment->cheque_installment_due_date)->format('D-M-Y') }}
                                        </td>
                                        <td>
                                            @if ($installment->status == null)
                                                <div class="badge badge-danger badge-pill">UNPAID</div>
                                            @else
                                                <div class="badge badge-success badge-pill">PAID</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($installment->status == 'PAID')
                                                <button class="btn btn-sm btn-success" disabled>Paid</button>
                                                {{-- this id is client id --}}
                                                <a href="{{ route('purchase.print', ['client_id' => $id, 'installment_id' => $installment->id]) }}"
                                                    class="btn btn-outline-primary btn-sm" target="_blank">
                                                    <i class="fas fa-solid fa-print"></i>
                                                </a>
                                            @else
                                                <a href="javascript:;" class="btn btn-outline-success btn-sm"
                                                    onclick="confirmAction('{{ route('purchase.installment.status.update', $installment->id) }}')">
                                                    <i class="fas fa-regular fa-check"></i></a>
                                            @endif
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
@endsection

@section('bottom-scripts')
    <script>
        let cashInstallmentTable = new DataTable('#cashInstallmentTable');
        let chequeInstallmentTable = new DataTable('#chequeInstallmentTable');
    </script>
@endsection
