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
                            <h3>Add New Product Variant</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('index-product-variant-admin') }}">Product Variant</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Product Variant</li>
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
                                        {{-- <form action="{{ route('store-product-variant-admin') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Input untuk Produk -->
                                            <div class="form-group">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" name="product_name" class="form-control" required>
                                            </div>

                                            <!-- Input untuk variasi produk (warna, ukuran, stok, harga) -->
                                            <div class="form-group">
                                                <label>Variasi Produk</label>
                                                <div id="variation-container">
                                                    <div class="variation-item">
                                                        <label for="color">Color</label>
                                                        <input type="text" name="variations[0][color]"
                                                            class="form-control" required>

                                                        <label for="size">Size (optional)</label>
                                                        <input type="text" name="variations[0][size]"
                                                            class="form-control">

                                                        <label for="stock_quantity">Stock Quantity</label>
                                                        <input type="number" name="variations[0][stock_quantity]"
                                                            class="form-control" required>

                                                        <label for="price">Price</label>
                                                        <input type="number" name="variations[0][price]"
                                                            class="form-control" required>

                                                        <button type="button"
                                                            class="btn btn-danger remove-variation">Remove</button>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-success" id="add-variation">Add
                                                    Variation</button>
                                            </div>

                                            <!-- Tombol Submit -->
                                            <button type="submit" class="btn btn-primary">Save Product</button>
                                        </form> --}}

                                        <form action="{{ route('store-product-variant-admin') }}"
                                            class="form form-vertical" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <!-- Dropdown untuk memilih produk utama -->
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="main-product">Main Product <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <select
                                                                    class="form-control select2 {{ $errors->has('product_id') ? 'is-invalid' : '' }}"
                                                                    name="product_id" id="main-product">
                                                                    <option value="" disabled selected>Select
                                                                        Product</option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}">
                                                                            {{ $product->product_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @if ($errors->has('product_id'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('product_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <!-- Input untuk Warna Varian -->
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="variant-color">Variant Color <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Variant Color" id="variant-color"
                                                                    name="color">
                                                            </div>
                                                            @if ($errors->has('color'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('color') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <!-- Input untuk Ukuran Varian -->
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="variant-size">Variant Size (Optional)</label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('variant_size') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Variant Size" id="variant-size"
                                                                    name="variant_size">
                                                            </div>
                                                            @if ($errors->has('variant_size'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('variant_size') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <!-- Input untuk Harga Varian -->
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="variant-price">Price <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Variant Price" id="variant-price"
                                                                    name="price">
                                                            </div>
                                                            @if ($errors->has('price'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('price') }}</p>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <!-- Input untuk Stok Varian -->
                                                    <div class="col-md-6">
                                                        <div class="form-group has-icon-left mb-3">
                                                            <label for="variant-stock">Stock <span
                                                                    style="color: red">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('stock_quantity') ? 'is-invalid' : '' }}"
                                                                    placeholder="Enter Variant Stock"
                                                                    id="variant-stock" name="stock_quantity">
                                                            </div>
                                                            @if ($errors->has('stock_quantity'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('stock_quantity') }}</p>
                                                            @endif
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
                                                                    <p>Drag and drop a file or select to add Image</p>
                                                                </div>
                                                            </div>

                                                            <div class="file-upload-content"
                                                                id="single-file-upload-content"
                                                                style="display: flex; flex-wrap: wrap;">
                                                                <!-- Gambar yang diunggah akan ditambahkan di sini -->
                                                            </div>
                                                        </div>

                                                        {{-- multiple image --}}
                                                        <div class="card">
                                                            <label for="first-name-icon">Product Gallery multiple <span
                                                                    style="color: red">*</span></label>
                                                            <div class="image-upload-wrap" id="image-upload-wrap"
                                                                style="border: 2px dashed #ddd; border-radius: 4px; padding: 20px; width: 100%; box-sizing: border-box; position: relative; background: #f8f8f8; margin-bottom: 15px; height: auto;">
                                                                <input type="file" id="images" name="images[]"
                                                                    class="file-upload-input"
                                                                    onchange="handleFiles(this.files);"
                                                                    accept="image/*" multiple
                                                                    style="position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                                                                <div class="drag-text"
                                                                    style="text-align: center; color: #888;">
                                                                    <p>Drag and drop files or select add Image(s)</p>
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
                                                    </div>
                                                    <!-- Submit Button -->
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
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

    <!-- Script untuk menambahkan variasi dinamis -->
    <script>
        let variationIndex = 1;

        document.getElementById('add-variation').addEventListener('click', function() {
            let variationItem = `
            <div class="variation-item">
                <label for="color">Color</label>
                <input type="text" name="variations[${variationIndex}][color]" class="form-control" required>

                <label for="size">Size (optional)</label>
                <input type="text" name="variations[${variationIndex}][size]" class="form-control">

                <label for="stock_quantity">Stock Quantity</label>
                <input type="number" name="variations[${variationIndex}][stock_quantity]" class="form-control" required>

                <label for="price">Price</label>
                <input type="number" name="variations[${variationIndex}][price]" class="form-control" required>

                <button type="button" class="btn btn-danger remove-variation">Remove</button>
            </div>
        `;

            document.getElementById('variation-container').insertAdjacentHTML('beforeend', variationItem);
            variationIndex++;
        });

        document.getElementById('variation-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-variation')) {
                e.target.parentElement.remove();
            }
        });
    </script>

    {{-- Generate Code Button --}}
    <script>
        document.getElementById('generate-code-btn').addEventListener('click', function() {
            const brandSelect = document.getElementById('brand-select');
            const selectedOption = brandSelect.options[brandSelect.selectedIndex];
            const brandAbbr = selectedOption ? selectedOption.getAttribute('data-abbr') : '';

            // Check if the brand is selected
            if (!brandAbbr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    timer: 3000, // Auto-close alert after 3 seconds
                    timerProgressBar: true, // Show progress bar
                    text: 'Please select a brand first!',
                });
                return; // Stop further code execution if no brand is selected
            }

            // If brand is selected, proceed to generate the product code
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const randomNumber = Math.floor(Math.random() * 10000);

            // Generate product code format: ABCD-20240917-0809
            const productCode = `${brandAbbr}-${year}${month}${day}-${String(randomNumber).padStart(4, '0')}`;

            document.getElementById('product-code').value = productCode;
            document.getElementById('product-code').setAttribute('readonly', true); // Make input read-only
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
            videoUploadContent.innerHTML = ''; // Kosongkan konten jika sudah ada video sebelumnya

            if (input.files && input.files[0]) {
                const file = input.files[0];

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

    <script src="assets/js/main.js"></script>

</body>

</html>
