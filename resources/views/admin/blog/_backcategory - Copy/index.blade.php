@extends('admin.layout.master')

@section('title', 'Blog category')

@section('currentPage', 'Category')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.includes.display-message')
        </div>
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border btn-force">
                    <h3 class="box-title" style="margin-left: 15px">Category</h3>
                </div>

                <div class="box-body">
                    <div class="col-sm-5">
                        <form action="{{ url('control/blog/category') }}" method="POST">
                            @include('admin.blog.category.form')
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix col-sm-7">
                        <!-- /.box-header -->
                        <div class="box-body no-padding" id="contact-layout">
                            <table class="table table-hover table-striped table-condensed">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>

                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <div class="margin">
                                                <span class="badge bg-green">{{ $category->status }}</span>
                                            </div>
                                        </td>

                                        <td style="min-width:120px; text-align:center;">
                                            <div class="margin">
                                                <div class="btn-group">
                                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                                        <span class="fa fa-ellipsis-h"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <li>
                                                            <a href="{{ url('control/banner/'. $category->id. '/edit' ) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('control/banner/'. $category->id) }}"> <i class="fa fa-eye"></i> View details</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-banner-id="{{ $category->id }}" data-toggle="modal" data-target="#confirm-banner-delete"><i class="fa fa-trash"></i> Delete this info</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

