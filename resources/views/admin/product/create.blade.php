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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/product/createproduct.css">

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
                                                                    class="form-control select2-basic-category {{ $errors->has('category_product_id') ? 'is-invalid' : '' }}"
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
                                                                    class="form-control select2-basic-brand {{ $errors->has('brand_id') ? 'is-invalid' : '' }}"
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
                                                                    <i class="bi bi-cash-stack"></i>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('regular_price'))
                                                                <p style="color: red">
                                                                    {{ $errors->first('regular_price') }}</p>
                                                            @endif
                                                        </div>

                                                        <label for="">Weight Product</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Weight Product" name="weight_product">
                                                            <span class="input-group-text"
                                                                id="basic-addon2">gram</span>
                                                        </div>

                                                        <label for="">Dimension Product</label>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Length" name="length">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon1">cm</span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Width" name="width">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon2">cm</span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Height" name="height">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon3">cm</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group mb-3">
                                                            <label for="product-color">Product Color</label>
                                                            <div class="d-flex align-items-center">
                                                                <!-- Input Text untuk Warna -->
                                                                <div class="d-flex flex-column me-3">
                                                                    <span style="font-size: 3.6mm;">Enter color
                                                                        name</span>
                                                                    <input type="text"
                                                                        class="form-control {{ $errors->has('color_text') ? 'is-invalid' : '' }}"
                                                                        id="product-color-text" name="color_text"
                                                                        placeholder="Enter color name">
                                                                </div>

                                                                <!-- Input Picker Warna -->
                                                                <div class="d-flex flex-column">
                                                                    <span style="font-size: 3.6mm;">Or Select color
                                                                    </span>
                                                                    <input type="color"
                                                                        class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }} input-color-size"
                                                                        id="product-color" name="color"
                                                                        value="#ffffff">
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <div class="mt-4">
                                                            <h4 class="card-title">Variant Product</h4>
                                                            <p class="card-subtitle">Add variants so that buyers can
                                                                choose the right product! You can enter up to 2 types of
                                                                variants.</p>
                                                        </div>

                                                        <div class="mt-3">
                                                            <div id="variant-container">
                                                                <div class="variant-type mb-4 p-3 border rounded">
                                                                    <label>Tipe Variant</label>
                                                                    <div class="d-flex align-items-center mb-2">
                                                                        <select
                                                                            class="select2-add-option form-select me-2"
                                                                            name="variant_type[]">
                                                                            <option value="rasa">Rasa</option>
                                                                            <option value="ukuran">Ukuran</option>
                                                                            <option value="warna">Warna</option>
                                                                        </select>
                                                                    </div>
                                                                    <label class="form-label">Variant Values</label>
                                                                    <div class="variant-values">
                                                                        <select
                                                                            class="select2 form-select multiple-remove"
                                                                            name="variant_values[0][]"
                                                                            multiple="multiple"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Area untuk upload gambar yang tersembunyi awalnya -->
                                                            <div class="variant-images mt-3" style="display: none;">
                                                                <input type="file"
                                                                    class="form-control variant-image-upload"
                                                                    accept="image/*">
                                                            </div>
                                                            <button type="button" class="btn btn-outline-primary"
                                                                id="addVariantType">+ Add Product Variant</button>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        {{-- single image --}}
                                                        <div class="card">
                                                            <label for="first-name-icon">Product Thumbnail<span
                                                                    style="color: red"> *</span></label>
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

                                                    <div class="col-12">

                                                        <div class="mt-5">
                                                            <h4 class="card-title">Table Variant</h4>
                                                            <p class="card-subtitle">Manage variant details including
                                                                price, stock, SKU, weight, and status for each variant.
                                                            </p>

                                                            <div class="table-responsive">
                                                                <table class="table table-bordered variant-table">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Type Variant</th>
                                                                            <th>Price</th>
                                                                            <th>Stock</th>
                                                                            <th>SKU</th>
                                                                            <th>Weight (grams)</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="variant-table-body">
                                                                        <!-- Additional rows will be dynamically added here -->
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="reset"
                                                            class="btn  btn-light-secondary me-3 mb-1"
                                                            style="border-radius: 5px;">Reset</button>
                                                        <button type="submit" class="btn  btn-primary me-1 mb-1"
                                                            style="border-radius: 5px;">Submit</button>

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

    <!-- Include jQuery (if not included already) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="assets/js/product/createproduct.js"></script>

    {{-- product variant input bisa kurang drag and drop proses belum bisa simpan --}}
    {{-- <script>
        function initializeSelect2Basic(selectElement, placeholderText) {
            $(selectElement).select2({
                placeholder: placeholderText,
                width: '100%',
                allowClear: true
            });
        }

        // Function to initialize Select2 with the ability to add new tags
        function initializeSelect2(selectElement) {
            $(selectElement).select2({
                tags: true,
                placeholder: "Select or add variants",
                tokenSeparators: [',', ' '],
                width: '100%',
                allowClear: true,
                closeOnSelect: false
            });

            $(selectElement).on('select2:unselect', function(e) {
                const value = e.params.data.id;
                $(this).find(`option[value='${value}']`).remove();
            });
        }

        // Initialize Select2 for both variant types and values
        initializeSelect2('.select2');
        initializeSelect2('.select2-variant-type');

        // Initialize Select2 for category and brand with unique classes
        initializeSelect2Basic('.select2-category', 'Select Category');
        initializeSelect2Basic('.select2-brand', 'Select Brand');

        document.addEventListener('DOMContentLoaded', function() {
            let variantTypes = 0;
            const variantContainer = document.getElementById('variant-container');
            const addVariantTypeBtn = document.getElementById('addVariantType');

            const variantOptions = {
                rasa: [{
                        value: 'vanilla',
                        label: 'Vanilla'
                    },
                    {
                        value: 'coklat',
                        label: 'Coklat'
                    },
                    {
                        value: 'strawberry',
                        label: 'Strawberry'
                    },
                    {
                        value: 'matcha',
                        label: 'Matcha'
                    }
                ],
                ukuran: [{
                        value: 'S',
                        label: 'Small'
                    },
                    {
                        value: 'M',
                        label: 'Medium'
                    },
                    {
                        value: 'L',
                        label: 'Large'
                    },
                    {
                        value: 'XL',
                        label: 'Extra Large'
                    }
                ],
                warna: [{
                        value: 'merah',
                        label: 'Merah'
                    },
                    {
                        value: 'hijau',
                        label: 'Hijau'
                    },
                    {
                        value: 'biru',
                        label: 'Biru'
                    },
                    {
                        value: 'ungu',
                        label: 'Ungu'
                    },
                    {
                        value: 'putih',
                        label: 'Putih'
                    },
                    {
                        value: 'kuning',
                        label: 'Kuning'
                    },
                    {
                        value: 'pink',
                        label: 'Pink'
                    },
                    {
                        value: 'hitam',
                        label: 'Hitam'
                    }
                ]
            };

            // Menambahkan event listener pada perubahan tipe varian
            $(document).on('change', '.select2-variant-type', function() {
                updateVariantValues(this);
            });

            function updateVariantValues(selectElement) {
                const selectedVariantType = selectElement.value;
                const variantValuesSelect = selectElement.closest('.variant-type').querySelector(
                    '.variant-values select');

                variantValuesSelect.innerHTML = '';
                const options = variantOptions[selectedVariantType] || [];
                options.forEach(option => {
                    const newOption = document.createElement('option');
                    newOption.value = option.value;
                    newOption.textContent = option.label;
                    variantValuesSelect.appendChild(newOption);
                });

                // Reinitialize Select2
                initializeSelect2(variantValuesSelect); // Reinitialize Select2 for the updated select
            }

            addVariantTypeBtn.addEventListener('click', function() {
                // Allow only one additional variant
                if (variantTypes < 1) {
                    // Create and initialize new variant type dropdown
                    const newVariantType = document.createElement('div');
                    newVariantType.className = 'variant-type mb-3';
                    newVariantType.innerHTML = `
                <div class="variant-type mb-4 p-3 border rounded">
                    <label>Tipe Variant ${variantTypes + 2}</label>
                    <div class="d-flex align-items-center mb-2">
                        <select class="select2-variant-type form-select me-2" name="variant_type[]">
                            <option value="rasa">Rasa</option>
                            <option value="ukuran">Ukuran</option>
                            <option value="warna">Warna</option>
                        </select>
                    </div>
                    <label class="form-label">Variant Values</label>
                    <div class="variant-values">
                        <select class="select2 form-select multiple-remove" name="variant_values[${variantTypes}][]" multiple="multiple"></select>
                    </div>
                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input use-variant-image" type="checkbox" id="useVariantImage${variantTypes}" name="use_variant_image[]" value="1">
                        <label class="form-check-label" for="useVariantImage${variantTypes}">Use Variant Image</label>
                    </div>
                    <div class="variant-images mt-2" style="display: none;"></div>
                </div>
                `;
                    variantContainer.appendChild(newVariantType);

                    // Initialize Select2 for the new variant type and values
                    const newVariantTypeSelect = newVariantType.querySelector('.select2-variant-type');
                    initializeSelect2(newVariantTypeSelect);

                    const variantValuesSelect = newVariantType.querySelector('.variant-values select');
                    initializeSelect2(variantValuesSelect);

                    // Update variant values for the new variant type
                    updateVariantValues(newVariantTypeSelect);

                    variantTypes++;

                    // Disable button if maximum variants reached
                    if (variantTypes >= 2) {
                        addVariantTypeBtn.disabled = true;
                        addVariantTypeBtn.classList.add(
                            'disabled'); // Optional: Add a disabled class for styling
                    }
                }
            });


            function updateVariantImages(checkbox) {
                const variantType = checkbox.closest('.variant-type');
                const variantImages = variantType.querySelector('.variant-images');
                const variantValues = variantType.querySelector('.variant-values select');
                const variantIndex = Array.from(variantType.parentNode.children).indexOf(variantType);

                if (checkbox.checked) {
                    variantImages.style.display = 'flex';
                    const values = Array.from(variantValues.selectedOptions).map(option => option.value);
                    variantImages.innerHTML = values.map((value, index) => `
                        <div class="variant-image-item">
                            <div class="drag-drop-area" data-variant="${value}">
                                <input type="file" class="file-input" name="variant_images[${variantIndex}][${value}]" accept="image/*" style="display: none;">
                                <i class="bi bi-card-image upload-icon"></i>
                            </div>
                            <div class="variant-label">${value}</div>
                        </div>
                    `).join('');
                    initDragDrop(variantImages);
                } else {
                    variantImages.style.display = 'none';
                    variantImages.innerHTML = '';
                }
            }

            function addNewVariantType() {
                if (variantTypes < 1) {
                    variantTypes++;
                    const newVariantType = document.createElement('div');
                    newVariantType.className = 'variant-type mb-3';
                    newVariantType.innerHTML = `
                            <label>Tipe Varian ${variantTypes}</label>
                            <div class="d-flex align-items-center mb-2">
                                <select class="form-select me-2" name="variant_type[]">
                                    <option value="rasa">Rasa</option>
                                    <option value="ukuran">Ukuran</option>
                                    <option value="warna">Warna</option>
                                </select>
                            </div>
                            <div class="variant-values">
                                <select class="select2 form-select multiple-remove" name="variant_values[${variantTypes - 1}][]" multiple="multiple"></select>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input use-variant-image" type="checkbox" id="useVariantImage${variantTypes - 1}" name="use_variant_image[]" value="1">
                                <label class="form-check-label" for="useVariantImage${variantTypes - 1}">Gunakan foto varian</label>
                            </div>
                            <div class="variant-images mt-2" style="display: none;"></div>
                        `;
                    variantContainer.appendChild(newVariantType);

                    // Initialize the new select elements
                    const newVariantTypeSelect = newVariantType.querySelector('select[name="variant_type[]"]');
                    updateVariantValues(newVariantTypeSelect);

                    // Initialize Select2 for the new variant values select
                    $(newVariantType.querySelector('.variant-values select')).select2();

                    // Initialize drag-and-drop for the new variant type
                    const checkbox = newVariantType.querySelector('.use-variant-image');
                    checkbox.addEventListener('change', function() {
                        updateVariantImages(this);
                    });
                }
            }

            function initDragDrop(container) {
                const dragDropAreas = container.querySelectorAll('.drag-drop-area');
                dragDropAreas.forEach(area => {
                    const fileInput = area.querySelector('.file-input');

                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        area.addEventListener(eventName, preventDefaults, false);
                    });

                    ['dragenter', 'dragover'].forEach(eventName => {
                        area.addEventListener(eventName, highlight, false);
                    });

                    ['dragleave', 'drop'].forEach(eventName => {
                        area.addEventListener(eventName, unhighlight, false);
                    });

                    area.addEventListener('drop', handleDrop, false);
                    fileInput.addEventListener('change', handleFiles, false);
                    area.addEventListener('click', () => fileInput.click());

                    function preventDefaults(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    function highlight(e) {
                        area.classList.add('highlight');
                    }

                    function unhighlight(e) {
                        area.classList.remove('highlight');
                    }

                    function handleDrop(e) {
                        const dt = e.dataTransfer;
                        const files = dt.files;
                        handleFiles({
                            target: {
                                files: files
                            }
                        });
                    }

                    function handleFiles(e) {
                        const files = e.target.files;
                        if (files.length > 0) {
                            const file = files[0];
                            if (file.type.startsWith('image/')) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    area.innerHTML =
                                        `<img src="${e.target.result}" alt="Uploaded image">`;
                                    area.appendChild(fileInput);
                                }
                                reader.readAsDataURL(file);
                            } else {
                                alert('Please upload an image file');
                            }
                        }
                    }
                });
            }

            // Event delegation for variant type changes
            variantContainer.addEventListener('change', function(e) {
                if (e.target.name === 'variant_type[]') {
                    updateVariantValues(e.target);
                }
            });

            // Event delegation for use variant image checkbox changes
            variantContainer.addEventListener('change', function(e) {
                if (e.target.classList.contains('use-variant-image')) {
                    updateVariantImages(e.target);
                }
            });

            // Event listener for adding new variant type
            addVariantTypeBtn.addEventListener('click', addNewVariantType);

            // Initialize the first variant type
            updateVariantValues(document.querySelector('select[name="variant_type[]"]'));
        });
    </script> --}}

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

    <script src="assets/js/main.js"></script>
    <!-- Include Choices JavaScript -->

</body>

</html>
