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
                    <h3 class="box-title" style="margin-left: 15px" id="modelHeading">Create New Tag</h3>
                </div>

                <div class="box-body">
                    <div class="col-sm-5">
                        <form id="tagForm" name="tagForm" method="POST" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="tag_id" id="tag_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" required="" placeholder="Enter description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="submit-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix col-sm-7">
                        <!-- /.box-header -->
                        <div class="box-body no-padding" id="tag">
                            <a class="btn btn-success" href="javascript:void(0)" id="createNewTag"> Create New Customer</a>
                            <table class="table table-bordered" id="data-table">
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

    {{--    <div class="modal fade" id="tagModal">--}}
    {{--        <div class="modal-dialog">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span></button>--}}
    {{--                    <h4 class="modal-title" id="modelHeading"></h4>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    <form id="tagForm" name="tagForm" class="form-horizontal">--}}
    {{--                        @csrf--}}
    {{--                        <input type="hidden" name="tag_id" id="tag_id">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="name" class="col-sm-2 control-label">Name</label>--}}
    {{--                            <div class="col-sm-10">--}}
    {{--                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label for="name" class="col-sm-2 control-label">Slug</label>--}}
    {{--                            <div class="col-sm-10">--}}
    {{--                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="" maxlength="50" required="">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label class="col-sm-2 control-label" for="description">Description</label>--}}
    {{--                            <div class="col-sm-10">--}}
    {{--                                <textarea id="description" name="description" required="" placeholder="Enter description" class="form-control"></textarea>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
    {{--                    <button type="submit" class="btn btn-success" id="saveBtn" value="create"><i class="fa fa-save"></i> Save changes</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection

