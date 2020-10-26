@extends('website.layouts.master')

@section('title', 'Post')

@section('main-content')
<!-- Hero breadcrumbs -->
@include('website.includes.blog-breadcrumb')
<section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">
                    <div class="entry-img">
                        @if(!empty($post->image))
                            <img src="{{ asset('storage/'.$post->image) }}" alt="Image" class="img-fluid">
                        @endif
                    </div>

                    <h2 class="entry-title">
                        <a>{{ str_replace('-',' ',$post->title) }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a>{{ $post->user->name }}</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a><time>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</time></a></li>
                        </ul>
                    </div>

                    <div class="entry-content">

                        {!! $post->description !!}

                    </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

            <div class="col-lg-4">
               @include('website.includes.sidebar')
            </div><!-- End blog sidebar -->

        </div><!-- End row -->

    </div><!-- End container -->

</section><!-- End Blog Section -->
@endsection
