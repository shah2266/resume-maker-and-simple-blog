@csrf
<div class="form-group has-feedback {{ $errors->has('name') ? ' has-error':'' }}">
    <input type="text" class="form-control {{ $errors->has('name') ? ' has-error':'' }} "
           id="name" name="name" value="{{ old('name')}}" placeholder="Category name">

    @if ($errors->has('name'))
        <span class="help-block" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group has-feedback {{ $errors->has('slug') ? ' has-error':'' }}">
    <input type="text" class="form-control {{ $errors->has('slug') ? ' has-error':'' }} "
           id="slug" name="slug" value="{{ old('slug')}}" placeholder="Slug">

    @if ($errors->has('slug'))
        <span class="help-block" role="alert">
          <strong>{{ $errors->first('slug') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <textarea class="form-control" style="word-wrap: break-word; min-height: 80px;" id="description" name="description" placeholder="Description">{{ old('description')}}</textarea>
    <span class="{{ $errors->has('description') ? ' has-error':'' }}">
        @if($errors->has('description'))
            <span class="help-block" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </span>
</div>

<div class="form-group {{ $errors->has('status') ? ' has-error':'' }}">
    <select class="form-control select2" name="status" style="width: 100%;">
        @foreach ($category->statusOption() as $key => $status)
            <option value="{{ $key }}" {{ $category->status == $status ? 'selected' : '' }}> {{ $status }}</option>
        @endforeach
    </select>
    @if ($errors->has('status'))
        <span class="help-block" role="alert">
            <strong>{{ $errors->first('status') }}</strong>
        </span>
    @endif
</div>
