@extends('admin.layout.master')

@section('title', 'Blog page')

@section('currentPage','Blog page')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">

            <div class="box-header with-border">
                <h3 class="box-title">Blog page setting</h3>

                <div class="box-tools pull-right">
                    @empty($content)
                        <span><a href="{{ url('control/blog/page/create') }}" class="btn bg-navy btn-add"><i class="fa fa-plus"></i> Add</a></span>
                    @endempty
                    @isset($content)
                        <span><a href="{{ url('control/blog/page/'.$content->id.'/edit') }}" class="btn label-success btn-action"><i class="fa fa-pencil"></i> Edit</a></span>
                    @endisset
                </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.includes.display-message')
                @isset($content)
                    <div class="box-body no-padding" id="contact-layout">
                        <div class="hero-breadcrumbs" @isset($content->image) style="background-image: url( {{ asset('storage/'. $content->image) }} )" @endisset >
                            @if(!empty($content->page_title)) <h2>{{ $content->page_title }}</h2> @endif
                            @if(!empty($content->description))<p>{{$content->description}}</p>@endif
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
