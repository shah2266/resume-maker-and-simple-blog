@extends('website.layouts.master')

@section('title', 'Contact')

@section('main-content')
    <!-- Hero breadcrumbs -->
    <section id="hero-breadcrumbs" class="d-flex justify-cntent-center align-items-center" @isset($contact->image) style="background-image: url( {{ asset('storage/'. $contact->image) }} )" @endisset>
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    @if(!empty($contact->page_title)) <h2 class="animate__animated animate__fadeInDown">{{ $contact->page_title }}</h2> @endif
                    @if(!empty($contact->description))<p class="animate__animated animate__fadeInUp">{{$contact->description}}</p>@endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero No Slider Section -->

    <section class="contact" class="section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row mb-5">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box2">
                                <h3>Social link</h3>
                                <div class="social-links mt-4">
                                    @if(!empty($company->social_link_icon_1))
                                        <a href="{{ $company->social_link1 }}" target="_blank"><i class="{{ $company->social_link_icon_1 }}"></i></a>
                                    @endif

                                    @if(!empty($company->social_link_icon_2))
                                        <a href="{{ $company->social_link2 }}" target="_blank"><i class="{{ $company->social_link_icon_2 }}"></i></a>
                                    @endif

                                    @if(!empty($company->social_link_icon_3))
                                        <a href="{{ $company->social_link3 }}" target="_blank"><i class="{{ $company->social_link_icon_3 }}"></i></a>
                                    @endif

                                    @if(!empty($company->social_link_icon_4))
                                        <a href="{{ $company->social_link4 }}" target="_blank"><i class="{{ $company->social_link_icon_4 }}"></i></a>
                                    @endif

                                    @if(!empty($company->social_link_icon_5))
                                        <a href="{{ $company->social_link5 }}" target="_blank"><i class="{{ $company->social_link_icon_5 }}"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="ion-ios-location-outline"></i>
                                <h3>Address</h3>
                                @isset($contact->address)
                                <p>{{ $contact->address }}</p>
                                @endisset
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="ion-ios-email-outline"></i>
                                <h3>Email</h3>
                                @isset($contact->email)
                                    <p>{{ $contact->email }}</p>
                                @endisset
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="ion-ios-telephone-outline"></i>
                                <h3>Call</h3>
                                @isset($contact->contact)
                                    <p>{{ $contact->contact }}</p>
                                @endisset
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <form action="{{ url('contact/send') }}" method="post" id="contact_form">
                        @csrf
                        @if( $message = Session::get('success'))
                            <div class="mb-3" id="message">
                                <div class="sent-message">{{ $message }}</div>
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{ old('name') }}" />

                                <div class="{{ $errors->has('name') ? ' error':'' }}">
                                    @if ($errors->has('name'))
                                        <strong>{{ $errors->first('name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}"/>
                                <div class="{{ $errors->has('email') ? ' error': '' }}">
                                    @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}"/>
                            <div class="{{ $errors->has('subject') ? ' error': '' }}">
                                @if ($errors->has('subject'))
                                    <strong>{{ $errors->first('subject') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" placeholder="Message">{{ old('message') }}</textarea>
                            <div class="{{ $errors->has('message') ? ' error': '' }}">
                                @if ($errors->has('message'))
                                    <strong>{{ $errors->first('message') }}</strong>
                                @endif
                            </div>
                        </div>

                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </div>
    <section
@endsection
