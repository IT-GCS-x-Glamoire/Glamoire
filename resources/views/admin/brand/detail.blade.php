<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

</head>

<body>
    <div id="app">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.navbar')

        <div id="main">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3>Detail Brand</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/brand-admin"
                                            style="text-decoration: none;">Brand</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Brand</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Brand Name <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Brand Name" id="first-name-icon"
                                                                    value="{{ $brand->name }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="first-name-icon">Description <span
                                                                    style="color: red">*</span></label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $brand->description }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="first-name-icon">Product Gallery <span
                                                                style="color: red">*</span></label>
                                                        <div class="card-body">
                                                            <!-- Menampilkan gambar dari path yang diberikan -->
                                                            <img src="{{ asset($brand->brand_logo) }}"
                                                                alt="Product Image"
                                                                style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 10px;">
                                                        </div>
                                                    </div>


                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-sm btn-primary me-1 mb-1"
                                                            style="border-radius: 8px;">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light-secondary me-1 mb-1"
                                                            style="border-radius: 8px;">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>

    <!-- toastify -->
    <script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>

</body>

</html>
