<div class="form-group">
    <label for="image" class="col-sm-3 control-label">Set breadcrumb resume background</label>
    <div class="col-sm-6">
        <input type="file" name="bg_image" class="file">
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
        <div class="{{ $errors->has('bg_image') ? ' has-error':'' }}">
            @if ($errors->has('bg_image'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('bg_image') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label for="image" class="col-sm-3 control-label">Resume upload</label>
    <div class="col-sm-6">
        <input type="file" name="file" class="file">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
            <input type="text" class="form-control" disabled
                   placeholder="Resume upload (Only-doc,pdf)">
            <span class="input-group-btn">
                <button class="browse btn btn-success" type="button">
                    <i class="glyphicon glyphicon-search"></i> Browse
                </button>
            </span>
        </div>
        <div class="{{ $errors->has('file') ? ' has-error':'' }}">
            @if ($errors->has('file'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label for="image" class="col-sm-3 control-label">Profile picture</label>
    <div class="col-sm-6">
        <input type="file" name="image" class="file">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
            <input type="text" class="form-control" disabled
                   placeholder="Upload Image (Only-jpeg, png)">
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
    <label for="name" class="col-sm-3 control-label">Name</label>

    <div class="col-sm-9">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ?? $personal->name }}">
        <span class="{{ $errors->has('name') ? ' has-error':'' }}">
            @if($errors->has('name'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-3 control-label">Email</label>

    <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') ?? $personal->email }}">
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
        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="{{ old('contact') ?? $personal->contact }}">
        <span class="{{ $errors->has('contact') ? ' has-error':'' }}">
            @if($errors->has('contact'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('contact') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="address" class="col-sm-3 control-label">Address</label>

    <div class="col-sm-9">
        <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{ old('address') ?? $personal->address }}">
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
    <label for="summary" class="col-sm-3 control-label">Summary</label>
    <div class="col-sm-9">
        <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="summary" name="summary" placeholder="Summary">{{ old('summary') ?? $personal->summary }}</textarea>
        <span class="{{ $errors->has('summary') ? ' has-error':'' }}">
            @if($errors->has('summary'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('summary') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="objective" class="col-sm-3 control-label">Objective</label>

    <div class="col-sm-9">
        <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="objective" name="objective" placeholder="objective">{{ old('objective') ?? $personal->objective }}</textarea>
        <span class="{{ $errors->has('objective') ? ' has-error':'' }}">
             @if($errors->has('objective'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('objective') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="keywords" class="col-sm-3 control-label">Keywords</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Keywords" value="{{ old('keywords') ?? $personal->keywords }}">
        <span class="{{ $errors->has('keywords') ? ' has-error':'' }}">
            @if($errors->has('keywords'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('keywords') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="keywords" class="col-sm-3 control-label">Key skills</label>
    <div class="col-sm-9">
        <textarea style="word-wrap: break-word; min-height: 80px;" class="form-control" id="skills" name="skills" placeholder="Skill 1; Skill 2; ..... ; Skill n">{{ old('skills') ?? $personal->skills }}</textarea>
        <span class="{{ $errors->has('skills') ? ' has-error':'' }}">
            @if($errors->has('skills'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('skills') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

@csrf
