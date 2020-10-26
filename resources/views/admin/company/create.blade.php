@extends('admin.layout.master')

@section('title','Add company')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Add new company</h3>

                    <div class="box-tools pull-right">
                        <span>
                            <a href="{{ url('control/company') }}" class="btn bg-blue btn-back">Back To Company Page <i class="fa fa-mail-reply"></i></a>
                        </span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <form action="{{ url('control/company') }}" method="POST" enctype="multipart/form-data">
                        @include('admin.company.form')

                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <button type="submit" class="btn btn-success btn-block btn-flat">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
