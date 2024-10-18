<div class="modal fade" id="installmentModal" tabindex="-1" role="dialog" aria-labelledby="installmentModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="installmentModalLabel">Cash Installment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add.plot.cash.installment', $id) }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Payment</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="installment_payment"
                                        placeholder="Installment Payment Here" value="{{old('installment_payment')}}">
                                        @error('installment_payment')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Due Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="payment_installment_due_date" value="{{old('payment_installment_due_date') }}">
                                        @error('payment_installment_due_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
