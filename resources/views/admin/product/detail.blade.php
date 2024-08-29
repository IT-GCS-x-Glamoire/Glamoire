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
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3>Detail Product</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/product-admin">Product</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
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
                                                            <label for="first-name-icon">Product Name <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    value="Bedak Bubuk" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Code <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    value="B080898" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-receipt"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label for="first-name-icon">Category <span
                                                                style="color: red">*</span></label>
                                                        <div class="form-group">
                                                            <select class="choices form-select">
                                                                <option value="square">Square</option>
                                                                <option value="rectangle">Rectangle</option>
                                                                <option value="rombo">Rombo</option>
                                                                <option value="romboid">Romboid</option>
                                                                <option value="trapeze">Trapeze</option>
                                                                <option value="traible">Triangle</option>
                                                                <option value="polygon">Polygon</option>
                                                            </select>
                                                        </div>

                                                        <label for="first-name-icon">Brand <span
                                                                style="color: red">*</span></label>
                                                        <div class="form-group">
                                                            <select class="choices form-select">
                                                                <option value="square">Square</option>
                                                                <option value="rectangle">Rectangle</option>
                                                                <option value="rombo">Rombo</option>
                                                                <option value="romboid">Romboid</option>
                                                                <option value="trapeze">Trapeze</option>
                                                                <option value="traible">Triangle</option>
                                                                <option value="polygon">Polygon</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Stock Quantity <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    value="120" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cart"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Regular Price <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    value="Rp. 120.000" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-credit-card-2-front"></i>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Sale Price <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    value="Rp. 120.000" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-credit-card-2-front"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <label for="first-name-icon">Product Gallery <span
                                                                    style="color: red">*</span></label>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Menampilkan gambar dari path yang diberikan -->
                                                                    <img src="{{ asset('assets/images/samples/banana.jpg') }}"
                                                                        alt="Product Image"
                                                                        style="width: 457px; height: 444; border-radius: 8px; object-fit: cover; margin-bottom: 10px;">

                                                                    <!-- File uploader with multiple files upload -->
                                                                    <input type="file"
                                                                        class="multiple-files-filepond" multiple>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary me-1 mb-1">Update</button>
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light-secondary me-1 mb-1">Reset</button>
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

    <script src="assets/js/main.js"></script>
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
        // register desired plugins...
        FilePond.registerPlugin(
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
            FilePondPluginImageCrop,
            FilePondPluginImagePreview,
            FilePondPluginImageFilter,
            FilePondPluginImageExifOrientation,
            FilePondPluginImageResize,
        );

        // Filepond: Basic
        FilePond.create(document.querySelector('.basic-filepond'), {
            allowImagePreview: false,
            allowMultiple: false,
            allowFileEncode: false,
            required: false
        });

        // Filepond: Multiple Files with Preview
        FilePond.create(document.querySelector('.multiple-files-filepond'), {
            allowImagePreview: true,
            allowMultiple: true,
            allowFileEncode: false,
            required: false,
            imagePreviewMaxHeight: 250, // Maximum height for preview images
        });

        // Example of handling image preview for a specific FilePond instance
        FilePond.create(document.querySelector('.image-preview-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            imagePreviewMaxHeight: 150, // Maximum height for preview images
        });


        // Filepond: With Validation
        FilePond.create(document.querySelector('.with-validation-filepond'), {
            allowImagePreview: false,
            allowMultiple: true,
            allowFileEncode: false,
            required: true,
            acceptedFileTypes: ['image/png'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: ImgBB with server property
        FilePond.create(document.querySelector('.imgbb-filepond'), {
            allowImagePreview: false,
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                    // We ignore the metadata property and only send the file

                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);

                    const request = new XMLHttpRequest();
                    // you can change it by your client api key
                    request.open('POST', 'https://api.imgbb.com/1/upload?key=762894e2014f83c023b233b2f10395e2');

                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        } else {
                            error('oh no');
                        }
                    };

                    request.onreadystatechange = function() {
                        if (this.readyState == 4) {
                            if (this.status == 200) {
                                let response = JSON.parse(this.responseText);

                                Toastify({
                                    text: "Success uploading to imgbb! see console f12",
                                    duration: 3000,
                                    close: true,
                                    gravity: "bottom",
                                    position: "right",
                                    backgroundColor: "#4fbe87",
                                }).showToast();

                                console.log(response);
                            } else {
                                Toastify({
                                    text: "Failed uploading to imgbb! see console f12",
                                    duration: 3000,
                                    close: true,
                                    gravity: "bottom",
                                    position: "right",
                                    backgroundColor: "#ff0000",
                                }).showToast();

                                console.log("Error", this.statusText);
                            }
                        }
                    };

                    request.send(formData);
                }
            }
        });

        // // Filepond: Image Preview
        // FilePond.create(document.querySelector('.image-preview-filepond'), {
        //     allowImagePreview: true,
        //     allowImageFilter: false,
        //     allowImageExifOrientation: false,
        //     allowImageCrop: false,
        //     acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        //     fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //         // Do custom type detection here and return with promise
        //         resolve(type);
        //     })
        // });

        // Filepond: Image Crop
        FilePond.create(document.querySelector('.image-crop-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Exif Orientation
        FilePond.create(document.querySelector('.image-exif-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: true,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Filter
        FilePond.create(document.querySelector('.image-filter-filepond'), {
            allowImagePreview: true,
            allowImageFilter: true,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            imageFilterColorMatrix: [
                0.299, 0.587, 0.114, 0, 0,
                0.299, 0.587, 0.114, 0, 0,
                0.299, 0.587, 0.114, 0, 0,
                0.000, 0.000, 0.000, 1, 0
            ],
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Resize
        FilePond.create(document.querySelector('.image-resize-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            allowImageResize: true,
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            imageResizeMode: 'cover',
            imageResizeUpscale: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });
    </script>
</body>

</html>
