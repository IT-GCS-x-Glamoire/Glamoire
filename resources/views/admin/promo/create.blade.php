<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">

    <!-- FilePond CSS -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">


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
                            <h3>Add New Promo</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('index-promo') }}">Promo</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Promo</li>
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
                                        <form action="{{ route('store-product-admin') }}" class="form form-vertical"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Promo Name <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('promo_name') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Product Name"
                                                                    id="first-name-icon" name="promo_name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('promo_name'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('promo_name') }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Start Date <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="date"
                                                                    class="form-control {{ $errors->has('diskon') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Code Product"
                                                                    id="first-name-icon" name="diskon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-receipt"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('diskon'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('diskon') }}</p>
                                                            @endif
                                                        </div>


                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Stock Quantity <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Stock Quantity"
                                                                    id="first-name-icon" name="stock_quantity">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cart"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Diskon <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('diskon') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Code Product"
                                                                    id="first-name-icon" name="diskon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-receipt"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('diskon'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('diskon') }}</p>
                                                            @endif
                                                        </div>


                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">End Date <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="date"
                                                                    class="form-control {{ $errors->has('diskon') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Code Product"
                                                                    id="first-name-icon" name="diskon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-receipt"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('diskon'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('diskon') }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="card">
                                                            <label for="first-name-icon">Product Galery <span
                                                                    style="color: red">*</span></label>
                                                            {{-- <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- File uploader with multiple files upload -->
                                                                    <input type="file" class="form-control" name="image" required>
                                                                </div>
                                                            </div> --}}

                                                            <div class="image-upload-wrap" id="image-upload-wrap">
                                                                <input type="file" name="image"
                                                                    class="file-upload-input"
                                                                    onchange="readURL(this, '');" accept="image/*">

                                                                <div class="drag-text">
                                                                    <p>Drag and drop a file or select add
                                                                        Image</p>
                                                                </div>
                                                            </div>
                                                            <div class="file-upload-content" id="file-upload-content"
                                                                style="display:none;">
                                                                <div class="image-file-name" id="image-file-name"
                                                                    style="text-align: center; margin-top: 10px;">
                                                                </div>
                                                                <img class="file-upload-image" id="file-upload-image"
                                                                    src="#" alt="your image"
                                                                    style="max-width: 100%; max-height: 100%;" />
                                                                <div class="image-title-wrap"
                                                                    style="display: flex; justify-content: space-between; align-items: center;">
                                                                    <button type="button"
                                                                        onclick="removeUpload(this, '')"
                                                                        class="btn btn-danger btn-sm"
                                                                        style="border: none; background: none;">
                                                                        <i class="fa-solid fa-trash"
                                                                            style="font-size: 1.5rem; color: black;"></i>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary me-1 mb-1"
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
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/vendors/choices.js/choices.min.js"></script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // register plugins for image preview and multiple uploads
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType
        );

        // Filepond: Multiple Files with Image Preview
        FilePond.create(document.querySelector('.multiple-files-filepond'), {
            allowImagePreview: true,
            allowMultiple: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        });
    </script>


    <script>
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('file-upload-content' + id).style.display = 'block';
                    document.getElementById('image-upload-wrap' + id).style.display = 'none';
                    document.getElementById('file-upload-image' + id).src = e.target.result;
                    document.getElementById('image-file-name' + id).innerHTML = input.files[0].name;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload(input, id);
            }
        }

        function removeUpload(input, id) {
            document.getElementById('file-upload-content' + id).style.display = 'none';
            document.getElementById('image-upload-wrap' + id).style.display = 'block';
            input.value = '';
        }


        // Menonaktifkan aksi default dari tombol "Upload Proof Image"
        document.getElementById('uploadProofButton').addEventListener('click', function(e) {
            e.preventDefault();
        });

        // Menangani klik tombol "Submit" di luar divisi upload gambar
        document.getElementById('submitButton').addEventListener('click', function() {
            submitForm();
        });
    </script>

    <script src="assets/js/main.js"></script>

</body>

</html>
