@extends('admin.layout.master')

@section('title', 'Blog tag')

@section('currentPage', 'Tag')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.includes.display-message')
        </div>
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border btn-force">
                    <h3 class="box-title" style="margin-left: 15px" id="tag-header">Tag</h3>
                </div>

                <div class="box-body">
                    <div class="col-sm-5">
                        <form id="tagForm" name="tagForm" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="tag_id" id="tag_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="" maxlength="50" required="">
                                    <span id="error_slug" class="error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" placeholder="Enter description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="submit-btn">
                                        <button type="submit" class="btn btn-success btn-flat" name="submit" id="btn-save" value="create">Save</button>
                                        <a id="cancel" class="btn btn-danger" style="display: none">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix col-sm-7">
                        <div class="box-body no-padding" id="tag-table">
                            <table class="table table-bordered" id="tag-data-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

