{{-- {% set title = 'DataTable' %}
{% set filename = 'table-datatable.html' %}

{% extends 'layouts/master.html' %}
{% block content %} --}}

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
            {{-- <div class="page-heading">
                <div class="page-title" style="margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Category</h3>
                            <nav aria-label="breadcrumb" class="breadcrumb-header me-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.html">Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Category</li>
                                </ol>
                            </nav>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex justify-content-md-end align-items-center order-md-2 order-first">
                            <a href="/create-brand" type="submit"
                                class="btn btn-sm btn-dark d-flex align-items-center">
                                <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Category
                            </a>
                        </div>

                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Graiden</td>
                                        <td>vehicula.co.uk</td>
                                        <td>076 4820 8838</td>
                                        <td>Offenburg</td>
                                        <td>Offenburg</td>
                                        <td>
                                            <span class="badge bg-light-success">Success</span>
                                        </td>
                                        <td>Offenburg</td>
                                        <td><a href="/order-detail"> <span class="badge bg-warning">View</span>
                                            </a></td>
                                    </tr>

                                    <tr>
                                        <td>Emmanuel</td>
                                        <td>eget.lacus.org</td>
                                        <td>(016977) 8208</td>
                                        <td>Saint-Remy</td>
                                        <td>Saint-Rem</td>
                                        <td>
                                            <span class="badge bg-light-primary">Delivered</span>
                                        </td>
                                        <td>Saint-Remy</td>
                                        <td><a href="/order-detail"> <span class="badge bg-warning">View</span>
                                            </a></td>

                                    </tr>

                                    <tr>
                                        <td>Emmanuel</td>
                                        <td>eget.lacus.org</td>
                                        <td>(016977) 8208</td>
                                        <td>Saint-Remy</td>
                                        <td>Saint-Rem</td>
                                        <td>
                                            <span class="badge bg-light-danger">canceled</span>
                                        </td>
                                        <td>Saint-Remy</td>
                                        <td><a href="/order-detail"> <span class="badge bg-warning">View</span>
                                            </a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div> --}}

            <div class="page-heading">
                <div class="page-title" style="margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Category</h3>
                            <nav aria-label="breadcrumb" class="breadcrumb-header me-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.html">Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Category</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center order-md-2 order-first">
                            <a href="#" type="button"
                                class="btn btn-sm btn-dark d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#inlineForm">
                                <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Category
                            </a>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Graiden</td>
                                        <td>vehicula.co.uk</td>
                                        <td>076 4820 8838</td>
                                        <td>Offenburg</td>
                                        <td>Offenburg</td>
                                        <td>
                                            <span class="badge bg-light-success">Success</span>
                                        </td>
                                        <td>Offenburg</td>
                                        <td><a href="/order-detail"> <span class="badge bg-warning">View</span>
                                            </a></td>
                                    </tr>

                                    <tr>
                                        <td>Emmanuel</td>
                                        <td>eget.lacus.org</td>
                                        <td>(016977) 8208</td>
                                        <td>Saint-Remy</td>
                                        <td>Saint-Rem</td>
                                        <td>
                                            <span class="badge bg-light-primary">Delivered</span>
                                        </td>
                                        <td>Saint-Remy</td>
                                        <td><a href="/order-detail"> <span class="badge bg-warning">View</span>
                                            </a></td>
                                    </tr>

                                    <tr>
                                        <td>Emmanuel</td>
                                        <td>eget.lacus.org</td>
                                        <td>(016977) 8208</td>
                                        <td>Saint-Remy</td>
                                        <td>Saint-Rem</td>
                                        <td>
                                            <span class="badge bg-light-danger">Canceled</span>
                                        </td>
                                        <td>Saint-Remy</td>
                                        <td><a href="/order-detail"> <span class="badge bg-warning">View</span>
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Form Add Categories</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <label>Category Name: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Email Address" class="form-control">
                                </div>
                                <label>Password: </label>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
    {{-- {% endblock %}
    {% block styles %} --}}
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    {{-- {% endblock %}
    {% block js %} --}}
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    {{-- {% endblock %} --}}

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
