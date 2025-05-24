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
                    <h3>Create Product</h3>
                </div>
                <div class="card shadow mb-4" style="background-color: black; color: white;">
                    <div class="card-body" style="background-color: black; color: white;">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-lablel text-white">Title</label>
                                <input type="text" name="title" class="form-control bg-dark text-white" placeholder="Enter product title">
                                @error('title')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-lablel">Description</label>
                                <textarea name="description" class="form-control bg-dark text-white" placeholder="Enter product description"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image" class="form-lablel">Image</label>
                                        <input type="file" name="image" class="form-control bg-dark text-white" placeholder="Choose product image">
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="form-lablel">Price</label>
                                        <input type="text" name="price" class="form-control bg-dark text-white" placeholder="Enter product price">
                                        @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Category:</label><br>
                                        <select name="category" class="form-control bg-dark text-white">
                                            <option>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity" class="form-lablel">Quantity</label>
                                        <input type="number" name="quantity" class="form-control bg-dark text-white" placeholder="Enter product quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right m-3">Save</button>
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