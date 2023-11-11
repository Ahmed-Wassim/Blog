<!doctype html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Sep 2023 13:22:09 GMT -->

<head>

    @include('layouts.head')

</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('layouts.navbar')

    <div class="section">
        <div class="container">
            <div class="row g-5">
                @yield('content')
            </div>

        </div>
    </div>
    <div class="py-5 bg-light mx-md-3 sec-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h4 fw-bold">Subscribe to newsletter</h2>
                </div>
            </div>
            <form action class="row">
                <div class="col-md-8">
                    <div class="mb-3 mb-md-0">
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-md-4 d-grid">
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </div>
            </form>
        </div>
    </div>
    <div class="site-footer">

        @include('layouts.footer')
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        @include('layouts.scripts')
</body>

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Sep 2023 13:22:22 GMT -->

</html>
