<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('admin.layouts.sidebar')

        <div id="main" class='layout-navbar'>
            <header class='mb-2'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </div>

        <div id="main">
            <div class="page-heading">
                <div class="page-title" style="margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Products</h3>
                            <nav aria-label="breadcrumb" class="breadcrumb-header me-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.html">Product</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex justify-content-md-end align-items-center order-md-2 order-first">
                            <a href="/create-product" type="submit"
                                class="btn btn-sm btn-dark d-flex align-items-center" style="border-radius: 8px;">
                                <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Product
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <!-- Form 1 -->
                        <div class="col-md-4 col-12">
                            <a href="{{ url('/detail-product-admin') }}" style="text-decoration: none; color: inherit;">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <!-- Image -->
                                        <div class="me-3">
                                            <img src="{{ asset('assets/images/samples/banana.jpg') }}"
                                                alt="Product Image"
                                                style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                                        </div>
                                        <!-- Product Name and Category -->
                                        <div class="d-flex flex-column">
                                            <h4 class="card-title mb-0" style="margin-top: 1px; font-size: 1.25rem;">
                                                Bedak Bubuk</h4>
                                            <p class="card-category mb-0"
                                                style="font-size: 0.875rem; color: #6c757d;">
                                                Cosmetic</p>
                                            <p class="card-price mt-1"
                                                style="font-size: 1rem; font-weight: bold; color: black;">Rp. 2.000.000
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Product Name Field -->
                                                        <div class="col-md-12">
                                                            <p class="card-price"
                                                                style="font-size: 1rem; font-weight: bold; color: black; margin-top: -30px;">
                                                                Implora
                                                            </p>
                                                            <div class="col-md-12 mb-3">
                                                                <label>Description</label>
                                                            </div>
                                                        </div>
                                                        <!-- Products Sold -->
                                                        <div class="col-md-6">
                                                            <label>Products Sold</label>
                                                            <label>Current Stock</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Form 2 -->
                        <div class="col-md-4 col-12">
                            <a href="{{ url('/detail-product-admin') }}" style="text-decoration: none; color: inherit;">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <!-- Image -->
                                        <div class="me-3">
                                            <img src="{{ asset('assets/images/samples/banana.jpg') }}"
                                                alt="Product Image"
                                                style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                                        </div>
                                        <!-- Product Name and Category -->
                                        <div class="d-flex flex-column">
                                            <h4 class="card-title mb-0" style="margin-top: 1px; font-size: 1.25rem;">
                                                Bedak Bubuk</h4>
                                            <p class="card-category mb-0"
                                                style="font-size: 0.875rem; color: #6c757d;">
                                                Cosmetic</p>
                                            <p class="card-price mt-1"
                                                style="font-size: 1rem; font-weight: bold; color: black;">Rp. 2.000.000
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Product Name Field -->
                                                        <div class="col-md-12">
                                                            <p class="card-price"
                                                                style="font-size: 1rem; font-weight: bold; color: black; margin-top: -30px;">
                                                                Implora
                                                            </p>
                                                            <div class="col-md-12 mb-3">
                                                                <label>Description</label>
                                                            </div>
                                                        </div>
                                                        <!-- Products Sold -->
                                                        <div class="col-md-6">
                                                            <label>Products Sold</label>
                                                            <label>Current Stock</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Form 3 -->
                        <div class="col-md-4 col-12">
                            <a href="{{ url('/detail-product-admin') }}" style="text-decoration: none; color: inherit;">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <!-- Image -->
                                        <div class="me-3">
                                            <img src="{{ asset('assets/images/samples/banana.jpg') }}"
                                                alt="Product Image"
                                                style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                                        </div>
                                        <!-- Product Name and Category -->
                                        <div class="d-flex flex-column">
                                            <h4 class="card-title mb-0" style="margin-top: 1px; font-size: 1.25rem;">
                                                Bedak Bubuk</h4>
                                            <p class="card-category mb-0"
                                                style="font-size: 0.875rem; color: #6c757d;">
                                                Cosmetic</p>
                                            <p class="card-price mt-1"
                                                style="font-size: 1rem; font-weight: bold; color: black;">Rp. 2.000.000
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Product Name Field -->
                                                        <div class="col-md-12">
                                                            <p class="card-price"
                                                                style="font-size: 1rem; font-weight: bold; color: black; margin-top: -30px;">
                                                                Implora
                                                            </p>
                                                            <div class="col-md-12 mb-3">
                                                                <label>Description</label>
                                                            </div>
                                                        </div>
                                                        <!-- Products Sold -->
                                                        <div class="col-md-6">
                                                            <label>Products Sold</label>
                                                            <label>Current Stock</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
