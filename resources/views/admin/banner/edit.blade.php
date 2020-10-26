@extends('admin.layout.master')

@section('title','Edit details for '.$banner->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Edit details for {{ $banner->name }}</h3>

                    <div class="box-tools pull-right">
                        <span>
                            <a href="{{ url('control/banner/') }}" class="btn bg-blue btn-back">Back To Banner Page <i class="fa fa-mail-reply"></i></a>
                        </span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <form action="{{ url('control/banner/'. $banner->id) }} " method="post" enctype="multipart/form-data">
                        @method('PATCH')

                        @if(!empty($banner->image))
                            <img src="{{ asset('storage/'.$banner->image) }}" alt="" class="slider_img1">
                        @else
                            <span>Image not found</span>
                        @endif

                        @include('admin.banner.form')

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Update banner</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
