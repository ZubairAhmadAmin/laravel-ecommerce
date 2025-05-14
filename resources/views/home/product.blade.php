<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="img-box">
                        <img src="{{asset('product/'. $product->image)}}" alt="{{$product->title}}">
                    </div>
                    <div class="detail-box">
                        <h6>
                            {{$product->title}}
                        </h6>
                        <h6>
                            Price
                            <span>
                                {{$product->price}}
                            </span>
                        </h6>
                    </div>
                    <div class="new">
                        <span>
                            New
                        </span>
                    </div>
                    <button type="button" class="btn btn-info"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        data-title="{{ $product->title }}"
                        data-description="{{ $product->description }}"
                        data-image="{{ asset('product/' . $product->image) }}"
                        data-price="{{ $product->price }}"
                        data-category="{{ $product->category->name ?? 'N/A' }}"
                        data-quantity="{{ $product->quantity }}"
                        style="opacity: 0.8;">
                        Detail
                    </button>
                    <a href="{{route('cart', $product->id)}}" class="btn btn-primary text-white">Add Cart</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="">
                View All Products
            </a>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center">
                    <img id="modalImage" src="" alt="Product Image" class="img-fluid mb-3 rounded">
                </div>
                <h5 id="modalTitle"></h5>
                <p id="modalDescription"></p>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Price:</strong> $<span id="modalPrice"></span></li>
                    <li class="list-group-item"><strong>Category:</strong> <span id="modalCategory"></span></li>
                    <li class="list-group-item"><strong>Quantity:</strong> <span id="modalQuantity"></span></li>
                </ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary">Add Cart</a>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        const title = button.getAttribute('data-title');
        const description = button.getAttribute('data-description');
        const image = button.getAttribute('data-image');
        const price = button.getAttribute('data-price');
        const category = button.getAttribute('data-category');
        const quantity = button.getAttribute('data-quantity');

        exampleModal.querySelector('#modalTitle').textContent = title;
        exampleModal.querySelector('#modalDescription').textContent = description;
        exampleModal.querySelector('#modalImage').src = image;
        exampleModal.querySelector('#modalImage').alt = title;
        exampleModal.querySelector('#modalPrice').textContent = price;
        exampleModal.querySelector('#modalCategory').textContent = category;
        exampleModal.querySelector('#modalQuantity').textContent = quantity;
    });
</script>
@endsection