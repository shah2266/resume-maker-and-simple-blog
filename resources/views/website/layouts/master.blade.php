<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Meta Tag -->
    @include('website.includes.meta-tag')
    <!-- Meta Tag -->

    <title>Robin-@yield('title') </title>

    <!-- Css Styles -->
    @include('website.includes.header-link')
    <!-- Css Styles End -->

</head>

<body>
    <!-- Page Preloader -->
    @include('website.includes.preloader')
    <!-- Page Preloader -->

    <!-- Header Section Begin -->
    @include('website.includes.header')
    <!-- Header Section End -->

    <!-- Main Content Section Begin -->
    @yield('main-content')
    <!-- Main Content Section Begin -->

    <!-- Footer Section Begin -->
    @include('website.includes.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('website.includes.script')

</body>
</html>
