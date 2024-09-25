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
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

    <style>
        .product-item-container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* Allows items to wrap on smaller screens */
        }

        .product-item-container img {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
        }

        @media (max-width: 768px) {
            .product-item-container {
                flex-direction: column;
                /* Stack items vertically on smaller screens */
                align-items: flex-start;
            }

            .product-item-container img {
                margin-bottom: 10px;
                width: 80px;
                height: 80px;
                /* Reduce image size on smaller screens */
            }
        }

        .action-buttons a {
            display: block;
            /* Set to block so each link appears on a new line */
            margin-bottom: 5px;
            /* Add some space between the buttons */
        }
    </style>
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
                                    <li class="breadcrumb-item"><a href="{{ route('index-product-admin') }}">Product</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">All Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex justify-content-md-end align-items-center order-md-2 order-first">
                            <a href="{{ route('create-product-admin') }}" type="submit"
                                class="btn btn-sm btn-primary d-flex align-items-center" style="border-radius: 8px;">
                                <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Product
                            </a>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Product</h4>
                        </div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Product Sales</th>
                                        <th>Stock Quantity</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr id="product-item-{{ $item->id }}">
                                            <td>
                                                <div class="product-item-container">
                                                    <!-- Image -->
                                                    <img src="{{ asset($item->main_image) }}" class="lazyload"
                                                        alt="Product Image"
                                                        onclick="openImageInNewTab('{{ asset($item->main_image) }}')">

                                                    <!-- Product Details -->
                                                    <div>
                                                        <strong style="font-size: 5mm;">
                                                            {{ $item->brand ? $item->brand->name : 'No Brand' }} -
                                                            {{ Str::limit($item->product_name, 20, '...') }}
                                                        </strong><br>
                                                        <span style="font-size: 3.6mm;">Code Product :
                                                            {{ $item->product_code ? $item->product_code : 'No Code' }}</span><br>
                                                        <span style="font-size: 3.6mm;">Category :
                                                            {{ $item->categoryProduct ? $item->categoryProduct->name : 'No Category' }}
                                                        </span><br>
                                                        <!-- Display color_text if it exists -->
                                                        @if ($item->color_text)
                                                            <span style="font-size: 3.6mm;">
                                                               Color : {{ $item->color_text }}
                                                            </span><br>
                                                        @endif

                                                        <!-- Display color if it exists -->
                                                        @if ($item->color)
                                                            <div
                                                                style="width: 20px; height: 20px; border-radius: 50%; background-color: {{ $item->color }}; margin-top: 5px;">
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </td>

                                            <td>{{ $item->stock_quantity }}</td>
                                            <td>{{ $item->stock_quantity }}</td>
                                            <td>Rp. {{ number_format($item->regular_price, 0, ',', '.') }}</td>

                                            <td class="action-buttons">
                                                <a href="{{ url('detail-product-admin/' . $item->id) }}"><span class="badge bg-info">
                                                    View</span></a>
                                                <a href="{{ url('edit-product-admin/' . $item->id) }}"><span class="badge bg-warning">Edit</span></a>
                                                <a href="javascript:void(0);" class="delete-product"
                                                    data-id="{{ $item->id }}"><span class="badge bg-danger">Delete</span></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
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

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    <!-- Include jQuery (if not included already) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        // Fungsi untuk membuka gambar di tab baru
        function openImageInNewTab(url) {
            window.open(url, '_blank');
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Simple DataTable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);

            // Use event delegation for delete button
            table1.addEventListener('click', function(event) {
                if (event.target.closest('.delete-product')) {
                    let productId = event.target.closest('.delete-product').getAttribute('data-id');

                    // SweetAlert2 confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send AJAX request to delete product
                            fetch(`/delete-product/${productId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Remove the product from the page
                                        document.querySelector(`#product-item-${productId}`)
                                            .remove();
                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: data.message,
                                            icon: 'success',
                                            timer: 1800, // Auto-close alert after 2 seconds
                                            timerProgressBar: true, // Show progress bar
                                            showConfirmButton: true // Show OK button
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: data.message,
                                            icon: 'error',
                                            timer: 1800, // Auto-close alert after 2 seconds
                                            timerProgressBar: true, // Show progress bar
                                            showConfirmButton: true // Show OK button
                                        });
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    });
                }
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
                },
                timer: 1800, // Mengatur waktu tampilan SweetAlert dalam milidetik (1000 ms = 1 detik)
                timerProgressBar: true, // Menampilkan progress bar timer
                didClose: () => {
                    // Optional: this can be used to trigger any action after the alert is closed
                }
            });
        </script>
    @endif
</body>

</html>
