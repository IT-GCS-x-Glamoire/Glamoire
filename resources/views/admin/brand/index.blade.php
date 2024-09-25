<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand || Admin Glamoire</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

    <style>
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

                            <a href="/create-brand" type="submit"
                                class="btn btn-sm btn-primary d-flex align-items-center" style="border-radius: 8px;">
                                <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Brand
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                {{-- <section id="basic-horizontal-layouts">
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
                                                    class="lazyload"
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
                                                                <p class="card-price"
                                                                    style="font-size: 1rem; font-weight: bold; color: black; margin-top: -35px;">
                                                                    Summary
                                                                </p>
                                                                <p class="card-price" style="color: black; ">
                                                                    {{ Str::limit($brand->description, 100, '...') }}

                                                                    <label>Product</label>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0);"
                                                                    class="text-danger delete-brand"
                                                                    data-id="{{ $brand->id }}">
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
                </section>         --}}

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4>Brands</h4>
                        </div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Brand logo</th>
                                        <th>Brand Code</th>
                                        <th>Name</th>
                                        <th>Total Product</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr id="brand-item-{{ $brand->id }}">
                                            <td>
                                                <img src="{{ asset($brand->brand_logo) }}" alt="{{ $brand->name }}"
                                                    class="lazyload"
                                                    style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;"
                                                    onclick="openImageInNewTab('{{ asset($brand->brand_logo) }}')">
                                            </td>
                                            <td>{{ $brand->brand_code }}</td>
                                            <td>{{ Str::limit($brand->name, 20, '...') }}</td>
                                            <td>
                                                <span class="badge bg-light-success">{{ $brand->products_count }}</span>
                                                <!-- Menampilkan total produk -->
                                            </td>
                                            <td>{{ Str::limit($brand->description, 100, '...') }}</td>
                                            <td class="action-buttons">
                                                <a href="{{ url('/detail-brand/' . $brand->id) }}">
                                                    Details
                                                </a>
                                                <a href="javascript:void(0);" class="delete-brand"
                                                    data-id="{{ $brand->id }}">
                                                    Delete
                                                </a>
                                            </td>                                      
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4 px-3" id="pagination-container">
                        <div class="mb-3">
                            Showing {{ $brands->firstItem() }} to {{ $brands->lastItem() }} of {{ $brands->total() }}
                            results
                        </div>
                        <div class="pagination-container">
                            {{ $brands->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
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
                if (event.target.closest('.delete-brand')) {
                    let brandId = event.target.closest('.delete-brand').getAttribute('data-id');

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
                            // Send AJAX request to delete brand
                            fetch(`/delete-brand/${brandId}`, {
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
                                        // Remove the brand from the page
                                        document.querySelector(`#brand-item-${brandId}`)
                                            .remove();
                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: data.message,
                                            icon: 'success',
                                            timer: 1800,
                                            timerProgressBar: true,
                                            showConfirmButton: true
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: data.message,
                                            icon: 'error',
                                            timer: 1800,
                                            timerProgressBar: true,
                                            showConfirmButton: true
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
    <script src="assets/js/main.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4A69E2',
                timer: 1800,
                timerProgressBar: true
            });
        </script>
    @endif

</body>

</html>
