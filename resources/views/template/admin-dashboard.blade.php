<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{ $title }}</title>
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />


    @stack('addon-style')
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/admin.png" alt="" class="my-4" width="100" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.admin-dashboard') }}" class="list-group-item list-group-item-action {{ Request::is('admin') ? 'active' : false }}">Dashboard</a>

                    <a href="{{ route('admin.product.index') }}"
                        class="list-group-item list-group-item-action {{ Request::is('admin/product*') ? 'active' : false  }}  ">Product</a>

                    <a href="{{ route('admin.galleryproduct.index') }}"
                        class="list-group-item list-group-item-action {{ Request::is('admin/galleryproduct*') ? 'active' : false }}">Gallery Product</a>

                    <a href="{{ route('admin.category.index') }}" class="list-group-item list-group-item-action {{ Request::is('admin/category*') ? 'active' : false }}">Categories</a>

                    <a href="{{ route('admin.user.index') }}" class="list-group-item list-group-item-action {{ Request::is('admin/user*') ? 'active' : false }}">Users</a>

                    <a href="{{ route('admin.transaction.index') }}" class="list-group-item list-group-item-action {{ Request::is('admin/transaction*') ? 'active' : false }}">Transaction</a>
                    <a href="/logout" class="list-group-item list-group-item-action">Sign Out</a>
                </div>
            </div>

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                            &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <!-- dekstop menu -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link" id="navbar-dropdown" role="button"
                                        data-toggle="dropdown">
                                        <img src="/images/profile.png" alt=""
                                            class="rounded-circle mr-2 profile-picture" />
                                        Hi, {{ auth()->user()->name }}
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                                        <a href="{{ route('dashboard-accountsetting') }}" class="dropdown-item">Settings</a>
                                        <div class="dropdown-divider">Settings</div>
                                        <a href="/logout" class="dropdown-item">Logout</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="navbar-nav d-lg-none d-block">
                                <div class="dropdown-divider"></div>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> Hi, Gita</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link d-inline-block">Cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                {{-- content --}}
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="/js/navbar-scroll.js"></script>
    <script>
        $(document).ready(function () {
        $("#menu-toggle").click(function (e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      });
    </script>
    @stack('addon-script')
</body>

</html>