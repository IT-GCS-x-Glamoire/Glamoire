<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

    <style>
        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box-multiple {
            width: 195px;
            padding: 0 10px;
            margin-bottom: 12px;
            position: relative;
        }

        .upload__img-box-single {
            width: 450px;
            padding: 0 10px;
            margin-bottom: 12px;
            position: relative;
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
                            <h3>Add New Promo Diskon</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('index-promo-ongkir') }}">Promo
                                            Diskon</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Promo Diskon</li>
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
                                        <form action="{{ route('store-promo-diskon') }}" class="form form-vertical"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="type" value="diskon">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left"
                                                            style="margin-bottom: 20px;">
                                                            <label for="first-name-icon">Diskon Name <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('promo_name') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Diskon Name" id="first-name-icon"
                                                                    name="promo_name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('promo_name'))
                                                                <p style="color: red">{{ $errors->first('promo_name') }}
                                                                </p>
                                                            @endif
                                                        </div>

                                                        <div class="form-group has-icon-left"
                                                            style="margin-bottom: 20px;">
                                                            <label for="first-name-icon">Start Date <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="date"
                                                                    class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Code Product"
                                                                    id="first-name-icon" name="start_date">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('start_date'))
                                                                <p style="color: red">{{ $errors->first('start_date') }}
                                                                </p>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left"
                                                            style="margin-bottom: 20px;">
                                                            <label for="first-name-icon">Diskon <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('diskon') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Diskon" id="first-name-icon"
                                                                    name="diskon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-percent"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('diskon'))
                                                                <p style="color: red">{{ $errors->first('diskon') }}
                                                                </p>
                                                            @endif
                                                        </div>

                                                        <div class="form-group has-icon-left"
                                                            style="margin-bottom: 20px;">
                                                            <label for="first-name-icon">End Date <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="date"
                                                                    class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Code Product"
                                                                    id="first-name-icon" name="end_date">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('end_date'))
                                                                <p style="color: red">{{ $errors->first('end_date') }}
                                                                </p>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-12" style="margin-bottom: 20px;">
                                                        <div class="mb-2">
                                                            <label for="first-name-icon">Pilih Produk <span
                                                                    style="color: red">*</span></label>
                                                        </div>
                                                        <table class="table" id="table1">
                                                            <thead>
                                                                <tr>
                                                                    <th>✔</th>
                                                                    <th>Product</th>
                                                                    <th>Stock</th>
                                                                    <th>Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($products as $product)
                                                                    <tr>
                                                                        <td>
                                                                            <input type="checkbox"
                                                                                name="product_ids[]"
                                                                                value="{{ $product->id }}">
                                                                        </td>
                                                                        <td>
                                                                            <img src="{{ Storage::url($product->main_image) }}"
                                                                                loading="lazy" class="lazyload"
                                                                                alt="Product Image"
                                                                                style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover;">
                                                                            {{ $product->product_name }}
                                                                        </td>
                                                                        <td>{{ $product->stock_quantity }}</td>
                                                                        <td>Rp.
                                                                            {{ number_format($product->regular_price, 0, ',', '.') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary me-1 mb-1"
                                                            style="border-radius: 8px; margin-bottom: 20px;">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light-secondary me-1 mb-1"
                                                            style="border-radius: 8px; margin-bottom: 20px;">Reset</button>
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

            @include('admin.layouts.footer')

        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/pages/dashboard.js"></script>
    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>

    <script>
        // Fungsi untuk mengunggah satu gambar
        function readURLSingle(input) {
            const singleUploadContent = document.getElementById('single-file-upload-content');
            singleUploadContent.innerHTML = ''; // Kosongkan konten jika sudah ada gambar sebelumnya

            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (!file.type.match('image.*')) return; // Hanya file gambar

                const reader = new FileReader();
                reader.onload = function(e) {
                    // Buat elemen gambar
                    const imgBox = document.createElement('div');
                    imgBox.classList.add('upload__img-box-single');

                    const imgBg = document.createElement('div');
                    imgBg.classList.add('img-bg');
                    imgBg.style.backgroundImage = `url(${e.target.result})`;

                    // Tambahkan tombol close
                    const imgClose = document.createElement('div');
                    imgClose.classList.add('upload__img-close');
                    imgClose.onclick = function() {
                        singleUploadContent.innerHTML = ''; // Hapus gambar jika tombol close diklik
                        input.value = ''; // Reset input file
                    };

                    imgBg.appendChild(imgClose);
                    imgBox.appendChild(imgBg);
                    singleUploadContent.appendChild(imgBox);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script src="assets/js/main.js"></script>
</body>

</html>
