@extends('admin.layout.master')

@section('title', 'Blog category')

@section('currentPage', 'Category')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Post manage</h3>

                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="{{ count($posts) }} posts found" class="badge bg-yellow margin_right_15">{{ count($posts).' posts' }}</span>
                        <span><a href="{{ url('control/blog/post/create') }}" class="btn bg-navy btn-add" id="create-new-post"><i class="fa fa-plus"></i> Add new post</a></span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body" id="contact-layout">
                    @include('admin.includes.display-message')
                    <table class="table table-hover table-striped table-condensed">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Image</th>
                            <th>Post title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th style="text-align:center;">Action</th>
                        </tr>

                        @foreach($posts as $key=>$post)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if(!empty($post->image))
                                        <img src="{{ asset('storage/'.$post->image) }}" alt="" class="image__resize img-responsive">
                                    @else
                                        <span>Image not found</span>
                                    @endif
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ str_replace('-',' ',$post->slug) }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td><span class="badge bg-green">{{ $post->is_published == 1 ? 'Publish':'Unpublished' }}</span></td>
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="fa fa-ellipsis-h"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li>
                                                <a href="{{ url('control/blog/post/'. $post->id. '/edit' ) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('control/blog/post/'. $post->id) }}"> <i class="fa fa-eye"></i> View details</a>
                                            </li>
                                            <li>
                                                <a href="#" data-post-id="{{ $post->id }}" data-toggle="modal" data-target="#confirm-post-delete"><i class="fa fa-trash"></i> Delete this info</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    @isset($post->id)
        @include('admin.blog.post.modal')
    @endisset

@endsection

