@extends('admin.layout.master')

@section('title','Details for '.$banner->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Details for {{ $banner->name }}</h3>

                    <div class="box-tools pull-right">
                        <span class="badge bg-green margin_right_15">{{ $banner->status }}</span>
                        <span>
                            <a href="{{ url('control/banner') }}" class="btn bg-blue btn-back">Back To banner Page <i class="fa fa-mail-reply"></i></a>
                        </span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <span class="pull-right">
                        <ul class="custom-ul-design">
                            <li>
                                <a href="{{ url('control/banner/'. $banner->id. '/edit' ) }}" class="label bg-navy color-palette p__8 f__size__13">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <a href="#" data-banner-id="{{ $banner->id }}" data-toggle="modal" data-target="#confirm-banner-delete" class="label bg-maroon color-palette p__8 f__size__13"><i class="fa fa-trash"></i> Delete</a>
                            </li>
                        </ul>
                    </span>

                    <!--Description area-->
                    @if(!empty($banner->image))
                        <img src="{{ asset('storage/'.$banner->image) }}" alt="" class="slider_img1">
                    @else
                        <span>Image not found</span>
                    @endif

                    <p><h3>{{ $banner->heading }}</h3></p>
                    <p>{{ strip_tags($banner->description ) }}</p>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <p><strong>Type: </strong> {{ $banner->banner_type }} | <strong>Status: </strong> {{ $banner->status }}</p>
                </div>
                <!-- /.box-footer-->

            </div>
            <!-- /.box -->
        </div>
    </div>

    <!-- Modal -->
    @include('admin.banner.modal')

@endsection
