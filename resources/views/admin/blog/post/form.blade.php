
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
<div class="form-group {{ $errors->has('category_id') ? ' has-error':'' }}">
    <select class="form-control select2" name="category_id" style="width: 100%;">
        <option value="">Select category name</option>
        @foreach ($categories as $category)
            @if($category->id == old('category_id'))
                <option value="{{ $category->id }}" selected>{{ $category->name}}</option>
            @else
                <option value="{{ $category->id }}" {{$category->id == $post->category_id ? 'selected': ''}}>{{ $category->name}}</option>
            @endif

        @endforeach
    </select>
    @if ($errors->has('category_id'))
        <span class="help-block" role="alert">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group has-feedback {{ $errors->has('title') ? ' has-error':'' }}">
    <input type="text" class="form-control {{ $errors->has('title') ? ' has-error':'' }} "
           id="title" name="title" value="{{ old('title') ?? $post->title }}" placeholder="Post title">

    @if ($errors->has('title'))
        <span class="help-block" role="alert">
          <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group has-feedback {{ $errors->has('slug') ? ' has-error':'' }}">
    <input type="text" class="form-control {{ $errors->has('slug') ? ' has-error':'' }} "
           id="slug" name="slug" value="{{ old('slug') ??  str_replace('-',' ',$post->slug) }}" placeholder="Slug">

    @if ($errors->has('slug'))
        <span class="help-block" role="alert">
          <strong>{{ $errors->first('slug') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('description') ? ' has-error':'' }}">
    <textarea class="form-control" id="editor1" style="word-wrap: break-word; min-height: 80px;" id="description" name="description" placeholder="Description">{{ old('description') ?? $post->description }}</textarea>
    <span class="{{ $errors->has('description') ? ' has-error':'' }}">
        @if($errors->has('description'))
            <span class="help-block" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </span>
</div>
<div class="form-group {{ $errors->has('is_published') ? ' has-error':'' }}">
    <select class="form-control select2" name="is_published" style="width: 100%;">

        @foreach ($post->publishOptions() as $key => $value)
            @if($post->is_published == old('is_published'))
                <option value="{{ $key }}" selected >{{ $value }}</option>
            @else
                <option value="{{ $key }}" {{$post->is_published == $key ? 'selected': ''}}>{{ $value }}</option>
            @endif
        @endforeach
    </select>
    @if ($errors->has('is_published'))
        <span class="help-block" role="alert">
            <strong>{{ $errors->first('is_published') }}</strong>
        </span>
    @endif
</div>


<div class="form-group">
    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::User()->id }}">
</div>

@csrf
