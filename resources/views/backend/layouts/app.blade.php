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
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
            </div>
        </div>
        @include('backend.layouts.body')
    </div>
    <!-- end body content -->

    @include('backend.layouts.footer')

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