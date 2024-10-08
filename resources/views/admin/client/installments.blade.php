@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Installment Details
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @forelse ($data as $installment)
                        @if ($installment->payment_method === 'cash')
                            <div class="card-body d-flex justify-content-between">
                                <div class="col-md-2">
                                    <p><strong for="">Payment Type</strong></p>
                                    {{ $installment->payment_type === 'yes' ? 'Full Payment' : 'Installment' }}
                                </div>
                                <div class="col-md-2">
                                    <p><strong for="">Payment Method</strong></p>
                                    {{ $installment->payment_method }}
                                </div>
                                <div class="col-md-2">
                                    <p><strong for="">Installment Payment</strong></p>
                                    {{ $installment->installment_payment }}
                                </div>
                                <div class="col-md-2">
                                    <p><strong for="">Status</strong></p>
                                    {{ $installment->status ?? 'UNPAID' }}
                                </div>
                                <div class="col-md-2">
                                    <p><strong for="">Payment Installment Due Date</strong></p>
                                    {{ Carbon\Carbon::parse($installment->payment_installment_due_date)->format('D-M-Y') }}
                                </div>
                                <div class="col-md-3">
                                    <p><strong for="">Update Status</strong></p>
                                    @if ($installment->status == 'PAID')
                                        <button class="btn btn-success btn-sm" disabled><i
                                                class="fas fa-regular fa-check"></i></button>
                                    @else
                                        <a href="javascript:;" class="btn btn-outline-success btn-sm"
                                            onclick="confirmAction('{{ route('client.installment.status.update', $installment->id) }}')"><i
                                                class="fas fa-regular fa-check"></i></a>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="card-body d-flex justify-content-between">
                                <div class="col-md-3">
                                    <p><strong for="">Payment Type</strong></p>
                                    {{ $installment->payment_type === 'yes' ? 'Full Payment' : 'Installment' }}
                                </div>
                                <div class="col-md-3">
                                    <p><strong for="">Payment Method</strong></p>
                                    {{ $installment->payment_method }}
                                </div>
                                <div class="col-md-3">
                                    <p><strong for="">Cheque Image</strong></p>
                                    <a href="{{ Storage::url($installment->cheque_image) }}" target="_blank"><img
                                            src="{{ Storage::url($installment->cheque_image) }}" alt="Cheque Image"
                                            height="20px"></a>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="card-body d-flex">
                                <div class="col-md-3">
                                    <p><strong for="">Cheque Installment Amount</strong></p>
                                    {{ $installment->cheque_installment_amount }}
                                </div>
                                <div class="col-md-3">
                                    <p><strong for="">Cheque Installment Due Date</strong></p>
                                    {{ Carbon\Carbon::parse($installment->cheque_installment_due_date)->format('D-M-Y') }}
                                </div>
                                <div class="col-md-3">
                                    <p><strong for="">Status</strong></p>
                                    {{ $installment->status}}
                                </div>
                                <div class="col-md-3">
                                    <p><strong for="">Update Status</strong></p>
                                    @if ($installment->status == 'PAID')
                                        <button class="btn btn-success btn-sm" disabled><i
                                                class="fas fa-regular fa-check"></i></button>
                                    @else
                                        <a href="javascript:;" class="btn btn-outline-success btn-sm"
                                            onclick="confirmAction('{{ route('client.installment.status.update', $installment->id) }}')"><i
                                                class="fas fa-regular fa-check"></i></a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @empty
                        <h5 class="text-center m-0 py-4">No data found.</h5>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom-scripts')
    <script></script>
@endsection
