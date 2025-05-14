<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <div class="row mr-5 ml-5 mb-5">
            <div class="card shadow" style="height: 450px; margin-top: 100px; background-color:lightgray">
                <div class="card-body">
                    <div class="col-md-4 mt-5">
                        <form action="{{route('confirm-order')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-lablel" style="width: 130px;">Receiver Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control shadow" style="width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-lablel" style="width: 130px;">Receiver Address</label>
                                <textarea name="address" class="form-control shadow" style="width: 300px;">{{Auth::user()->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-lablel" style="width: 130px;">Receiver Phone</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control shadow" style="width: 300px;">
                            </div>                            
                            <div style="margin-left: 190px;">
                                <input type="submit" class="btn btn-primary mt-3" value="Place Order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="my-4 badge badge-info p-3" style="font-size: larger;">Add To Cart Products List</h2>
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Product Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $index=>$cart)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td><img src="{{asset('product/' . $cart->product->image)}}" alt="{{$cart->product->title}}" width="60" height="60" class="rounded"></td>
                            <td>{{$cart->user->name}}</td>
                            <td>{{$cart->product->title}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- info section -->
        @include('home.footer')

</body>

</html>