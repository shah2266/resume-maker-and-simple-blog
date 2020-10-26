@extends('admin.layout.master')

@section('title', 'Resume-professional')

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
                        <div class="col-sm-10 col-sm-offset-1 margin-bottom"><a href="{{ url('control/resume/professional/create') }}" class="bg-navy btn-add pull-right"><i class="fa fa-plus"></i> Add</a></div>
                        <div class="clearfix col-sm-10 col-sm-offset-1">
                            @foreach($professionals as $key => $professional)
                                <div class="box ">
                                    <div class="box-header">
                                        <h3 class="box-title">{{ 'Professional: '.($key+1) }}</h3>
                                        <div class="box-tools pull-right mt-5px">
                                            <a href="{{ url('control/resume/professional/'.$professional->id.'/edit') }}" class="btn-action label-success"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" data-professional-id="{{ $professional->id }}" data-toggle="modal" data-target="#confirm-professional-delete" class="btn-action label-danger"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table">
                                            <tr>
                                                <th>Company name</th>
                                                <td>{{ $professional->company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Designation</th>
                                                <td>{{ $professional->designation }}</td>
                                            </tr>
                                            <tr>
                                                <th>Department</th>
                                                <td>{{ $professional->department }}</td>
                                            </tr>
                                            <tr>
                                                <th>Responsibilities</th>
                                                <td>{{ $professional->responsibilities }}</td>
                                            </tr>
                                            <tr>
                                                <th>Employment period</th>
                                                <td>{{ $professional->employment_period }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $professional->address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @isset($professional->id)
        @include('admin.resume.professional.modal')
    @endisset
@endsection
