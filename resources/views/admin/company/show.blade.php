@extends('admin.layout.master')

@section('title','Details for '.$company->company_name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Details for {{ $company->company_name }}</h3>

                    <div class="box-tools pull-right">
                        <span><a href="{{ url('control/company') }}" class="btn bg-blue btn-back">Back To Company Page <i class="fa fa-mail-reply"></i></a></span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <span class="pull-right">
                        <ul class="custom-ul-design">
                            <li>
                                <a href="{{ url('control/company/'. $company->id. '/edit' ) }}" class="label bg-navy color-palette p__8 f__size__13">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <a href="#" data-company-id="{{ $company->id }}" data-toggle="modal" data-target="#confirm-company-delete" class="label bg-maroon color-palette p__8 f__size__13"><i class="fa fa-trash"></i> Delete</a>
                            </li>

                        </ul>
                    </span>
                    @if(!empty($company->image))
                        <img src="{{ asset('storage/'.$company->image) }}" alt="" class="img-responsive">
                    @else
                        <span>Image not found</span>
                    @endif
                    <p><h3><strong>Name: </strong> {{ $company->company_name }}</h3></p>
                    <p><strong>Address: </strong> {{ $company->address }}</p>
                    <p><strong>Contact: </strong> {{ $company->phone }}</p>
                    <p><strong>Email: </strong> {{ $company->email }}</p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- Modal -->
    @include('admin.company.modal')

@endsection
