@extends('admin.layout.master')

@section('title', 'Resume-basic')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom pills-menu">
                @include('admin.resume.menu')

                @if(!empty($personal))
                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1" id="hero-banner" style="background-image: url( {{ asset('storage/'.$personal->bg_image ?? 'asdf') }} )">
                            <div class="profile">
                                <div class="profile-img">
                                    <img src="{{ asset('storage/'.$personal->image) }}" alt="profile">
                                </div>
                                <h2 class="animate__animated animate__fadeInDown">{{ $personal->name }}</h2>
                                <p class="animate__animated animate__fadeInUp">{{ $personal->keywors }}</p>

                                @if(isset($personal->file))
                                    <a href="{{ url('resume/download') }}" class="resume-download-btn" title="Resume" style="margin-left: 20px;">
                                        <i class="fa fa-download"></i> Download </a>
                                @endif
                                @if(!empty($personal->file))
                                    <a href="{{ asset('storage/'.$personal->file) }}" target="_blank" class="resume-download-btn"><i class="fa fa-eye"></i>{{ 'View resume' }}</a>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">

                            <!-- Summary -->
                            <div class="summary">
                                <h2 class="text-center text-uppercase">Summary</h2>
                                <p>{{ $personal->summary }}</p>
                            </div>

                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                            <!-- Skills -->
                            <div class="row">
                                <div class="col-sm-12 skill">
                                    <h2 class="text-center text-uppercase">Key Skills</h2>
                                </div>
                                <div class="col-sm-6">
                                    <ul>
                                        {!! $slot_1 !!}
                                    </ul>
                                </div>
                                @if($slot_2 != '')
                                    <div class="col-sm-6">
                                        <ul>
                                            {!! $slot_2 !!}
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-sm-12 skill">
                                    <h2 class="text-center text-uppercase">Professional Experience</h2>
                                </div>

                                {!! $professional !!}

                            </div> <!--Professional End-->

                            @if(count($educations) > 0)
                                <div class="row">
                                    <div class="col-sm-12 skill">
                                        <h2 class="text-center text-uppercase">Education</h2>
                                    </div>
                                    @foreach($educations as $key => $education)
                                        <div class="col-sm-12 margin-bottom">
                                            <div class="pro-header clearfix">
                                                <div class="pull-left">
                                                    <strong>{{ $education->institute_name }}</strong>
                                                </div>
                                                <div class="pull-right">
                                                    <strong>{{ $education->year_of_passing }}</strong>
                                                </div>
                                            </div>

                                            <div class="pro-body">
                                                <span><strong>{{ $education->degree_title }}</strong> {{ $education->concentration }}</span><br><br>
                                                @isset($education->thesis)
                                                    <span><strong>Thesis:</strong> {{ $education->thesis }} </span><br>
                                                @endisset

                                                @isset($education->achievement)
                                                    <span><strong>Achievement:</strong> {{ $education->achievement }} </span><br>
                                                @endisset
                                            </div>

                                        </div>
                                    @endforeach

                                </div> <!--Education End-->
                            @endif

                            @if(count($trainings) > 0)
                                <div class="row">
                                    <div class="col-sm-12 skill">
                                        <h2 class="text-center text-uppercase">Training</h2>
                                    </div>
                                    @foreach($trainings as $key => $training)
                                        <div class="col-sm-12 margin-bottom">
                                            <div class="pro-header clearfix">
                                                <div class="pull-left">
                                                    <strong>{{ $training->institute }}</strong>
                                                </div>
                                                <div class="pull-right">
                                                    <strong>{{ $training->training_Year}} @isset($training->topics_covered) {{ ' | Duration: '. $training->duration  }} @endisset</strong>
                                                </div>
                                            </div>

                                            <div class="pro-body">
                                                @isset($training->topics_covered)
                                                    <span><strong>Topics covered:</strong> {{ $training->topics_covered }} </span><br>
                                                @endisset

                                                @isset($training->achievement)
                                                    <span><strong>Achievement:</strong> {{ $training->achievement }} </span><br>
                                                @endisset
                                            </div>

                                        </div>
                                    @endforeach

                                </div> <!--Training End-->
                            @endif
                        </div>
                    </div>
                </div>
                @else
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1 margin-bottom">
                                <a href="{{ url('control/resume/personal/create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
