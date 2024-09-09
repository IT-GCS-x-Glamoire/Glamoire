<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product || Admin Glamoire</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                            <div class="me-3">
                                <div class="form-group position-relative mb-0 has-icon-left">
                                    <form id="search-form" class="d-flex me-3">
                                        <input type="text" name="search" id="search" class="form-control"
                                            placeholder="Search Product.." value="{{ request('search') }}">
                                        <div class="form-control-icon">
                                            <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
                                                <use
                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#search" />
                                            </svg>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <a href="{{ route('create-product-admin') }}" type="submit"
                                class="btn btn-sm btn-primary d-flex align-items-center" style="border-radius: 8px;">
                                <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Product
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height" id="product-list">
                        @foreach ($products as $item)
                            <div class="col-md-4 col-12" id="product-item-{{ $item->id }}">
                                <a href="{{ url('/detail-product-admin/' . $item->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center">
                                            <div class="me-3">
                                                <img src="{{ asset($item->main_image) }}" alt="Product Image"
                                                    style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                                            </div>
                                            <div class="d-flex flex-column w-100">
                                                <div class="d-flex align-items-center">
                                                    <h4 class="card-title mb-0"
                                                        style="margin-top: 1px; font-size: 1.25rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ Str::limit($item->product_name, 20, '...') }}
                                                    </h4>
                                                </div>
                                                <p class="card-category mb-0"
                                                    style="font-size: 0.875rem; color: #6c757d;">
                                                    {{ $item->categoryProduct->name ?? 'N/A' }}
                                                </p>
                                                <p class="card-price mt-1"
                                                    style="font-size: 1rem; font-weight: bold; color: black;">
                                                    Rp. {{ number_format($item->regular_price, 0, ',', '.') }}
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
                                                                    {{ $item->brand->name }}
                                                                </p>
                                                                <div class="col-md-12 mb-3">
                                                                    {{-- <p>Description: {{ $item->description }}</p> --}}
                                                                    <p>Description :
                                                                        {{ Str::limit($item->description, 100, '...') }}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                            <!-- Products Sold and Current Stock -->
                                                            <div
                                                                class="col-md-12 d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <label>Products Sold:
                                                                        {{ $item->sold_quantity }}</label><br>
                                                                    <label>Current Stock:
                                                                        {{ $item->stock_quantity }}</label>
                                                                </div>                                                           

                                                                <div class="ms-auto">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-danger delete-product"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="bi bi-trash"
                                                                            style="font-size: 1.25rem;"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between mt-4 px-3" id="pagination-container">
                        <div class="mb-3">
                            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                            {{ $products->total() }} results
                        </div>
                        <div class="pagination-container">
                            {{ $products->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
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
            $('#search').on('keyup', function() {
                let query = $(this).val();

                if (query.length === 0) {
                    // Reload the page without search query and pagination parameters
                    let currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.delete('search');
                    currentUrl.searchParams.delete('page');
                    window.location.href = currentUrl.href;
                    return;
                }

                $.ajax({
                    url: '/search-products',
                    method: 'GET',
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#product-list').empty();
                        $('#pagination-container').empty();

                        $.each(data.products, function(index, product) {
                            $('#product-list').append(`
                                <div class="col-md-4 col-12">
                                    <a href="/detail-product-admin/${product.id}" style="text-decoration: none; color: inherit;">
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center">
                                                <div class="me-3">
                                                    <img src="${product.image}" alt="Product Image" style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
                                                </div>
                                                <div class="d-flex flex-column w-100">
                                                    <div class="d-flex align-items-center">
                                                        <h4 class="card-title mb-0" style="margin-top: 1px; font-size: 1.25rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${product.product_name}</h4>
                                                    </div>
                                                     <p class="card-category mb-0" style="font-size: 0.875rem; color: #6c757d;">
                                                        {{ $item->categoryProduct->name ?? 'N/A' }}
                                                    </p>
                                                    <p class="card-price mt-1" style="font-size: 1rem; font-weight: bold; color: black;">
                                                    Rp. {{ number_format($item->regular_price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="card-price" style="font-size: 1rem; font-weight: bold; color: black; margin-top: -30px;">
                                                                    ${product.brand.name}
                                                                </p>
                                                                <div class="col-md-12 mb-3">
                                                                    <p>Description: ${product.description}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <label>Products Sold: ${product.sold_quantity}</label><br>
                                                                    <label>Current Stock: ${product.stock_quantity}</label>
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

                        $('#pagination-container').html(data.pagination);
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle click event for delete button
            document.querySelectorAll('.delete-product').forEach(function(element) {
                element.addEventListener('click', function() {
                    var productId = this.getAttribute('data-id');

                    if (confirm('Are you sure you want to delete this product?')) {
                        // Send AJAX request to delete product
                        fetch(`/delete-product/${productId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Remove the product from the page
                                    document.querySelector(`#product-item-${productId}`)
                                        .remove();
                                    alert(data.message);
                                } else {
                                    alert(data.message);
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            });
        });
    </script>


    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
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
