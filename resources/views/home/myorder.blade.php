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
        <div class="my-5">
            <h2 class="my-4 badge badge-info p-3" style="font-size: larger; margin-left: 550px;">My Orders List</h2>
            <table class="table table-hover border">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delivery Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($myorders as $index=>$myorder)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td><img src="{{asset('product/' . $myorder->product->image)}}" alt="{{$myorder->product->title}}" width="60" height="60" class="rounded"></td>
                        <td>{{$myorder->product->title}}</td>
                        <td>{{$myorder->product->price}}</td>
                        <td>{{$myorder->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- info section -->
        @include('home.footer')

</body>

</html>