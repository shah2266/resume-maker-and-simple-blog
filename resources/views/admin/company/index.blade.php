@extends('admin.layout.master')

@section('title', 'Company')
@section('currentPage', 'Company')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>

                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="{{ count($companies) }} record found" class="badge bg-yellow margin_right_15">{{ count($companies).' company' }}</span>
                        <span><a href="company/create" class="btn bg-navy btn-add"><i class="fa fa-plus"></i> Add Company Info</a></span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.includes.display-message')
                    <table class="table table-hover table-striped table-condensed">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th style="text-align:center;">Action</th>
                        </tr>

                        @foreach($companies as $key=>$company)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>
                                    @if(!empty($company->image))
                                        <img src="{{ asset('storage/'.$company->image) }}" alt="" class="image__resize img-responsive">
                                    @else
                                        <span>Image not found</span>
                                    @endif
                                </td>
                                <td>{{ $company->company_name }}</td>
                                <td>
                                    {{ $company->address }}<br>
                                    <a href="{{ $company->social_link1 }}" target="_blank" >{{ $company->social_link1 }}</a><br>
                                    <a href="{{ $company->social_link2 }}" target="_blank" >{{ $company->social_link2 }}</a><br>
                                    <a href="{{ $company->social_link3 }}" target="_blank" >{{ $company->social_link3 }}</a><br>
                                    <a href="{{ $company->social_link4 }}" target="_blank" >{{ $company->social_link4 }}</a>
                                </td>
                                <td>
                                    {{ $company->phone }}<br>
                                    {{ $company->email }}
                                </td>
                                <td>
                                    {{ 'Latitude: '.$company->latitude }}<br>
                                    {{ 'Longitude: '.$company->longitude }}<br>
                                    {{ 'Map Content: '.$company->map_content }}
                                </td>
                                <td><span class="badge bg-green">{{ $company->status }}</span></td>
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="fa fa-ellipsis-h"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li>
                                                <a href="{{ url('control/company/'. $company->id. '/edit' ) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('control/company/'. $company->id) }}"> <i class="fa fa-eye"></i> View details</a>
                                            </li>
                                            <li>
                                                <a href="#" data-company-id="{{ $company->id }}" data-toggle="modal" data-target="#confirm-company-delete"><i class="fa fa-trash"></i> Delete this info</a>
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
    @isset($company->id)
    @include('admin.company.modal')
    @endisset

@endsection
