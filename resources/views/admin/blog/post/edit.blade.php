@extends('admin.layout.master')

@section('title', 'Blog post edit')

@section('currentPage', 'Post-edit')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Post edit</h3>

                    <div class="box-tools pull-right">
                        <span><a href="{{ url('control/blog/post') }}" class="bg-blue btn-back btn">Back</a></span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ url('control/blog/post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @if(!empty($post->image))
                                    <img src="{{ asset('storage/'.$post->image) }}" alt="Image" class="img-responsive margin-bottom" style="width:100%; max-width: 400px; max-height: 200px">
                                @else
                                    <span>Image not found</span>
                                @endif

                                @include('admin.blog.post.form')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <button type="submit" class="btn btn-success btn-block btn-flat">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-4">
                            @include('admin.blog.post.code')
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection


