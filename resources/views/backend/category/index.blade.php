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
                <form class="row g-3" action="{{route('categories.store')}}" method="post">
                    @csrf
                    <h1 class="text-white m-3">Add Category</h1>
                    <div class="col-auto mx-auto mt-4">
                        <input type="text" name="category" class="bg-light rounded" style="width: 500px; height: 50px;">
                        <button type="submit" class=" btn btn-primary fw-bolder">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mr-5 ml-5">
            <table class="table table-hover table table-dark">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index=>$category)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirmation(event)" style="border: none; background: none; color: red;">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                            <button
                                type="button"
                                class="btn-edit-category"
                                data-id="{{ $category->id }}"
                                data-name="{{ $category->name }}"
                                data-bs-toggle="modal"
                                data-bs-target="#editCategoryModal"
                                style="border: none; background: none; color: blue;">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Edit Category Modal -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" id="editCategoryForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="category" id="edit-category-name" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- javescript for update -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('.btn-edit-category');
                const editForm = document.getElementById('editCategoryForm');
                const categoryNameInput = document.getElementById('edit-category-name');

                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const categoryId = this.dataset.id;
                        const categoryName = this.dataset.name;

                        categoryNameInput.value = categoryName;

                        editForm.action = "{{ url('categories') }}/" + categoryId;
                    });
                });
            });
        </script>

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