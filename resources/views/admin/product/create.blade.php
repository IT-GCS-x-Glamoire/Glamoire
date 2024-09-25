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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">

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

        .video-upload-wrap {
            border: 2px dashed #ddd;
            border-radius: 4px;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
            position: relative;
            background: #f8f8f8;
            margin-bottom: 15px;
            height: auto;
        }


        .file-upload-content {
            display: flex;
            flex-wrap: wrap;
        }

        .upload__video-box {
            position: relative;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            padding: 5px;
        }

        .upload__video-close {
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

        .upload__video-close:after {
            content: '\2716';
            /* Unicode character for 'X' */
            font-size: 14px;
            color: white;
        }

        /* Atur ukuran input type color agar sesuai dengan input type text */
        .input-color-size {
            height: calc(2.25rem + 2px);
            /* Sesuaikan tinggi input color dengan tinggi input text */
            padding: 0.375rem 0.75rem;
            /* Sesuaikan padding */
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
                            <h3>Add New Product</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/product-admin">Product</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
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
                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="first-name-icon">Product Name <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Product Name"
                                                                    id="first-name-icon" name="product_name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('product_name'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('product_name') }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="first-name-icon">Category <span
                                                                    style="color: red">*</span></label>
                                                            <div class="form-group">
                                                                <select
                                                                    class="form-control select2 {{ $errors->has('category_product_id') ? 'is-invalid' : '' }}"
                                                                    name="category_product_id">
                                                                    <option value="" disabled selected>Select
                                                                        Category</option> <!-- Placeholder -->
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="first-name-icon">Brand <span
                                                                    style="color: red">*</span></label>
                                                            <div class="form-group">
                                                                <select
                                                                    class="form-control select2 {{ $errors->has('brand_id') ? 'is-invalid' : '' }}"
                                                                    name="brand_id">
                                                                    <option value="" disabled selected>Select
                                                                        Brand</option> <!-- Placeholder -->
                                                                    @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->id }}">
                                                                            {{ $brand->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="product-code-input"
                                                            name="product_code">

                                                        <div class="mb-3">
                                                            <label for="first-name-icon">Description <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                                                                    id="description" cols="30" rows="10"></textarea>
                                                            </div>
                                                            @if ($errors->has('description'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('description') }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="first-name-icon">Stock Quantity <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('stock_quantity') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Stock Quantity"
                                                                    id="first-name-icon" name="stock_quantity">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cart"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('stock_quantity'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('stock_quantity') }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="first-name-icon">Regular Price <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('regular_price') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Regular Price"
                                                                    id="regular-price" name="regular_price">

                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-credit-card-2-front"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('regular_price'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('regular_price') }}</p>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group mb-3">
                                                            <label for="product-unit">Product Unit <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <select
                                                                    class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}"
                                                                    id="product-unit" name="unit">
                                                                    <option value="" disabled selected>Select
                                                                        Unit</option>
                                                                    <option value="kg">Kg</option>
                                                                    <option value="pcs">Pcs</option>
                                                                    <option value="litre">Litre</option>
                                                                    <option value="box">Box</option>
                                                                    <!-- Tambahkan opsi lain jika diperlukan -->
                                                                </select>
                                                            </div>
                                                            @if ($errors->has('unit'))
                                                                <p style="color: red">{{ $errors->first('unit') }}
                                                                </p>
                                                            @endif
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="product-color">Product Color</label>
                                                            <div class="position-relative">
                                                                <!-- Input Text untuk Warna -->
                                                                <span style="font-size: 3.6mm;">Input color
                                                                    text</span>
                                                                <input type="text"
                                                                    class="form-control mb-3 {{ $errors->has('color_text') ? 'is-invalid' : '' }}"
                                                                    id="product-color-text" name="color_text"
                                                                    placeholder="Enter color in hex code or name">

                                                                <!-- Input Picker Warna -->
                                                                <span style="font-size: 3.6mm;">Select color
                                                                    text</span>
                                                                <input type="color"
                                                                    class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }} input-color-size"
                                                                    id="product-color" name="color"
                                                                    value="#ffffff">
                                                            </div>
                                                        </div>

                                                        {{-- single image --}}
                                                        <div class="card">
                                                            <label for="first-name-icon">Product Thumbnail<span
                                                                    style="color: red">*</span></label>
                                                            <div class="image-upload-wrap"
                                                                id="single-image-upload-wrap"
                                                                style="border: 2px dashed #ddd; border-radius: 4px; padding: 20px; width: 100%; box-sizing: border-box; position: relative; background: #f8f8f8; margin-bottom: 15px; height: auto;">
                                                                <input type="file" name="main_image"
                                                                    class="file-upload-input"
                                                                    onchange="readURLSingle(this);" accept="image/*"
                                                                    style="position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                                                                <div class="drag-text"
                                                                    style="text-align: center; color: #888;">
                                                                    <p>Drag and drop a file or select to add Image
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <span id="main-image-error"
                                                                style="color: red; display: none;"></span>
                                                            <!-- Unik untuk Single Image -->

                                                            <div class="file-upload-content"
                                                                id="single-file-upload-content"
                                                                style="display: flex; flex-wrap: wrap;">
                                                                <!-- Gambar yang diunggah akan ditambahkan di sini -->
                                                            </div>
                                                        </div>

                                                        {{-- multiple image --}}
                                                        <div class="card">
                                                            <label for="first-name-icon">Product Gallery multiple
                                                                <span style="color: red">*</span></label>
                                                            <div class="image-upload-wrap" id="image-upload-wrap"
                                                                style="border: 2px dashed #ddd; border-radius: 4px; padding: 20px; width: 100%; box-sizing: border-box; position: relative; background: #f8f8f8; margin-bottom: 15px; height: auto;">
                                                                <input type="file" id="images" name="images[]"
                                                                    class="file-upload-input"
                                                                    onchange="handleFiles(this.files);"
                                                                    accept="image/*" multiple
                                                                    style="position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                                                                <div class="drag-text"
                                                                    style="text-align: center; color: #888;">
                                                                    <p>Drag and drop files or select add Image(s)
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <!-- Tempat pesan error -->
                                                            <span id="image-error"
                                                                style="color: red; display: none;"></span>

                                                            <div class="file-upload-content upload__img-wrap"
                                                                id="file-upload-content"
                                                                style="display: flex; flex-wrap: wrap;">
                                                                <!-- Gambar yang diunggah akan ditambahkan di sini -->
                                                            </div>
                                                        </div>

                                                        <!-- Video Upload -->
                                                        <div class="card">
                                                            <label for="video-upload">Upload Video</label>
                                                            <div class="video-upload-wrap" id="video-upload-wrap"
                                                                style="border: 2px dashed #ddd; border-radius: 4px; padding: 20px; width: 100%; box-sizing: border-box; position: relative; background: #f8f8f8; margin-bottom: 15px; height: auto;">
                                                                <input type="file" id="video" name="video"
                                                                    class="file-upload-input"
                                                                    onchange="readURLVideo(this);" accept="video/*"
                                                                    style="position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                                                                <div class="drag-text"
                                                                    style="text-align: center; color: #888;">
                                                                    <p>Drag and drop a video file or select to
                                                                        upload
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <span id="video-error"
                                                                style="color: red; display: none;"></span>
                                                            <!-- Unik untuk Video -->

                                                            <div class="file-upload-content"
                                                                id="video-file-upload-content"
                                                                style="display: flex; flex-wrap: wrap;">
                                                                <!-- Video that is uploaded will be added here -->
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

            <!-- Area to add new forms dynamically -->
            <div id="new-forms"></div>

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

    <!-- Include jQuery (if not included already) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    {{-- Auto Format Rupiah --}}
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // Tambahkan titik setiap 3 digit
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        document.getElementById('regular-price').addEventListener('input', function(e) {
            this.value = formatRupiah(this.value);
        });
    </script>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/pages/dashboard.js"></script>

    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>

    {{-- Upload Single Image --}}
    <script>
        // Single Image Upload
        function readURLSingle(input) {
            const singleUploadContent = document.getElementById('single-file-upload-content');
            const mainImageError = document.getElementById('main-image-error');
            singleUploadContent.innerHTML = ''; // Kosongkan konten jika sudah ada gambar sebelumnya
            mainImageError.style.display = 'none'; // Sembunyikan pesan error

            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Validasi ukuran file
                const maxSize = 2 * 1024 * 1024; // 2MB
                if (file.size > maxSize) {
                    mainImageError.textContent = 'Image file must be less than 2MB.';
                    mainImageError.style.display = 'block';
                    input.value = ''; // Reset input file
                    return;
                }

                // Validasi tipe file
                if (!file.type.match('image.*')) {
                    mainImageError.textContent = 'Only image files are allowed.';
                    mainImageError.style.display = 'block';
                    input.value = ''; // Reset input file
                    return;
                }

                // Jika validasi lolos, tampilkan gambar
                const reader = new FileReader();
                reader.onload = function(e) {
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

    {{-- multiple upload image --}}
    <script>
        let selectedFiles = [];

        function handleFiles(files) {
            const fileUploadContent = document.getElementById('file-upload-content');
            const imageError = document.getElementById('image-error');
            const totalFiles = selectedFiles.length + files.length;

            // Reset pesan error
            imageError.style.display = 'none';
            imageError.textContent = '';

            // Cek jika jumlah file melebihi 6
            if (totalFiles > 6) {
                imageError.textContent = 'You can upload a maximum of 6 images.';
                imageError.style.display = 'block';
                return;
            }

            // Tambahkan file ke array selectedFiles
            for (let i = 0; i < files.length; i++) {
                selectedFiles.push(files[i]);
            }

            // Tampilkan gambar di form
            Array.from(files).forEach(file => {
                const maxSize = 2 * 1024 * 1024; // 2MB
                if (file.size > maxSize) {
                    imageError.textContent = 'Each image file must be less than 2MB.';
                    imageError.style.display = 'block';
                    return;
                }

                if (!file.type.match('image.*')) return; // Hanya file gambar

                const reader = new FileReader();
                reader.onload = function(e) {
                    // Buat elemen gambar
                    const imgBox = document.createElement('div');
                    imgBox.classList.add('upload__img-box-multiple');

                    const imgBg = document.createElement('div');
                    imgBg.classList.add('img-bg');
                    imgBg.style.backgroundImage = `url(${e.target.result})`;

                    // Tambahkan tombol close
                    const imgClose = document.createElement('div');
                    imgClose.classList.add('upload__img-close');
                    imgClose.onclick = function() {
                        const index = Array.from(fileUploadContent.children).indexOf(imgBox);
                        selectedFiles.splice(index, 1);
                        fileUploadContent.removeChild(imgBox);
                    };

                    imgBg.appendChild(imgClose);
                    imgBox.appendChild(imgBg);
                    fileUploadContent.appendChild(imgBox);
                };
                reader.readAsDataURL(file);
            });
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            const fileInput = document.getElementById('images');
            const dataTransfer = new DataTransfer(); // Digunakan untuk menggabungkan file di input file

            selectedFiles.forEach(file => {
                dataTransfer.items.add(file);
            });

            fileInput.files = dataTransfer.files;
        });
    </script>

    {{-- upload vidio --}}
    <script>
        // Fungsi untuk mengunggah video
        function readURLVideo(input) {
            const videoUploadContent = document.getElementById('video-file-upload-content');
            const videoError = document.getElementById('video-error');
            videoUploadContent.innerHTML = ''; // Kosongkan konten jika sudah ada video sebelumnya
            videoError.style.display = 'none'; // Sembunyikan pesan error

            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Validasi ukuran file
                const maxSize = 5 * 1024 * 1024; // 5MB
                if (file.size > maxSize) {
                    videoError.textContent = 'Video file must be less than 5MB.';
                    videoError.style.display = 'block';
                    input.value = ''; // Reset input file
                    return;
                }

                if (!file.type.match('video.*')) return; // Pastikan file adalah video

                const reader = new FileReader();
                reader.onload = function(e) {
                    const videoBox = document.createElement('div');
                    videoBox.classList.add('upload__video-box');

                    const videoElement = document.createElement('video');
                    videoElement.src = e.target.result;
                    videoElement.controls = true;
                    videoElement.style.maxWidth = '100%';
                    videoElement.style.maxHeight = '100%';

                    // Tambahkan tombol close
                    const videoClose = document.createElement('div');
                    videoClose.classList.add('upload__video-close');
                    videoClose.onclick = function() {
                        videoUploadContent.innerHTML = ''; // Hapus video jika tombol close diklik
                        input.value = ''; // Reset input file
                    };

                    videoBox.appendChild(videoElement);
                    videoBox.appendChild(videoClose);
                    videoUploadContent.appendChild(videoBox);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>


    {{-- multi form --}}
    

    <script src="assets/js/main.js"></script>

</body>

</html>
