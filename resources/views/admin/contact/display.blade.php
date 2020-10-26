@extends('admin.layout.master')

@section('title', 'Contact page')

@section('currentPage')
    Contact page
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">

            <div class="box-header with-border">
                <h3 class="box-title">Contact page setting</h3>

                <div class="box-tools pull-right">
                    @empty($pageContent)
                        <span><a href="{{ url('control/contact/page/add') }}" class="btn bg-navy btn-add"><i class="fa fa-plus"></i> Add</a></span>
                    @endempty
                    @isset($pageContent)
                        <span><a href="{{ url('control/contact/page/'.$pageContent->id.'/edit') }}" class="btn label-success btn-action"><i class="fa fa-pencil"></i> Edit</a></span>
                    @endisset
                </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.includes.display-message')

                @isset($pageContent)
                    <div class="box-body no-padding" id="contact-layout">
                        <div class="hero-breadcrumbs" @isset($pageContent->image) style="background-image: url( {{ asset('storage/'. $pageContent->image) }} )" @endisset >
                            @if(!empty($pageContent->page_title)) <h2>{{ $pageContent->page_title }}</h2> @endif
                            @if(!empty($pageContent->description))<p>{{$pageContent->description}}</p>@endif
                        </div>

                        <div class="row info-area">
                            <div class="col-sm-4">
                                <div class="info-box">
                                    <i class="ion-ios-location-outline"></i>
                                    <h3>Address</h3>
                                    @isset($pageContent->address)
                                        <p>{{ $pageContent->address }}</p>
                                    @endisset
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="info-box">
                                    <i class="ion-ios-email-outline"></i>
                                    <h3>Email</h3>
                                    @isset($pageContent->email)
                                        <p>{{ $pageContent->email }}</p>
                                    @endisset
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="info-box">
                                    <i class="ion-ios-telephone-outline"></i>
                                    <h3>Call</h3>
                                    @isset($pageContent->contact)
                                        <p>{{ $pageContent->contact }}</p>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
