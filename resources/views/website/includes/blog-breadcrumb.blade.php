<section id="hero-breadcrumbs" class="d-flex justify-cntent-center align-items-center"
    @if(Request::is('blog') == 'blog' || $breadcrumb->visibility == 1)
         @isset($breadcrumb->image) style="background-image: url( {{ asset('storage/'. $breadcrumb->image) }} )" @endisset
    @elseif(!empty($postImage))
         @isset($postImage->image_large) style="background-image: url( {{ asset('storage/'. $postImage->image_large) }} )" @endisset
    @else
         @isset($breadcrumb->image) style="background-image: url( {{ asset('storage/'. $breadcrumb->image) }} )" @endisset
    @endif
    >
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                @if(!empty($breadcrumb->page_title)) <h2 class="animate__animated animate__fadeInDown">{{ $breadcrumb->page_title }}</h2> @endif

                @if(Request::is('blog') == 'blog')
                    @if(!empty($breadcrumb->description))<p class="animate__animated animate__fadeInUp">{{$breadcrumb->description}}</p>@endif
                @else
                    <p class="animate__animated animate__fadeInUp">{{ ucfirst(str_replace('-', ' ', last(explode('/', Request::path())))) }}</p>
                @endif

            </div>
        </div>
    </div>
</section>
