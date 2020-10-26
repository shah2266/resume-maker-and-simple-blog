    @csrf
    <div class="form-group">
        <label for="image" class="col-sm-3 control-label">Set breadcrumb resume background</label>
        <div class="col-sm-9">
            <input type="file" name="image" class="file">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                <input type="text" class="form-control" disabled
                       placeholder="Breadcrumb image (Only-jpeg, png)">
                <span class="input-group-btn">
                <button class="browse btn btn-success" type="button">
                    <i class="glyphicon glyphicon-search"></i> Browse
                </button>
            </span>
            </div>
            <div class="{{ $errors->has('image') ? ' has-error':'' }}">
                @if ($errors->has('image'))
                    <span class="help-block" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="page_title" class="col-sm-3 control-label">Page title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="page_title" name="page_title" placeholder="Page title" value="{{ old('page_title') ?? $pageContent->page_title }}">
            <span class="{{ $errors->has('page_title') ? ' has-error':'' }}">
               @if($errors->has('page_title'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('page_title') }}</strong>
                </span>
               @endif
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="description" name="description" placeholder="Description">{{ old('description') ?? $pageContent->description }}</textarea>
            <span class="{{ $errors->has('description') ? ' has-error':'' }}">
               @if($errors->has('description'))
                    <span class="help-block" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') ?? $pageContent->address }}">
            <span class="{{ $errors->has('address') ? ' has-error':'' }}">
               @if($errors->has('address'))
                    <span class="help-block" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') ?? $pageContent->email }}">
            <span class="{{ $errors->has('email') ? ' has-error':'' }}">
               @if($errors->has('email'))
                    <span class="help-block" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="contact" class="col-sm-3 control-label">Contact</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="{{ old('contact') ?? $pageContent->contact }}">
            <span class="{{ $errors->has('contact') ? ' has-error':'' }}">
               @if($errors->has('contact'))
                    <span class="help-block" role="alert">
                    <strong>{{ $errors->first('contact') }}</strong>
                </span>
                @endif
            </span>
        </div>
    </div>


