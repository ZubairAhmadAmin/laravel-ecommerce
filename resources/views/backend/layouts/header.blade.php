<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close <i class="fa fa-close"></i></div>
                <form id="searchForm" action="#">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="What are you searching for...">
                        <button type="submit" class="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                </a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>
            <!-- Search box -->
            <div class="form-group">
                <form action="{{route('product-search')}}" method="get">
                    <input type="search" name="search" class="rounded text-bg-secondary pl-2" style="width: 300px; height: 42px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <!-- Log out               -->
            <div class="list-inline-item logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class=" btn btn-primary fw-bolder">Logout</button>
                </form>
            </div>
        </div>
        </div>
    </nav>
</header>