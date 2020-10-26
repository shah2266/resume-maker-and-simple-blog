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
            <input type="text" class="form-control" id="page_title" name="page_title" placeholder="Page title" value="{{ old('page_title') ?? $content->page_title }}">
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
            <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="description" name="description" placeholder="Description">{{ old('description') ?? $content->description }}</textarea>
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
        <label for="visibility" class="col-sm-3 control-label">Background visibility</label>
        <div class="col-sm-9">
            @php
                $v = array('Single (Take image from post item)', 'All blog pages');
            @endphp
            <select class="form-control select2" name="visibility" style="width: 100%;">
                @foreach($v as $key => $title)
                    @if($key == old('visibility') || $content->visibility == $key)
                        <option value="{{ $key }}" selected>{{ $title }}</option>
                    @else
                        <option value="{{ $key }}" >{{ $title }}</option>
                    @endif
                @endforeach

            </select>
            <span class="{{ $errors->has('visibility') ? ' has-error':'' }}">
               @if($errors->has('visibility'))
                    <span class="help-block" role="alert">
                    <strong>{{ $errors->first('visibility') }}</strong>
                </span>
                @endif
            </span>
        </div>
    </div>


