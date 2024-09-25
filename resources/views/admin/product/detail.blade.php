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

    {{-- <style>
        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .upload__img-box-single {
            position: relative;
            width: 457px;
            height: 444px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .upload__img-box-multiple {
            position: relative;
            width: 180px;
            height: 180px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .img-bg-single,
        .img-bg {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .upload__img-close {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            padding: 2px;
            cursor: pointer;
        }
    </style> --}}

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
                                                            <label for="product-name">Product Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-name"
                                                                    value="{{ $product->product_name }}"
                                                                    name="product_name" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="product-code">Product Code</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-code"
                                                                    value="{{ $product->product_code }}"
                                                                    name="product_code" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-upc"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="first-name-icon">Description</label>
                                                            <div class="position-relative">
                                                                <textarea class="form-control" name="description" id="description" cols="30" rows="20" disabled>{{ $product->description }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="category-product">Category Product</label>
                                                            <div class="position-relative">
                                                                <select class="form-control" id="category-product"
                                                                    name="category_product_id" disabled>
                                                                    <option value="">Select Category</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $product->categoryProduct && $product->categoryProduct->id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bookmark"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="brand-name">Brand</label>
                                                            <div class="position-relative">
                                                                <select class="form-control" id="brand-name"
                                                                    name="brand_id" disabled>
                                                                    <option value="">Select Brand</option>
                                                                    @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->id }}"
                                                                            {{ $product->brand && $product->brand->id == $brand->id ? 'selected' : '' }}>
                                                                            {{ $brand->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-file-earmark-medical"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="stock-quantity">Stock Quantity</label>
                                                            <div class="position-relative">
                                                                <input type="number" class="form-control"
                                                                    id="stock-quantity" name="stock_quantity"
                                                                    value="{{ old('stock_quantity', $product->stock_quantity) }}"
                                                                    disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cart"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="product-unit">Product Unit</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="product-unit" value="{{ $product->unit }}"
                                                                    name="product_unit" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-upc"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-icon-left">
                                                            <label for="regular-price">Regular Price</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    id="regular-price" name="regular_price"
                                                                    value="Rp. {{ number_format($product->regular_price, 0, ',', '.') }}"
                                                                    disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-credit-card-2-front"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group mb-3">
                                                            <label for="product-color">Product Color</label>
                                                            <div class="position-relative">
                                                                <input type="color" class="form-control"
                                                                    id="product-color" name="color"
                                                                    value="{{ $product->color }}" disabled>
                                                            </div>
                                                        </div> --}}

                                                        <div class="form-group mb-3">
                                                            <label for="product-color">Product Color</label>
                                                            <div class="position-relative">
                                                                @if ($product->color_text)
                                                                    <!-- Input teks untuk color_text -->
                                                                    <input type="text" class="form-control" id="product-color-text" name="color_text"
                                                                        value="{{ $product->color_text }}" disabled>
                                                                @elseif ($product->color)
                                                                    <!-- Input warna untuk color -->
                                                                    <input type="color" class="form-control" id="product-color" name="color"
                                                                        value="{{ $product->color }}" disabled>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <!-- Kolom Kanan -->
                                                    <div class="col-md-6 col-12">
                                                        <!-- Main Image Upload with Drag and Drop -->
                                                        <label for="main-image" class="mb-3">Product
                                                            Thumbnail</label>
                                                        <div class="file-upload-content mb-4"
                                                            id="single-file-upload-content">
                                                            @if (!empty($product->main_image))
                                                                <div class="upload__img-wrap">
                                                                    <div class="upload__img-box-single">
                                                                        <div class="img-bg-single"
                                                                            style="background-image: url('{{ asset($product->main_image) }}');"
                                                                            onclick="openImageInNewTab('{{ asset($product->main_image) }}')">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Gallery -->
                                                        <label for="product-gallery" class="mb-3 mt-4">Product
                                                            Gallery</label>
                                                        <div class="file-upload-content upload__img-wrap"
                                                            id="file-upload-content">
                                                            @if (!empty($product->images) && is_array($product->images))
                                                                @foreach ($product->images as $image)
                                                                    <div class="upload__img-box-multiple">
                                                                        <div class="img-bg"
                                                                            style="background-image: url('{{ asset($image) }}');"
                                                                            onclick="openImageInNewTab('{{ asset($image) }}')">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                        <label for="video-upload" class="mb-3 mt-4">Product
                                                            Video</label>
                                                        <div class="file-upload-content mb-4"
                                                            id="video-file-upload-content">
                                                            @if (!empty($product->video))
                                                                <div class="upload__video-box">
                                                                    <video class="video-bg" controls>
                                                                        <source src="{{ asset($product->video) }}"
                                                                            type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>

                                                                </div>
                                                            @endif
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
