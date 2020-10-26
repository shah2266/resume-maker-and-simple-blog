@extends('admin.layout.master')


@section('title', 'Resume:training create')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom pills-menu">
                @include('admin.resume.menu')

                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 margin-bottom"><a href="{{ url('control/resume/training') }}" class="bg-blue btn-back pull-right">Back</a></div>
                        <div class="clearfix col-sm-10 col-sm-offset-1">
                            <form class="form-horizontal" action="{{ url('control/resume/training') }}" method="POST" enctype="multipart/form-data">

                                @include('admin.resume.training.form')

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="submit-btn">
                                            <button type="submit" class="btn btn-success btn-flat">Save</button>
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
