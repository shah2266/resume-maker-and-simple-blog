
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Company title</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company name" value="{{ old('company_name') ?? $professional->company_name }}">
        <span class="{{ $errors->has('company_name') ? ' has-error':'' }}">
            @if($errors->has('company_name'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('company_name') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Designation</label>

    <div class="col-sm-10">
        <input class="form-control" id="designation" name="designation" placeholder="Designation" value="{{ old('designation') ?? $professional->designation }}">
        <span class="{{ $errors->has('designation') ? ' has-error':'' }}">
          @if($errors->has('designation'))
                <span class="help-block" role="alert">
                <strong>{{ $errors->first('designation') }}</strong>
            </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="contact" class="col-sm-2 control-label">Department</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="{{ old('department') ?? $professional->department }}">
        <span class="{{ $errors->has('department') ? ' has-error':'' }}">
            @if($errors->has('department'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('department') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="summary" class="col-sm-2 control-label">Responsibilities</label>
    <div class="col-sm-10">
        <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="responsibilities" name="responsibilities" placeholder="Responsibilities 1; Responsibilities 2; ..... ; Responsibilities n">{{ old('responsibilities') ?? $professional->responsibilities }}</textarea>
        <span class="{{ $errors->has('responsibilities') ? ' has-error':'' }}">
            @if($errors->has('responsibilities'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('responsibilities') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="objective" class="col-sm-2 control-label">Employment period</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="employment_period" name="employment_period" placeholder="Employment period" value="{{ old('employment_period') ?? $professional->employment_period }}">
        <span class="{{ $errors->has('employment_period') ? ' has-error':'' }}">
             @if($errors->has('employment_period'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('employment_period') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="keywords" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') ?? $professional->address }}">
        <span class="{{ $errors->has('address') ? ' has-error':'' }}">
            @if($errors->has('address'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>
@csrf
