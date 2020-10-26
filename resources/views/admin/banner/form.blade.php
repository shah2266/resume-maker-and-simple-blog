            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group {{ $errors->has('image') ? ' has-error':'' }}">
                        <input type="file" name="image" class="file">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control" disabled
                                   placeholder="Upload Image (Only-jpeg, png)">
                            <span class="input-group-btn">
                                <button class="browse btn btn-success" type="button"><i
                                        class="glyphicon glyphicon-search"></i>
                                    Browse</button>
                            </span>

                        </div>
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
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error':'' }}">
                        <input type="text" class="form-control {{ $errors->has('name') ? ' has-error':'' }} "
                               id="name" name="name" value="{{ old('name') ?? $banner->name }}" placeholder="Heading">

                        @if ($errors->has('name'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('short_info_1') ? 'has-error':'' }}">
                        <input type="text" class="form-control {{$errors->has('short_info_1') ? 'has-error':'' }}" id="short_info_1" name="short_info_1" value="{{ old('short_info_1') ?? $banner->short_info_1 }}" placeholder="Short info 1">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group has-feedback {{ $errors->has('short_info_2') ? 'has-error':'' }}">
                        <input type="text" class="form-control {{$errors->has('short_info_2') ? 'has-error':'' }}" id="short_info_2" name="short_info_2" value="{{ old('short_info_2') ?? $banner->short_info_2 }}" placeholder="Short info 2">
                        @if($errors->has('short_info_2'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('short_info_2') }}</strong>
                        </span>
                         @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group has-feedback {{ $errors->has('button1_label') ? 'has-error':'' }}">
                                <input type="text" class="form-control {{$errors->has('button1_label') ? 'has-error':'' }}" id="button1_label" name="button1_label" value="{{ old('button1_label') ?? $banner->button1_label }}" placeholder="Button1 label">
                                @if($errors->has('button1_label'))
                                    <span class="help-block" role="alert">
                            <strong>{{ $erros->first('button1_label') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control {{$errors->has('button1_link') ? 'has-error':'' }}" id="button1_link" name="button1_link" value="{{ old('button1_link') ?? $banner->button1_link }}" placeholder="Button1 link">
                                @if($errors->has('button1_link'))
                                    <span class="help-block" role="alert">
                            <strong>{{ $erros->first('button1_link') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group has-feedback {{ $errors->has('button2_label') ? 'has-error':'' }}">
                                <input type="text" class="form-control {{$errors->has('button2_label') ? 'has-error':'' }}" id="button2_label" name="button2_label" value="{{ old('button2_label') ?? $banner->button2_label }}" placeholder="Button2 label">
                                @if($errors->has('button2_label'))
                                    <span class="help-block" role="alert">
                            <strong>{{ $erros->first('button2_label') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control {{$errors->has('button2_link') ? 'has-error':'' }}" id="button2_link" name="button2_link" value="{{ old('button2_link') ?? $banner->button2_link }}" placeholder="Button2 link">
                                @if($errors->has('button2_link'))
                                    <span class="help-block" role="alert">
                            <strong>{{ $erros->first('button2_link') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group {{ $errors->has('banner_type') ? ' has-error':'' }}">
                        <select class="form-control select2" name="banner_type" style="width: 100%;">
                            @foreach ($banner->bannerTypeOptions() as $bannerTypeOptionsKey => $bannerTypeOptionsValue)
                                <option value="{{ $bannerTypeOptionsKey }}" {{ $banner->banner_type == $bannerTypeOptionsValue ? 'selected' : '' }}> {{ $bannerTypeOptionsValue }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('banner_type'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('banner_type') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group {{ $errors->has('status') ? ' has-error':'' }}">
                        <select class="form-control select2" name="status" style="width: 100%;">
                            @foreach ($banner->statusOptions() as $statusOptionsKey => $statusOptionsValue)
                                <option value="{{ $statusOptionsKey }}" {{ $banner->status == $statusOptionsValue ? 'selected' : '' }}> {{ $statusOptionsValue }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>


