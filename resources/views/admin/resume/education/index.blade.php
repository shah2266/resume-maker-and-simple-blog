@extends('admin.layout.master')

@section('title', 'Resume-education')

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
                        <div class="col-sm-10 col-sm-offset-1 margin-bottom"><a href="{{ url('control/resume/education/create') }}" class="bg-navy btn-add pull-right"><i class="fa fa-plus"></i> Add</a></div>
                        <div class="clearfix col-sm-10 col-sm-offset-1">
                            @foreach($educations as $key => $education)
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">{{ 'Education: '.($key+1) }}</h3>
                                        <div class="box-tools pull-right mt-5px">
                                            <a href="{{ url('control/resume/education/'.$education->id.'/edit') }}" class="label-success btn-action"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" data-education-id="{{ $education->id }}" data-toggle="modal" data-target="#confirm-education-delete" class="label-danger btn-action"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table">
                                            <tr>
                                                <th>Degree title</th>
                                                <td>{{ $education->degree_title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Concentration</th>
                                                <td>{{ $education->concentration }}</td>
                                            </tr>
                                            <tr>
                                                <th>Institute name</th>
                                                <td>{{ $education->institute_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Grade point</th>
                                                <td>{{ $education->grade_point }}</td>
                                            </tr>
                                            <tr>
                                                <th>Year of passing</th>
                                                <td>{{ $education->year_of_passing }}</td>
                                            </tr>
                                            <tr>
                                                <th>Duration</th>
                                                <td>{{ $education->duration }}</td>
                                            </tr>
                                            <tr>
                                                <th>Thesis</th>
                                                <td>{{ $education->thesis }}</td>
                                            </tr>
                                            <tr>
                                                <th>Achievement</th>
                                                <td>{{ $education->achievement }}</td>
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
    @isset($education->id)
        @include('admin.resume.education.modal')
    @endisset
@endsection
