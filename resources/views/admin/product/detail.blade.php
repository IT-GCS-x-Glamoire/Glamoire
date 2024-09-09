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

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

    <style>
        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box-multiple {
            width: 180px;
            padding: 0 10px;
            margin-bottom: 12px;
            position: relative;
        }

        .upload__img-box-single {
            width: 457px;
            /* Sesuaikan lebar */
            padding: 0 10px;
            margin-bottom: 12px;
            position: relative;
        }

        .img-bg-single {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            width: 457px;
            /* Lebar gambar */
            height: 444px;
            /* Tinggi gambar */
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
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
                            <h3>Detail Product</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/product-admin"
                                            style="text-decoration: none;">Product</a></li>
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
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="product-name">Product Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-name"
                                                                    value="{{ $product->product_name }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="product-code">Code </label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-code"
                                                                    value="{{ $product->product_code }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-upc"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="category-product">Category Product </label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="category-product"
                                                                    value="{{ $product->categoryProduct->name }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bookmark"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="brand-name">Brand</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="brand-name"
                                                                    value="{{ $product->brand->name }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-file-earmark-medical"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="stock-quantity">Stock Quantity </label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="stock-quantity"
                                                                    value="{{ $product->stock_quantity }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cart"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="regular-price">Regular Price </label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="regular-price"
                                                                    value="{{ $product->regular_price }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-credit-card-2-front"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="sale-price">Sale Price </label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="sale-price"
                                                                    value="{{ $product->sale_price }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-credit-card-2-front"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="product-image">Main Image</label>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    @if (!empty($product->main_image))
                                                                        <div class="upload__img-wrap">
                                                                            <div class="upload__img-box-single">
                                                                                <div class="img-bg-single"
                                                                                    style="background-image: url('{{ asset($product->main_image) }}');"
                                                                                    onclick="openImageInNewTab('{{ asset($product->main_image) }}')">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <p>No image available</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label for="product-gallery">Product Gallery</label>
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                @if (!empty($product->images) && is_array($product->images))
                                                                    <div class="upload__img-wrap">
                                                                        @foreach ($product->images as $image)
                                                                            <div class="upload__img-box-multiple">
                                                                                <div class="img-bg"
                                                                                    style="background-image: url('{{ asset($image) }}');"
                                                                                    onclick="openImageInNewTab('{{ asset($image) }}')">
                                                                                </div>
                                                                                <div class="upload__img-close"
                                                                                    onclick="removeImage('{{ $image }}')">
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @else
                                                                    <p>No images available</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary me-1 mb-1"
                                                            style="border-radius: 8px;">Update</button>
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

    <script>
        function openImageInNewTab(imageUrl) {
            window.open(imageUrl, '_blank');
        }

        function removeImage(imagePath) {
            alert('Image removed: ' + imagePath);
            // Logika penghapusan gambar
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
