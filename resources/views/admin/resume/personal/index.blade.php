@extends('admin.layout.master')

@section('title', 'Resume:personal')

@section('currentPage')
   Resume>personal
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.includes.display-message')
        </div>
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom pills-menu">

                @include('admin.resume.menu')

                <div class="tab-content">
                    <div class="row">
                        @empty($personal)
                            <div class="col-sm-10 col-sm-offset-1 margin-bottom">
                                <a href="{{ url('control/resume/personal/create') }}" class="bg-navy btn-add pull-right"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        @endempty

                        @isset($personal)
                        <div class="clearfix col-sm-10 col-sm-offset-1">
                            <div class="box-header">
                                <h3 class="box-title"></h3>
                                <div class="box-tools pull-right mt-5px">
                                    <a href="{{ url('control/resume/personal/'.$personal->id.'/edit') }}" class="label-success btn-action"><i class="fa fa-pencil"></i> Edit</a>
                                 </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                               <table class="table">
                                        <tr>
                                            <th style="width: 250px;">Website resume background</th>
                                            <td>
                                                @if(!empty($personal->bg_image))
                                                    <img src="{{ asset('storage/'.$personal->bg_image) }}" alt="" class="img-responsive" style="width: 200px; height:120px;">
                                                @else
                                                    <span>Image not found</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Resume file</th>
                                            <td>
                                                <div class="pull-left" style="margin-bottom:15px; margin-top:15px;">
                                                    @if(isset($personal->file))
                                                        <strong>File Yes</strong>
                                                        <a href="{{ url('resume/download') }}" class="btn btn-success" title="Resume" style="margin-left: 20px;">
                                                            <i class="fa fa-download"></i> Download </a>
                                                    @else
                                                        <span>No File</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Profile picture</th>
                                            <td><img src="{{ asset('storage/'.$personal->image) }}" alt="" class="img-responsive" style="width:80px;"></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $personal->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $personal->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td>{{ $personal->contact }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $personal->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Objective</th>
                                            <td>{{ $personal->objective }}</td>
                                        </tr>
                                        <tr>
                                            <th>Summary</th>
                                            <td>{{ $personal->summary }}</td>
                                        </tr>
                                        <tr>
                                            <th>Keywords</th>
                                            <td>{{ $personal->keywords }}</td>
                                        </tr>
                                        <tr>
                                            <th>Skills</th>
                                            <td>{{ $personal->skills }}</td>
                                        </tr>
                                    </table>
                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>

@endsection
