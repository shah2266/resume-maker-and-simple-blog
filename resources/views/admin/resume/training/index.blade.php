@extends('admin.layout.master')

@section('title', 'Resume-training')

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
                        <div class="col-sm-10 col-sm-offset-1 margin-bottom"><a href="{{ url('control/resume/training/create') }}" class="bg-navy btn-add pull-right"><i class="fa fa-plus"></i> Add</a></div>
                        <div class="clearfix col-sm-10 col-sm-offset-1">
                            @foreach($trainings as $key => $training)
                                <div class="box ">
                                    <div class="box-header">
                                        <h3 class="box-title">{{ 'Training: '.($key+1) }}</h3>
                                        <div class="box-tools pull-right mt-5px">
                                            <a href="{{ url('control/resume/training/'.$training->id.'/edit') }}" class="btn-action label-success"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" data-training-id="{{ $training->id }}" data-toggle="modal" data-target="#confirm-training-delete" class="btn-action label-danger"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table">
                                            <tr>
                                                <th>Training title</th>
                                                <td>{{ $training->training_title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Topics covered</th>
                                                <td>{{ $training->topics_covered }}</td>
                                            </tr>
                                            <tr>
                                                <th>institute</th>
                                                <td>{{ $training->institute }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $training->address }}</td>
                                            </tr>
                                            <tr>
                                                <th>Training year</th>
                                                <td>{{ $training->training_Year }}</td>
                                            </tr>
                                            <tr>
                                                <th>Duration</th>
                                                <td>{{ $training->duration }}</td>
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
    @isset($training->id)
        @include('admin.resume.training.modal')
    @endisset
@endsection
