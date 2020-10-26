@extends('admin.layout.master')

@section('title','Add banner')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Banner Add Section</h3>
            <div class="box-tools pull-right">
                <span class="btn btn-box-tool">
                    <span class="pull-right">
                        <a href="{{ url('control/banner') }}" class="bg-blue btn-back">
                            Back To Banner Page <i class="fa fa-mail-reply"></i>
                        </a>
                    </span>
                </span>
            </div>
        </div>

        <div class="box-body">
             <form action="{{ url('control/banner') }}" method="POST" enctype="multipart/form-data">
                @include('admin.banner.form')

                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
