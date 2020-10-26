@extends('admin.layout.master')

@section('title', 'Contact')

@section('currentPage','Contact')

@section('content')

{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="box box-solid">--}}

{{--                <div class="box-header with-border">--}}
{{--                    <h3 class="box-title">Heading</h3>--}}

{{--                    <div class="box-tools pull-right">--}}
{{--                        <span data-toggle="tooltip" title="{{ '4' }} message found" class="badge bg-yellow margin_right_15">{{ '4 message' }}</span>--}}
{{--                        <span><a href="" class="btn bg-navy btn-add"><i class="fa fa-plus"></i> Add</a></span>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <!-- /.box-header -->--}}
{{--                <div class="box-body">--}}
{{--                    @include('admin.includes.display-message')--}}
{{--                </div>--}}
{{--                <!-- /.box-body -->--}}
{{--            </div>--}}
{{--            <!-- /.box -->--}}
{{--        </div>--}}
{{--    </div>--}}


<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">

            <div class="box-header with-border">
                <h3 class="box-title">Contact message</h3>

                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="{{ count($contacts) }} message found" class="badge bg-yellow margin_right_15">{{ count($contacts).' message' }}</span>
                    <span><a href="#" class="btn bg-red btn-add" title="Delete all messages" data-contact-id="{{ 'truncate' }}" data-contact-clear="clear" data-toggle="modal" data-target="#confirm-contact-delete"><i class="fa fa-trash"></i> Delete all</a></span>
                </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.includes.display-message')
                <table class="table table-hover table-striped table-condensed">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th style="text-align:center;">Action</th>
                    </tr>

                    @foreach($contacts as $key=>$contact)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>

                            <td style="text-align: center">
                                <div class="btn-group">
                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="fa fa-ellipsis-h"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li>
                                            <a href="{{ url('control/contact/'. $contact->id) }}"> <i class="fa fa-eye"></i> View details</a>
                                        </li>
                                        <li>
                                            <a href="#" data-contact-id="{{ $contact->id }}" data-toggle="modal" data-target="#confirm-contact-delete"><i class="fa fa-trash"></i> Delete this info</a>
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

<!-- Modal -->
@isset($contact->id)
    @include('admin.contact.modal')
@endisset

@endsection
