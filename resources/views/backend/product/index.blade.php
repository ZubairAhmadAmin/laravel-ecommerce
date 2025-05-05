@extends('backend.layouts.app')

@section('content')

<div class="row mr-5 ml-5">
    <h2 class="text-white my-4">Products List
        <a href="{{route('products.create')}}" class="btn btn-primary float-end mr-5">Add Product</a>
    </h2>
    <table class="table table-hover table table-dark">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index=>$product)
            <tr>
                <td>{{$index + 1}}</td>
                <td><img src="{{asset('product/' . $product->image)}}" alt="{{$product->title}}" width="60" height="60" class="rounded"></td>
                <td>{{$product->title}}</td>
                <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="confirmation(event)" style="border: none; background: none; color: red;">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <a href="{{route('products.edit', $product->id)}}" style="border: none; background: none; color: blue;"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center align-items-center mt-5">
    {{$products->onEachSide(1)->links()}}
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

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection