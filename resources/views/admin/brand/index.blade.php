<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand || Admin Glamoire</title>

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
                <div class="page-title" style="margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Brands</h3>
                            <nav aria-label="breadcrumb" class="breadcrumb-header me-3">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.html">Brand</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Brand</li>
                                </ol>
                            </nav>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex justify-content-md-end align-items-center order-md-2 order-first">
                            <div class="me-3">
                                <div class="form-group position-relative mb-0 has-icon-left">
                                    <form action="{{ url('/brands') }}" method="GET" class="d-flex me-3">
                                        <input type="text" name="search" id="search" class="form-control"
                                            placeholder="Search Brand.." value="{{ request('search') }}">
                                        <div class="form-control-icon">
                                            <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
                                                <use
                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#search" />
                                            </svg>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <a href="/create-brand" type="submit"
                                class="btn btn-sm btn-primary d-flex align-items-center" style="border-radius: 8px;">
                                <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Brand
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <!-- Form 1 -->
                        @foreach ($brands as $brand)
                            <div class="col-md-4 col-12">
                                <a href="{{ url('/detail-brand/' . $brand->id) }}"
                                    style="text-decoration: none; color: inherit; display: block;">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center">
                                            <!-- Image -->
                                            <div class="me-3">
                                                <img src="{{ asset($brand->brand_logo) }}" alt="{{ $brand->name }}"
                                                    style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                                            </div>
                                            <!-- Product Name and Category -->
                                            <h4 class="card-title mb-0"
                                                style="margin-top: 1px; font-size: 1.25rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ Str::limit($brand->name, 20, '...') }}
                                            </h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- brand Name Field -->
                                                        <div
                                                            class="col-md-12 d-flex justify-content-between align-items-center">
                                                            <div>
                                                                {{-- <label>Products Sold:
                                                               100</label><br> --}}
                                                                <p class="card-price"
                                                                    style="font-size: 1rem; font-weight: bold; color: black; margin-top: -35px;">
                                                                    Summary
                                                                </p>
                                                                <p class="card-price" style="color: black; ">
                                                                    {{ $brand->description }} </p>

                                                                <label>Product</label>
                                                            </div>
                                                            <div class="ms-auto">

                                                                <a href="#" class="text-danger">
                                                                    <i class="bi bi-trash"
                                                                        style="font-size: 1.25rem;"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between mt-4 px-3">
                            <div class="mb-3">
                                Showing {{ $brands->firstItem() }} to {{ $brands->lastItem() }} of
                                {{ $brands->total() }} results
                            </div>
                            <div class="pagination-container">
                                {{ $brands->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
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

    <!-- Include jQuery (if not included already) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Handle input in search box
            $('#search').on('keyup', function() {
                let query = $(this).val();

                // If the search box is empty, navigate to the first page
                if (query.length === 0) {
                    // Reload the page without search query and pagination parameters
                    let currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.delete('search');
                    currentUrl.searchParams.delete('page');
                    window.location.href = currentUrl.href;
                    return;
                }

                // Make AJAX request for search
                $.ajax({
                    url: '/search-brands',
                    method: 'GET',
                    data: {
                        search: query
                    },
                    success: function(data) {
                        // Clear the current content
                        $('.row.match-height').empty();
                        $('.d-flex.justify-content-between').empty();

                        // Add new results
                        $.each(data.brands, function(index, brand) {
                            $('.row.match-height').append(`
            <div class="col-md-4 col-12">
                <a href="/detail-brand/${brand.id}" style="text-decoration: none; color: inherit; display: block;">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="me-3">
                                <img src="${brand.brand_logo}" alt="${brand.name}" style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                            </div>
                            <div class="d-flex flex-column">
                                <h4 class="card-title mb-0" style="margin-top: -20px; font-size: 1.25rem;">${brand.name}</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                         <div class="col-md-12 d-flex justify-content-between align-items-center">
                                             <div>
                                                 <p class="card-price" style="font-size: 1rem; font-weight: bold; color: black; margin-top: -35px;">
                                                     Summary
                                                 </p>
                                                 <p class="card-price" style="color: black;">${brand.description}</p>
                                                 <label>Product</label>
                                             </div>
                                             <div class="ms-auto">
                                                 <a href="#" class="text-danger">
                                                     <i class="bi bi-trash" style="font-size: 1.25rem;"></i>
                                                 </a>
                                             </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        `);
                        });

                        // Add pagination
                        $('.d-flex.justify-content-between').append(data.pagination);
                    }

                });
            });
        });
    </script>


    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>


    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4A69E2', // Mengatur warna tombol OK
                customClass: {
                    icon: 'swal-icon-success'
                }
            });
        </script>
    @endif

</body>

</html>
