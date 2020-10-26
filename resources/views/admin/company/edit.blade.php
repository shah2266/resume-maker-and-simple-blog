@extends('admin.layout.master')

@section('title','Edit details for '.$company->company_name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Edit details for {{ $company->company_name }}</h3>

                    <div class="box-tools pull-right">
                        <span>
                            <a href="{{ url('control/company/') }}" class="btn bg-blue btn-back">Back To Company Page <i class="fa fa-mail-reply"></i></a>
                        </span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <form action="{{ url('control/company/'. $company->id) }} " method="post" enctype="multipart/form-data">
                        @method('PATCH')

                        @if(!empty($company->image))
                            <img src="{{ asset('storage/'.$company->image) }}" alt="" class="img-responsive">
                        @else
                            <span>Image not found</span>
                        @endif

                        @include('admin.company.form')

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Update company</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
