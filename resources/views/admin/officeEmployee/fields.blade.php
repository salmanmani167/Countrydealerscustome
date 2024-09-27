<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">First Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="first_name">
                @error('first_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Last Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="last_name">
                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bank Title</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="bank_name">
                @error('bank_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Account #</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="account_number" min="0">
                @error('account_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">CNIC #</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="cnic" min="0">
                @error('cnic')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Profile Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">CNIC Front Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="cnic_front_image" accept="image/*">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">CNIC Front Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="cnic_back_image" accept="image/*">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Father CNIC Front Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="father_cnic_front_image" accept="image/*">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Fatehr CNIC Back Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="father_cnic_back_image" accept="image/*">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Previous Experience</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="previous_experience"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Curriculum Vitae</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="cv" accept=".pdf , .txt , .docx">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-sm-3">Reference</label>
            <div class="col-sm-12">
                <textarea name="" id="" cols="30" rows="5" class="form-control" name="reference">
                </textarea>
                @error('reference')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Salary</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="salary" min="0">
                @error('salary')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Designation</label>
            <div class="col-sm-9">
                <select class="form-control" name="designation">
                    <option disabled selected>-- select an option --</option>
                    @foreach (config('vars.designations') as $designation)
                        <option value="{{ $designation }}">{{ $designation }}</option>
                    @endforeach
                </select>
                @error('designation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Department</label>
            <div class="col-sm-9">
                <select class="form-control" name="department">
                    <option disabled selected>-- select an option --</option>
                    @foreach (config('vars.departments') as $designation)
                        <option value="{{ $designation }}">{{ $designation }}</option>
                    @endforeach
                </select>
                @error('department')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Loan Amount</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="loan_amount" min="0">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Loan Return</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="loan_return" min="0">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Other Allowances</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="other_allowance" min="0">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
                <select class="form-control" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Date of Birth</label>
            <div class="col-sm-9">
                <input class="form-control" placeholder="dd/mm/yyyy" name="date_of_birth" type="date">
                @error('date_of_birth')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-sm-3">Fuel Adjustment</label>
            <div class="col-sm-12">
                <textarea class="form-control" name="fuel_adjustment" rows="5"></textarea>
            </div>
        </div>
    </div>
</div>
