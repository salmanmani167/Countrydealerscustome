<div class="modal fade" id="typeModal" tabindex="-1" role="dialog"
    aria-labelledby="typeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="typeModalLabel">type Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('type.store')}}" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" accept="image/*">
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category Type</label>
                                <div class="col-sm-9">
                                    <select name="type_category" id="" class="form-control">
                                        <option value="client">Client Type</option>
                                        <option value="purchase">Purchase Type</option>
                                        <option value="expense">Expense Type</option>
                                    </select>
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
