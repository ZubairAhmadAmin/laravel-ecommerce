<!DOCTYPE html>
<html>

<head>
    <!-- start css links -->
    @include('backend.layouts.link')
    <!-- end css links -->
</head>

<body>
    <!-- start header -->
    @include('backend.layouts.header')
    <!-- end header -->

    <!-- start sidebar navigation -->
    @include('backend.layouts.sidebar')
    <!-- sidebar navigation end-->

    <!-- start body content -->
    <div class="page-content">
        @yield('content')
        <footer class="footer">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- end body content -->

    <!-- JavaScript files-->
     @yield('script')
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('backend/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('backend/js/charts-home.js')}}"></script>
    <script src="{{asset('backend/js/front.js')}}"></script>
</body>

</html>