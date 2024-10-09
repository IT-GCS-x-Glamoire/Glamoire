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
                                        data-bs-target="#mainCategoryModal" style="border-radius: 8px;">
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
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->products->count() }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary add-subcategory"
                                                    data-id="{{ $category->id }}" data-type="subcategory">Add
                                                    Subcategory</button>
                                                <button class="btn btn-sm btn-warning edit-category"
                                                    data-id="{{ $category->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-category"
                                                    data-id="{{ $category->id }}">Delete</button>
                                            </td>
                                        </tr>
                                        @if ($category->children->count() > 0)
                                            @foreach ($category->children as $subcategory)
                                                <tr>
                                                    <td>-- {{ $subcategory->name }}</td>
                                                    <td>{{ $subcategory->products->count() }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary add-subcategory"
                                                            data-id="{{ $subcategory->id }}" data-type="option">Add
                                                            Option</button>
                                                        <button class="btn btn-sm btn-warning edit-category"
                                                            data-id="{{ $subcategory->id }}">Edit</button>
                                                        <button class="btn btn-sm btn-danger delete-category"
                                                            data-id="{{ $subcategory->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                                @if ($subcategory->children->count() > 0)
                                                    @foreach ($subcategory->children as $option)
                                                        <tr>
                                                            <td>---- {{ $option->name }}</td>
                                                            <td>{{ $option->products->count() }}</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-warning edit-category"
                                                                    data-id="{{ $option->id }}">Edit</button>
                                                                <button class="btn btn-sm btn-danger delete-category"
                                                                    data-id="{{ $option->id }}">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>


            <div class="modal fade text-left" id="mainCategoryModal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Form Add Categories</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form id="mainCategoryForm">
                            @csrf
                            <input type="hidden" name="type" value="category">
                            <div class="modal-body">
                                <label>Category Name <span style="color: red">*</span> </label>
                                <div class="form-group mt-2">
                                    <input type="text" placeholder="Enter Category Name" class="form-control"
                                        name="name" id="mainCategoryName">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-primary ml-1">
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for subcategory and option -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog"
                aria-labelledby="categoryModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="categoryForm">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" id="parentId" name="parent_id">
                                <input type="hidden" id="categoryType" name="type">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


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
            // Main category form submission
            $('#mainCategoryForm').on('submit', function(e) {
                e.preventDefault();
                submitCategoryForm($(this), '#mainCategoryModal');
            });

            // Subcategory and option form submission
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault();
                submitCategoryForm($(this), '#categoryModal');
            });

            $('.add-subcategory').click(function() {
                $('#parentId').val($(this).data('id'));
                $('#categoryType').val($(this).data('type'));
                $('#categoryModalLabel').text('Add ' + $(this).data('type'));
                $('#categoryModal').modal('show');
            });

            function submitCategoryForm(form, modalId) {
                $.ajax({
                    url: "{{ route('create-category-product') }}",
                    type: "POST",
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            $(modalId).modal('hide');
                            form[0].reset();
                            Swal.fire({
                                title: 'Success!',
                                text: 'Category has been successfully created.',
                                icon: 'success',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#4A69E2',
                                customClass: {
                                    icon: 'swal-icon-success'
                                }
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        Swal.fire('Error!', 'An error occurred while creating the category.', 'error');
                    }
                });
            }

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

    <script>
        $(document).ready(function() {
            $('.add-subcategory').click(function() {
                $('#parentId').val($(this).data('id'));
                $('#categoryType').val($(this).data('type'));
                $('#categoryModalLabel').text('Add ' + $(this).data('type'));
                $('#categoryModal').modal('show');
            });

            $('#saveCategory').click(function() {
                $.ajax({
                    url: '/create-category-product',
                    method: 'POST',
                    data: $('#categoryForm').serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#categoryModal').modal('hide');
                            location.reload(); // Reload the page to show new category
                        }
                    },
                    error: function(xhr) {
                        // Handle errors
                        console.log(xhr.responseText);
                    }
                });
            });

            // Add edit and delete functionality here
        });
    </script>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
