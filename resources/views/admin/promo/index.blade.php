{{-- {% set title = 'DataTable' %}
{% set filename = 'table-datatable.html' %}

{% extends 'layouts/master.html' %}
{% block content %} --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo || Admin Glamoire</title>

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
        @include('admin.layouts.navbar')

        <div id="main">
            <div class="page-heading">
                <div class="page-title">


                    <div class="row mb-3">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Promo</h3>
                            <nav aria-label="breadcrumb" class="breadcrumb-header me-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.html">Promo</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Promo</li>
                                </ol>
                            </nav>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex justify-content-md-end align-items-center order-md-2 order-first">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-dark dropdown-toggle d-flex align-items-center"
                                    type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="border-radius: 8px;">
                                    <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Data
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('create-promo') }}">Promo</a></li>
                                    <li><a class="dropdown-item" href="{{ route('create-promo-voucher') }}">Voucher</a></li>
                                    <li><a class="dropdown-item" href="{{ route('create-promo-ongkir') }}">Promo Ongkir</a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Promo</h4>
                        </div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Promo</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Graiden</td>
                                        <td>Graiden</td>
                                        <td>Graiden</td>
                                        <td>
                                            <span class="badge bg-light-success">Success</span>
                                        </td>
                                        <td>
                                            <a href="/user-detail"> <span class="badge bg-info">View</span>
                                            </a>
                                            <a href="/user-detail"> <span class="badge bg-warning">Edit</span>
                                            </a>
                                        </td>
                                    </tr>

                                   
                                </tbody>
                            </table>
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

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
