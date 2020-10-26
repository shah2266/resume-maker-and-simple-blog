@extends('admin.layout.master')

@section('title','Edit details for '.$content->page_title)

@section('currentPage', 'Edit')

@section('content')
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Edit details for {{ $content->page_title }}</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right">
                    <a href="{{ url('control/contact/page/index') }}" class="bg-blue btn-back">Back
                        <i class="fa fa-mail-reply"></i>
                    </a>
                </span>
            </span>
        </div>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="clearfix col-sm-10 col-sm-offset-1">
                <form class="form-horizontal" action="{{ url('control/blog/page/'. $content->id) }} " method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            @if(!empty($content->image))
                                <img src="{{ asset('storage/'.$content->image) }}" alt="" class="slider_img1">
                            @else
                                <span>Image not found</span>
                            @endif
                        </div>
                    </div>

                    @include('admin.blog.page.form')

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <div class="submit-btn">
                                <button type="submit" class="btn btn-success btn-flat">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
