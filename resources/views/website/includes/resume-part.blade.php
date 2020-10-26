<!-- Hero Banner Section -->
<section id="hero-banner" class="d-flex justify-cntent-center align-items-center" style="background-image: url( {{ asset('storage/'.$personal->bg_image) }} )">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-8 profile">
                <div class="profile-img">
                    <img src="{{ asset('storage/'.$personal->image) }}" alt="profile">
                </div>
                <h2 class="animate__animated animate__fadeInDown">{{ $personal->name }}</h2>
                <p class="animate__animated animate__fadeInUp">{{ $personal->keywors }}</p>

                @if(isset($personal->file))
                    <a href="{{ url('resume/download') }}" class="btn-get-started scrollto animate__animated animate__fadeInUp" title="Resume" style="margin-left: 20px;">
                        <i class="fa fa-download"></i> Download </a>
                @endif
                @if(!empty($personal->file))
                    <a href="{{ asset('storage/'.$personal->file) }}" target="_blank" class="ml-2 btn-get-started scrollto animate__animated animate__fadeInUp"><i class="fa fa-eye"></i>{{ 'View resume' }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- End Hero Banner Section -->
