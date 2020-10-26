@extends('admin.layout.master')


@section('title', 'Resume:Education edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom pills-menu">

                @include('admin.resume.menu')
                <div class="tab-content">
                    <div class="row margin-bottom">
{{--                        <div class="col-sm-8 text-center">--}}
{{--                            <span class="text-danger"> <code>*</code> Marks fields are required</span>--}}
{{--                        </div>--}}
                        <div class="col-sm-10 col-sm-offset-1 text-right">
                            <a href="{{ url('control/resume/education') }}" class="bg-blue btn-back pull-right">Back</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="clearfix col-sm-10 col-sm-offset-1">
                            <form class="form-horizontal" action="{{ url('control/resume/education/'.$education->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')

                                @include('admin.resume.education.form')
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
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
