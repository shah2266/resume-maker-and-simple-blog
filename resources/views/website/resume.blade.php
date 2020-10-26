@extends('website.layouts.master')

@section('title', 'Home')

@section('main-content')
    @include('website.includes.resume-part')

<div id="main">
    <section id="resume-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 summary">
                    <h2 class="text-center text-uppercase mb-4">Summary</h2>
                    <p>{{ $personal->summary }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12 skill">
                    <h2 class="text-center text-uppercase mb-4">Key Skills</h2>
                </div>
                <div class="col-xl-6">
                    <ul>
                        {!! $slot_1 !!}
                    </ul>
                </div>
                @if($slot_2 != '')
                <div class="col-xl-6">
                    <ul>
                        {!! $slot_2 !!}
                    </ul>
                </div>
                @endif
            </div>
            <hr>

            <div class="row">
                <div class="col-xl-12 skill">
                    <h2 class="text-center text-uppercase mb-4">Professional Experience</h2>
                </div>

                {!! $professional !!}

            </div> <!--Professional End-->
            <hr>

            @if(count($educations) > 0)
            <div class="row">
                <div class="col-xl-12 skill">
                    <h2 class="text-center text-uppercase mb-4">Education</h2>
                </div>
                @foreach($educations as $key => $education)
                <div class="col-xl-12 mb-5">
                    <div class="pro-header clearfix">
                        <div class="float-left">
                            <strong>{{ $education->institute_name }}</strong>
                        </div>
                        <div class="float-right">
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
                    <div class="col-xl-12 skill">
                        <h2 class="text-center text-uppercase mb-4">Training</h2>
                    </div>
                    @foreach($trainings as $key => $training)
                        <div class="col-xl-12 mb-5">
                            <div class="pro-header clearfix">
                                <div class="float-left">
                                    <strong>{{ $training->institute }}</strong>
                                </div>
                                <div class="float-right">
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

                </div> <!--Education End-->
            @endif

        </div>
    </section>
</div>
@endsection
