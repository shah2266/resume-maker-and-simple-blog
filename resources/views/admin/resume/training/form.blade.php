
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Training title</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="training_title" name="training_title" placeholder="Training title" value="{{ old('training_title') ?? $training->training_title }}">
        <span class="{{ $errors->has('training_title') ? ' has-error':'' }}">
            @if($errors->has('training_title'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('training_title') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Topics covered</label>

    <div class="col-sm-10">
        <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="topics_covered" name="topics_covered" placeholder="Topics covered">{{ old('topics_covered') ?? $training->topics_covered }}</textarea>
        <span class="{{ $errors->has('topics_covered') ? ' has-error':'' }}">
          @if($errors->has('topics_covered'))
                <span class="help-block" role="alert">
                <strong>{{ $errors->first('topics_covered') }}</strong>
            </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="contact" class="col-sm-2 control-label">Institute</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="institute" name="institute" placeholder="Institute" value="{{ old('institute') ?? $training->institute }}">
        <span class="{{ $errors->has('institute') ? ' has-error':'' }}">
            @if($errors->has('institute'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('institute') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="summary" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') ?? $training->address }}">
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
    <label for="objective" class="col-sm-2 control-label">Training year</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="training_Year" name="training_Year" placeholder="Training year" value="{{ old('training_Year') ?? $training->training_Year }}">
        <span class="{{ $errors->has('training_Year') ? ' has-error':'' }}">
             @if($errors->has('training_Year'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('training_Year') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="keywords" class="col-sm-2 control-label">Duration</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" value="{{ old('duration') ?? $training->duration }}">
        <span class="{{ $errors->has('duration') ? ' has-error':'' }}">
            @if($errors->has('duration'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('duration') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>
@csrf
