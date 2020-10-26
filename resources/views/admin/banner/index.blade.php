@extends('admin.layout.master')

@section('title','Banner')
@section('currentPage','Banner')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Banner Information</h3>

                    <div class="box-tools pull-right">
                        <span><a href="banner/create" class="btn bg-navy btn-add"><i class="fa fa-plus"></i> Add banner Info</a></span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <strong>Select banner active type: </strong>
                    <input data-id="1" class="toggle-class" type="checkbox" data-onstyle="success"
                           data-offstyle="danger" data-toggle="toggle" data-on="Slider"
                           data-off="Image" {{ $bannerType->status ? 'checked' : '' }}>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <h4>Slider <span class="badge bg-green">{{ count($sliders) }}</span></h4>
                            <table class="table table-hover table-striped table-condensed">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>

                                @foreach($sliders as $key=>$slider)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td>
                                            @if(!empty($slider->image))
                                                <img src="{{ asset('storage/'.$slider->image) }}" alt="Banner" class="image__resize img-responsive">
                                            @else
                                                <span>Image not found</span>
                                            @endif
                                        </td>
                                        <td>{{ $slider->name }}</td>
                                        <td>{{ $slider->banner_type }}</td>
                                        <td><span class="badge bg-green">{{ $slider->status }}</span></td>

                                        <td style="text-align: center">
                                            <div class="btn-group">
                                                <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                                    <span class="fa fa-ellipsis-h"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <li>
                                                        <a href="{{ url('control/banner/'. $slider->id. '/edit' ) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('control/banner/'. $slider->id) }}"> <i class="fa fa-eye"></i> View details</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-banner-id="{{ $slider->id }}" data-toggle="modal" data-target="#confirm-banner-delete"><i class="fa fa-trash"></i> Delete this info</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <h4>Image <span class="badge bg-green">{{ count($images) }}</span></h4>
                            <table class="table table-hover table-striped table-condensed">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>

                                @foreach($images as $key=>$image)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td>
                                            @if(!empty($image->image))
                                                <img src="{{ asset('storage/'.$image->image) }}" alt="Banner" class="image__resize img-responsive">
                                            @else
                                                <span>Image not found</span>
                                            @endif
                                        </td>
                                        <td>{{ $image->name }}</td>
                                        <td>{{ $image->banner_type }}</td>
                                        <td><span class="badge bg-green">{{ $image->status }}</span></td>

                                        <td style="text-align: center">
                                            <div class="btn-group">
                                                <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                                    <span class="fa fa-ellipsis-h"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <li>
                                                        <a href="{{ url('control/banner/'. $image->id. '/edit' ) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('control/banner/'. $image->id) }}"> <i class="fa fa-eye"></i> View details</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-banner-id="{{ $image->id }}" data-toggle="modal" data-target="#confirm-banner-delete"><i class="fa fa-trash"></i> Delete this info</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <!-- Modal -->
    @if(isset($slider->id) OR isset($image->id))
        @include('admin.banner.modal')
    @endif

@endsection
