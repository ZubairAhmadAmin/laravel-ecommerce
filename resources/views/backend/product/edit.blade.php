@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary">Edit Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title" class="form-lablel">Title</label>
                            <input type="text" name="title" value="{{$product->title}}" class="form-control" placeholder="Enter product title">
                            @error('title')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-lablel">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter product description">{{$product->description}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                {{-- Show current image if exists --}}
                                @if(isset($product) && $product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('product/' . $product->image) }}" alt="Product Image" class="rounded " style="max-width: 80px; height: auto; border: 1px solid #ccc;">
                                </div>
                                @endif

                                {{-- File input --}}
                                <input type="file" name="image" class="form-control" placeholder="Choose product image">

                                @error('image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-lablel">Price</label>
                                <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="Enter product price">
                                @error('price')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category:</label><br>
                                <select name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>
                                        {{ ucfirst($category->name) }}
                                    </option>
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
                                <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control" placeholder="Enter product quantity">
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
    <!-- /.container-fluid -->
</div>

@endsection