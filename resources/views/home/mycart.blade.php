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
            <div class="col-md-12">
                <h2 class="my-5 badge badge-info p-3" style="font-size: larger; margin-left:500px">Add To Cart Products List</h2>
                @if($carts)
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Product Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $value = 0;
                        ?>

                        @foreach($carts as $index=>$cart)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td><img src="{{asset('product/' . $cart->product->image)}}" alt="{{$cart->product->title}}" width="60" height="60" class="rounded"></td>
                            <td>{{$cart->user->name}}</td>
                            <td>{{$cart->product->title}}</td>
                            <td>{{$cart->product->price}}</td>
                            <td>
                                <a href="{{route('remove-product', $cart->id)}}" style="border: none; background: none; color: red;">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $value = $value + $cart->product->price;
                        ?>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <h4 class="bg-info text-white mt-5 py-3">Total Value of Cart is : ${{$value}}</h4>
                </div>
                <div class="card shadow" style="height: 450px; margin-top: 50px; background-color:lightgray">
                    <div class="card-body  d-flex justify-content-center align-items-center">
                        <div class="col-md-4 mt-5 border shadow p-2">
                            <form action="{{route('confirm-order')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-lablel">Receiver Name</label>
                                    <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control shadow">
                                </div>
                                <div class="form-group">
                                    <label for="address" class="form-lablel">Receiver Address</label>
                                    <textarea name="address" class="form-control shadow">{{Auth::user()->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-lablel">Receiver Phone</label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control shadow">
                                </div>
                                <div class="d-flex" style="width: 330px;">
                                    <input type="submit" class="btn btn-primary mt-3" value="Cash On Delivery">
                                    <a href="{{url('stripe', $value)}}" class="btn btn-success mt-3 ml-3" style="height: 40px;">Pay Using Card</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <p>No Content!</p>
                @endif
            </div>
        </div>

        <!-- info section -->
        @include('home.footer')

</body>

</html>