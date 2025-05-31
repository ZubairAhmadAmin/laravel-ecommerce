<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{asset('backend/img/amin.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h5">Zubair Amin</h1>
                <p>Web Designer</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="active"><a href="{{route('admin-dashboard')}}"> <i class="icon-home"></i>Home </a></li>
            <li><a href="{{route('categories.index')}}"> <i class="icon-grid"></i>Category </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{route('products.index')}}"><i class="icon-list"></i>Products List</a></li>
                    <li><a href="{{route('products.create')}}"><i class="fa fa-edit"></i>Add Product</a></li>
                </ul>
            </li>
            <li><a href="{{route('orders')}}"> <i class="icon-windows"></i>Orders </a></li>
            <li><a href="{{route('users.index')}}"> <i class="icon-user"></i>Users </a></li>
        </ul>
    </nav>