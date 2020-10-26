<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- Vendor JS Files -->
<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
{{--<script src="{{ asset('frontend/vendor/php-email-form/validate.js') }}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="{{ asset('frontend/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/vendor/highlight/highlight.min.js') }}"></script>
<!-- Template Main JS File -->
<script src="{{ asset('frontend/js/main.js') }}"></script>

<script>
    if ( typeof oldIE === 'undefined' && Object.keys && typeof hljs !== 'undefined') {
        hljs.initHighlighting();
    }
</script>
<script>

    $(document).ready(function () {
        if($("#contact_form").length > 0) {
            $("#contact_form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 40
                    },

                    email: {
                        required: true,
                        maxlength: 50,
                        email: true
                    },

                    subject: {
                        required: true,
                        maxlength: 200
                    },

                    message: {
                        required: true,
                        minlength: 20,
                        maxlength: 500
                    }

                },

                messages: {
                    name: {
                        required: 'Enter your name',
                        maxlength: 'Name should not be more than 50 character'
                    },

                    email: {
                        required : 'Enter email address',
                        email : 'Enter valid email address',
                        maxlength : 'Email should not be more than 50 character'
                    },

                    subject: {
                        required: 'Enter subject',
                        maxlength: 'Subject should not be more than 200 character'
                    },

                    message: {
                        required : 'Enter message detail',
                        minlength : 'Message details must be minimum 20 character long',
                        maxlength : 'Message details must be maximum 500 character long'
                    }
                }
            });
        }
    })

</script>
