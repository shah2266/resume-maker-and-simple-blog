@extends('admin.layout.master')

@section('title', 'Blog category')

@section('currentPage', 'Category')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title" id="category-header">Category</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <!--Category add form-->
                    <div class="col-sm-5">
                        <form id="categoryForm" name="categoryForm" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="category_id" id="category_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" maxlength="255" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="" maxlength="255" required="">
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
                                <label class="col-sm-2 control-label" for="status">Select Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control " id="status" name="status" style="width: 100%;" required="">
                                        <option value="1">Publish</option>
                                        <option value="0">Unpublished</option>
                                    </select>
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

                    <!--Category display-->
                    <div class="col-sm-7" id="category-table">
                        <span class="message"></span>
                        <table class="table table-bordered" id="category-data-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection

