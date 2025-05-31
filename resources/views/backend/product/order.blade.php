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
        <div class="row mr-5 ml-5">
            <h2 class="text-white my-4">Orders List </h2>
            <table class="table table-hover table table-dark table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Change Status</th>
                        <th scope="col">Download PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index=>$order)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}}</td>
                        <td><img src="{{asset('product/' . $order->product->image)}}" alt="{{$order->product->title}}" width="60" height="60" class="rounded"></td>
                        <td>
                            @if($order->status == 'In Progress')
                            <span class="badge badge-primary mt-3">{{$order->status}}</span>
                            @elseif($order->status == 'On The Way')
                            <span class="badge badge-warning mt-3">{{$order->status}}</span>
                            @else
                            <span class="badge badge-success mt-3">{{$order->status}}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('on-the-way', $order->id)}}" class="btn btn-warning">On The Way</a>
                            <a href="{{route('delivered', $order->id)}}" class="btn btn-success">Delivered</a>
                        </td>
                        <td>
                            <a href="{{route('download', $order->id)}}">
                                <i class="fa fa-download"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            {{$orders->onEachSide(1)->links()}}
        </div>

        <!-- javascript for delete -->
        <script>
            function confirmation(ev) {
                ev.preventDefault();
                var form = ev.target.closest('form');

                swal({
                        title: "Are You Sure To Delete This?",
                        text: "This delete will be permanent.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            }
        </script>
    </div>
    <!-- end body content -->

    @include('backend.layouts.footer')

    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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