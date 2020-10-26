@extends('admin.layout.master')


@section('title', 'Resume:Personal edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom pills-menu">

                @include('admin.resume.menu')

                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 margin-bottom"><a href="{{ url('control/resume/personal') }}" class="bg-blue btn-back pull-right">Back</a></div>
                        <div class="clearfix col-sm-10 col-sm-offset-1">
                            <form class="form-horizontal" action="{{ url('control/resume/personal/'.$personal->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row" style="border: 1px solid #e8e8e8; margin-bottom: 20px; padding: 10px 0;">
                                            <div class="col-sm-4 text-center">
                                                <strong>Resume breadcrumb background image</strong><br><br>
                                                @if(!empty($personal->bg_image))
                                                    <img src="{{ asset('storage/'.$personal->bg_image) }}" alt="" class="img-responsive" style="width: 200px; height:120px; margin:auto;">
                                                @else
                                                    <span>Image not found</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <strong>Resume pdf file</strong><br><br>
                                                @if(isset($personal->file))
                                                    <strong>File Yes</strong>
                                                    <a href="{{ url('resume/download') }}" class="btn btn-success" title="Resume">
                                                        <i class="fa fa-download"></i> Download </a>
                                                @else
                                                    <span>No File</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <strong>Profile picture</strong><br><br>
                                                @if(!empty($personal->image))
                                                    <img src="{{ asset('storage/'.$personal->image) }}" alt="" class="img-responsive" style="width: 200px; height:120px; margin:auto;">
                                                @else
                                                    <span>Image not found</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include('admin.resume.personal.form')

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
        </div>
    </div>
@endsection
