@extends('website.layouts.master')

@section('title', 'Blog')

@section('main-content')
    <!-- Hero breadcrumbs -->
    @include('website.includes.blog-breadcrumb')
    <!-- End Hero No Slider Section -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 entries">

                    @include('website.includes.post-load')

                </div><!-- End blog entries list -->

                <div class="col-lg-4">
                    @include('website.includes.sidebar')
                </div><!-- End blog sidebar -->

            </div><!-- End .row -->

        </div><!-- End .container -->

    </section><!-- End Blog Section -->
@endsection

