{{-- {% set title = 'DataTable' %}
{% set filename = 'table-datatable.html' %}

{% extends 'layouts/master.html' %}
{% block content %} --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Product || Admin Glamoire</title>

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
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3>All Category</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/category-product">Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4>List Categories</h4>
                                </div>
                                <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                                    <a href="#" type="button"
                                        class="btn btn-sm btn-primary d-flex align-items-center" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm" style="border-radius: 8px;">
                                        <i class="bi bi-plus-circle" style="margin-right: 3px;"></i> Add Category
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Total Product</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryProduct as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <!-- Jika Anda memiliki data total produk -->
                                                <span class="badge bg-light-success">{{ $item->products_count }}</span>
                                            </td>
                                            <td>
                                                <a href="/order-detail" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil" style="margin-right: 3px"></i>Edit </a>
                                                <button class="btn btn-sm btn-danger delete-category"
                                                    data-id="{{ $item->id }}"> <i class="bi bi-trash"
                                                        style="margin-right: 3px"></i>Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </div>


            <!-- Modal -->
            <form id="categoryForm">
                @csrf
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

                            <div class="modal-body">
                                <label>Category Name <span style="color: red">*</span> </label>
                                <div class="form-group mt-2">
                                    <input type="text" placeholder="Enter Category Name" class="form-control"
                                        name="name" id="name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-primary ml-1">
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @include('admin.layouts.footer')

        </div>
    </div>

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault();

                let name = $('#name').val();
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('create-category-product') }}",
                    type: "POST",
                    data: {
                        name: name,
                        _token: _token
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#inlineForm').modal('hide');

                            // Bersihkan form
                            $('#categoryForm')[0].reset();

                            // Tampilkan SweetAlert sukses
                            Swal.fire({
                                title: 'Success!',
                                text: 'Category has been successfully created.',
                                icon: 'success',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#4A69E2', // Mengatur warna tombol OK
                                customClass: {
                                    icon: 'swal-icon-success'
                                }
                            });

                            // Refresh halaman setelah 1,5 detik
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                    }
                });
            });

            $(document).on('click', '.delete-category', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4A69E2',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/category-product/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Category has been deleted.',
                                        'success'
                                    );

                                    // Refresh halaman setelah 1,5 detik
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1500);
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        response.message,
                                        'error'
                                    );
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
