<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-11 d-flex align-items-center">

                <h1 class="logo mr-auto">
                    <a href="/">
                        @if(!empty($company->image))
                            <img src="{{ asset('storage/'.$company->image) }}" alt="Company logo">
                        @else
                            {{ 'Shahanawaz' }}
                        @endif
                    </a>
                </h1>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="{{ Request::is('/')? 'active':''}}" ><a href="/">Home</a></li>
                        <li class="{{ Request::is('resume') ? 'active':'' }}"><a href="/resume">Resume</a></li>
                        <li class="{{ (Request::is('blog') OR Request::is('blog/*')) ? 'active':'' }}"><a href="/blog">Blog</a></li>
                        <li class="{{ Request::is('contact')? 'active':'' }}"><a href="/contact">Contact</a></li>

                    </ul>
                </nav><!-- .nav-menu -->
            </div>
        </div>

    </div>
</header><!-- End Header -->
