<div class="modal fade" id="chequechequeInstallmentModal" tabindex="-1" role="dialog" aria-labelledby="chequechequeInstallmentModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chequechequeInstallmentModalLabel">Cheque Installment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add.custom.cheque.installment', $id) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Picture of cheque</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="cheque_image" accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="cheque_installment_amount" placeholder="Amount here" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Due Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="cheque_installment_due_date" required>
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
