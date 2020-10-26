@extends('admin.layout.master')

@section('title','Details for '.$post->title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Details for {{ $post->title }}</h3>

                    <div class="box-tools pull-right">
                        <span class="badge bg-green margin_right_15">{{ $post->is_published == 1 ? 'Publish':'Unpublished' }}</span>
                        <span>
                            <a href="{{ url('control/blog/post') }}" class="btn bg-blue btn-back">Back To post Page <i class="fa fa-mail-reply"></i></a>
                        </span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <span class="pull-right">
                        <ul class="custom-ul-design">
                            <li>
                                <a href="{{ url('control/blog/post/'. $post->id. '/edit' ) }}" class="label bg-navy color-palette p__8 f__size__13">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <a href="#" data-post-id="{{ $post->id }}" data-toggle="modal" data-target="#confirm-post-delete" class="label bg-maroon color-palette p__8 f__size__13"><i class="fa fa-trash"></i> Delete</a>
                            </li>

                        </ul>
                    </span>

                    @if(!empty($post->image))
                        <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-responsive" style="width:100%; max-width: 400px; max-height: 200px">
                    @else
                        <span>Image not found</span>
                    @endif
                    <p><h3><strong>Title: </strong> {{ $post->title }}</h3></p>
                    <p><strong>Slug: </strong> {{ $post->slug }}</p>
                    <p><strong>Description: </strong> {!! $post->description !!} </p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- Modal -->
    @include('admin.blog.post.modal')
@endsection
