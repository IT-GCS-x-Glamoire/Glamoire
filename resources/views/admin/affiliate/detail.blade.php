<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detailproduct.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

    <style>
        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .upload__img-box-single,
        .upload__video-box {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .upload__img-box-single {
            width: 100%;
            max-width: 457px;
            height: auto;
            aspect-ratio: 457 / 444;
            /* Maintain aspect ratio */
        }

        .upload__img-box-multiple {
            position: relative;
            width: 100%;
            max-width: 180px;
            height: auto;
            aspect-ratio: 1;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .upload__video-box {
            width: 100%;
            max-width: 457px;
            height: auto;
            aspect-ratio: 16 / 9;
            /* Maintain aspect ratio for video */
        }

        .img-bg-single,
        .img-bg,
        .video-bg {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .video-bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Make sure the video covers the container */
        }

        .upload__img-close,
        .upload__video-close {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            padding: 2px;
            cursor: pointer;
        }
    </style>


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
                            <h3>Detail Affiliate</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/product-admin"
                                            style="text-decoration: none;">Affiliate</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Affiliate</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section id="multiple-column-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <!-- Kolom Kiri -->
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="product-name">Full Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-name" value="{{ $partners->fullname }}"
                                                                    disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-icon-left">
                                                            <label for="product-name">Company Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-name"
                                                                    value="{{ $partners->company_name }}" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group has-icon-left">
                                                            <label for="product-name">Hnadphone</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-name"
                                                                    value="{{ $partners->handphone }}" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-icon-left">
                                                            <label for="product-name">Email</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-name" value="{{ $partners->email }}"
                                                                    disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="product-code">Category Product</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-code"
                                                                    value="{{ $partners->category_product }}" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-upc"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="first-name-icon">Description</label>
                                                            <div class="position-relative">
                                                                <textarea class="form-control" name="description" id="description" cols="30" rows="20" disabled>{{ $partners->description }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="file-company">File Company</label>
                                                            <div class="position-relative">
                                                                @if ($partners->fileCompany)
                                                                    <a href="{{ asset('storage/' . $partners->fileCompany->file_path) }}"
                                                                        target="_blank">
                                                                        {{ $partners->fileCompany->file_name }}
                                                                    </a>
                                                                @else
                                                                    <span>Tidak ada file company yang diunggah</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="file-bpom">File BPOM</label>
                                                            <div class="position-relative">
                                                                @if ($partners->fileBpom)
                                                                    <a href="{{ asset('storage/' . $partners->fileBpom->file_path) }}"
                                                                        target="_blank">
                                                                        {{ $partners->fileBpom->file_name }}
                                                                    </a>
                                                                @else
                                                                    <span>Tidak ada file BPOM yang diunggah</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>BPOM :</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check me-3">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="bpom" id="bpomYes"
                                                                            value="1"
                                                                            {{ $partners->bpom ? 'checked' : '' }}
                                                                            disabled>
                                                                        <label class="form-check-label"
                                                                            for="bpomYes">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="bpom" id="bpomNo"
                                                                            value="0"
                                                                            {{ !$partners->bpom ? 'checked' : '' }}
                                                                            disabled>
                                                                        <label class="form-check-label"
                                                                            for="bpomNo">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Adakah distributor resmi di Indonesia? :</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check me-3">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="distributor" id="distributorYes"
                                                                            value="1"
                                                                            {{ $partners->distributor ? 'checked' : '' }}
                                                                            disabled>
                                                                        <label class="form-check-label"
                                                                            for="distributorYes">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="distributor" id="distributorNo"
                                                                            value="0"
                                                                            {{ !$partners->distributor ? 'checked' : '' }}
                                                                            disabled>
                                                                        <label class="form-check-label"
                                                                            for="distributorNo">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Pernah Menghubungi Glamoire via Email Sebelumnya
                                                                    ?</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check me-3">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="email" id="emailYes"
                                                                            value="1"
                                                                            {{ $partners->reached_email ? 'checked' : '' }}
                                                                            disabled>
                                                                        <label class="form-check-label"
                                                                            for="emailYes">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="email" id="emailNo"
                                                                            value="0"
                                                                            {{ !$partners->reached_email ? 'checked' : '' }}
                                                                            disabled>
                                                                        <label class="form-check-label"
                                                                            for="emailNo">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="category_product">Category Product</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="category_product" value="{{ $partners->category_product }}"
                                                                    disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <script>
        // Fungsi untuk membuka gambar di tab baru
        function openImageInNewTab(url) {
            window.open(url, '_blank');
        }
    </script>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>

    <!-- toastify -->
    <script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>

</body>

</html>
