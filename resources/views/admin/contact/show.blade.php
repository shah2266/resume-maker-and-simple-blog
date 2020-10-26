@extends('admin.layout.master')

@section('title','Details for '.$contact->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title">Details for {{ $contact->subject }}</h3>

                    <div class="box-tools pull-right">
                        <span>
                            <a href="{{ url('control/contact') }}" class="btn bg-blue btn-back">Back To contact Page <i class="fa fa-mail-reply"></i></a>
                        </span>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">

                    <p><h3>Name: {{ $contact->name }}</h3></p>
                    <p><strong>Name: {{ $contact->email }}</strong></p>
                    <p><strong>Subject: {{ $contact->subject }}</strong></p>
                    <p>{{ strip_tags($contact->message ) }}</p>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
