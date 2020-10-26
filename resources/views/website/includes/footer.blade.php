<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <a href="/">
                        @if(!empty($company->image))
                            <img src="{{ asset('storage/'.$company->image) }}" alt="Company logo" class="img-fluid">
                        @else
                            <h2>Logo</h2>
                        @endif
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="ion-ios-arrow-right"></i> <a href="/">Home</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="/resume">Resume</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="/contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p> <strong>Address:</strong> @if(!empty($company->address)) {{ $company->address }} @endif <br>
                        <strong>Phone:</strong> @if(!empty($company->phone)) {{ $company->phone }} @endif<br>
                        <strong>Email:</strong> @if(!empty($company->email)) {{ $company->email }} @endif<br>
                    </p>

                    <div class="social-links">
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
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                @if(!empty($company->copy_right_text))
                    {{ $company->copy_right_text }}
                @endif
            </p>
        </div>
    </div>
</footer><!-- End Footer -->
