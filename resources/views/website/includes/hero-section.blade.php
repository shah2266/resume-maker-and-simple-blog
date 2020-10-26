
@if($bannerType->active_value == strtolower('image'))
<!-- Hero No Slider Section -->
<section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center" style="background-image: url( {{ asset('storage/'.$image->image) }} )">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                @if(!empty($image->name)) <h2 class="animate__animated animate__fadeInDown">{{ $image->name }}</h2> @endif
                @if(!empty($image->short_info_1))<p class="animate__animated animate__fadeInUp">{{$image->short_info_1}}</p>@endif
                @if(!empty($image->short_info_2))<p class="animate__animated animate__fadeInUp">{{$image->short_info_2}}</p>@endif
                @if(!empty($image->button1_label))
                    <a href="{{ $image->button1_link }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">{{ $image->button1_label }}</a>
                @endif

                @if(!empty($image->button2_label))
                    <a href="{{ $image->button2_link }}" class="ml-2 btn-get-started scrollto animate__animated animate__fadeInUp">{{ $image->button2_label }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- End Hero No Slider Section -->
@else
<!-- Intro Section -->
<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                @foreach($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active':'' }}" style="background-image: url( {{ asset('storage/'.$slider->image) }} )">
                        <div class="carousel-container">
                            <div class="container">
                                @if(!empty($slider->name)) <h2 class="animate__animated animate__fadeInDown">{{ $slider->name }}</h2> @endif
                                @if(!empty($slider->short_info_1))<p class="animate__animated animate__fadeInUp">{{$slider->short_info_1}}</p>@endif
                                @if(!empty($slider->short_info_2))<p class="animate__animated animate__fadeInUp">{{$slider->short_info_2}}</p>@endif

                                @if(!empty($slider->button1_label))
                                    <a href="{{ $slider->button1_link }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">{{ $slider->button1_label }}</a>
                                @endif

                                @if(!empty($slider->button2_label))
                                    <a href="{{ $slider->button2_link }}" class="ml-2 btn-get-started scrollto animate__animated animate__fadeInUp">{{ $slider->button2_label }}</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section>
<!-- End Intro Section -->
@endif
