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
    <style>
        ::placeholder {
            color: white !important;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="m-4 font-weight-bold text-white">
                    <h3>Update User</h3>
                </div>
                <div class="card shadow mb-4" style="background-color: black; color: white;">
                    <div class="card-body" style="background-color: black; color: white;">
                        <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-lablel text-white">Name</label>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control bg-dark text-white" placeholder="Enter user name">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-lablel">Email</label>
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control bg-dark text-white" placeholder="Enter user email">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-lablel">Phone</label>
                                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control bg-dark text-white" placeholder="Enter user phone">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address" class="form-lablel">Address</label>
                                        <input type="text" name="address" value="{{$user->address}}" class="form-control bg-dark text-white" placeholder="Enter user address">
                                        @error('address')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="usertype" class="form-lablel">User Type</label>
                                        <input type="text" name="usertype" value="{{$user->usertype}}" class="form-control bg-dark text-white" placeholder="Enter usertype">
                                        @error('usertype')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right m-3">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end body content -->

    @include('backend.layouts.footer')

    <!-- JavaScript files-->
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