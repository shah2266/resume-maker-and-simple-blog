
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Degree title <code>*</code></label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="degree_title" name="degree_title" placeholder="Degree title" value="{{ old('degree_title') ?? $education->degree_title }}">
        <span class="{{ $errors->has('degree_title') ? ' has-error':'' }}">
            @if($errors->has('degree_title'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('degree_title') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="contact" class="col-sm-2 control-label">Concentration <code>*</code></label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="concentration" name="concentration" placeholder="Concentration" value="{{ old('concentration') ?? $education->concentration }}">
        <span class="{{ $errors->has('concentration') ? ' has-error':'' }}">
            @if($errors->has('concentration'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('concentration') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="address" class="col-sm-2 control-label">Institute name <code>*</code></label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="institute_name" name="institute_name" placeholder="Institute name" value="{{ old('institute_name') ?? $education->institute_name }}">
        <span class="{{ $errors->has('institute_name') ? ' has-error':'' }}">
             @if($errors->has('institute_name'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('institute_name') }}</strong>
                 </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Grade point</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="grade_point" name="grade_point" placeholder="Grade point" value="{{ old('grade_point') ?? $education->grade_point }}">
        <span class="{{ $errors->has('grade_point') ? ' has-error':'' }}">
          @if($errors->has('grade_point'))
                <span class="help-block" role="alert">
                <strong>{{ $errors->first('grade_point') }}</strong>
            </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="summary" class="col-sm-2 control-label">Year of passing</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="year_of_passing" name="year_of_passing" placeholder="Year of passing" value="{{ old('year_of_passing') ?? $education->year_of_passing }}">
        <span class="{{ $errors->has('year_of_passing') ? ' has-error':'' }}">
            @if($errors->has('year_of_passing'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('year_of_passing') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="objective" class="col-sm-2 control-label">Duration</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" value="{{ old('duration') ?? $education->duration }}">
        <span class="{{ $errors->has('duration') ? ' has-error':'' }}">
             @if($errors->has('duration'))
                <span class="help-block" role="alert">
                   <strong>{{ $errors->first('duration') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="keywords" class="col-sm-2 control-label">Thesis</label>
    <div class="col-sm-10">
        <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="thesis" name="thesis" placeholder="Thesis">{{ old('thesis') ?? $education->thesis }}</textarea>
        <span class="{{ $errors->has('thesis') ? ' has-error':'' }}">
            @if($errors->has('thesis'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('thesis') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

<div class="form-group">
    <label for="keywords" class="col-sm-2 control-label">Achievement</label>
    <div class="col-sm-10">
        <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="achievement" name="achievement" placeholder="Achievement">{{ old('thesis') ?? $education->achievement }}</textarea>
        <span class="{{ $errors->has('achievement') ? ' has-error':'' }}">
            @if($errors->has('achievement'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('achievement') }}</strong>
                </span>
            @endif
        </span>
    </div>
</div>

@csrf
