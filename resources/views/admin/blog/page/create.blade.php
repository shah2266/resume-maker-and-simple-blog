@extends('admin.layout.master')

@section('title','Contact page')

@section('currentPage', 'Add')

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Contact page content setting</h3>
            <div class="box-tools pull-right">
                <span class="btn btn-box-tool">
                    <span class="pull-right">
                        <a href="{{ url('control/contact/page/index') }}" class="bg-blue btn-back">
                            Back To Banner Page <i class="fa fa-mail-reply"></i>
                        </a>
                    </span>
                </span>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="clearfix col-sm-10 col-sm-offset-1">
                    <form class="form-horizontal" action="{{ url('control/blog/page') }}" method="POST" enctype="multipart/form-data">
                        @include('admin.blog.page.form')

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
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
@endsection
