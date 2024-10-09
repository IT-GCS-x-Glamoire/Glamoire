function initializeSelect2Basic(selectElement) {
    $(selectElement).select2({
        width: '100%',
        allowClear: true
    });
}

function initializeSelect2WithAddOption(selectElement) {
    $(selectElement).select2({
        tags: true, // Enable adding new options
        tokenSeparators: [',', ' '],
        width: '100%',
        allowClear: true
    });
}

function initializeSelect2(selectElement, options = {}) {
    $(selectElement).select2({
        tags: true,
        tokenSeparators: [',', ' '],
        width: '100%',
        allowClear: true,
        closeOnSelect: false, // Multi-select
        ...options
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const variantContainer = document.getElementById('variant-container');
    const addVariantTypeBtn = document.getElementById('addVariantType');
    const variantTableBody = document.getElementById('variant-table-body');
    let variantTypes = 1;

    const variantOptions = {
        rasa: ['Vanilla', 'Coklat', 'Strawberry', 'Matcha'],
        ukuran: ['Small', 'Medium', 'Large', 'Extra Large'],
        warna: ['Merah', 'Hijau', 'Biru', 'Ungu', 'Putih', 'Kuning', 'Pink', 'Hitam']
    };

    function updateVariantTable() {
        variantTableBody.innerHTML = '';
        document.querySelectorAll('.variant-type').forEach((variantType, typeIndex) => {
            const typeSelect = variantType.querySelector('select[name="variant_type[]"]');
            const valuesSelect = variantType.querySelector('select[name^="variant_values"]');
            const selectedType = typeSelect.value;
            const selectedValues = Array.from(valuesSelect.selectedOptions).map(option => option.value);

            selectedValues.forEach((value, valueIndex) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input use-variant-image" type="checkbox" id="useVariantImage${typeIndex}${valueIndex}" name="use_variant_image[${typeIndex}][${valueIndex}]" value="1">
                            <label class="form-check-label" for="useVariantImage${typeIndex}${valueIndex}">Use variant image</label>
                        </div>
                        <div class="variant-images mt-2" style="display: none;">
                            <input type="file" class="form-control variant-image-upload" name="variant_images[${typeIndex}][${valueIndex}]" accept="image/*">
                        </div>
                    </td>
                    <td>${selectedType}: ${value}</td>
                    <td><input type="number" class="form-control" name="variant_price[${typeIndex}][${valueIndex}]" placeholder="Price" min="0" step="0.01"></td>
                    <td><input type="number" class="form-control" name="variant_stock[${typeIndex}][${valueIndex}]" placeholder="Stock" min="0"></td>
                    <td><input type="text" class="form-control" name="variant_sku[${typeIndex}][${valueIndex}]" placeholder="SKU"></td>
                    <td><input type="number" class="form-control" name="variant_weight[${typeIndex}][${valueIndex}]" placeholder="Weight" min="0"></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="variantStatus${typeIndex}${valueIndex}" name="variant_status[${typeIndex}][${valueIndex}]" value="1" checked>
                            <label class="form-check-label" for="variantStatus${typeIndex}${valueIndex}">Active</label>
                        </div>
                    </td>
                `;
                variantTableBody.appendChild(row);
            });
        });

        initializeImageUpload();
        initializeImageToggle();
    }

    function updateVariantValues(selectElement) {
        const selectedVariantType = selectElement.value;
        const variantValuesSelect = selectElement.closest('.variant-type').querySelector('.variant-values select');

        variantValuesSelect.innerHTML = '';
        const options = variantOptions[selectedVariantType] || [];
        options.forEach(option => {
            const newOption = document.createElement('option');
            newOption.value = option;
            newOption.textContent = option;
            variantValuesSelect.appendChild(newOption);
        });

        initializeSelect2(variantValuesSelect); // Ensure Select2 is initialized with tags
        updateVariantTable();
    }


    function addNewVariantType() {
        if (variantTypes < 2) { // Limited to 2 variant types
            variantTypes++;
            const newVariantType = document.createElement('div');
            newVariantType.className = 'variant-type mb-4 p-3 border rounded';
            newVariantType.innerHTML = `
                <label>Tipe Variant ${variantTypes}</label>
                <div class="d-flex align-items-center mb-2">
                    <select class="select2-variant-type form-select me-2" name="variant_type[]">
                        <option value="rasa">Rasa</option>
                        <option value="ukuran">Ukuran</option>
                        <option value="warna">Warna</option>
                    </select>
                </div>
                <label class="form-label">Variant Values</label>
                <div class="variant-values">
                    <select class="select2 form-select multiple-remove" name="variant_values[${variantTypes - 1}][]" multiple="multiple"></select>
                </div>
            `;
            variantContainer.appendChild(newVariantType);

            // Inisialisasi Select2 untuk Tipe Variant yang Baru
            const newVariantTypeSelect = newVariantType.querySelector('.select2-variant-type');
            initializeSelect2(newVariantTypeSelect, { tags: true, closeOnSelect: true }); // Set tags: true untuk menambahkan opsi baru
            updateVariantValues(newVariantTypeSelect);

            if (variantTypes >= 2) {
                addVariantTypeBtn.disabled = true;
                addVariantTypeBtn.classList.add('disabled');
            }
        }
    }

    function initializeImageUpload() {
        $('.variant-image-upload').off('change').on('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const imgPreview = $('<img>').addClass('img-thumbnail mt-2').css('max-width', '100px');
            $(this).after(imgPreview);

            reader.onload = function (e) {
                imgPreview.attr('src', e.target.result).show();
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    }

    function initializeImageToggle() {
        $('.use-variant-image').off('change').on('change', function () {
            const imageUploadArea = $(this).closest('td').find('.variant-images');
            if (this.checked) {
                imageUploadArea.show();
            } else {
                imageUploadArea.hide();
                // Clear the file input and remove the preview image
                const fileInput = imageUploadArea.find('input[type="file"]');
                fileInput.val('');
                imageUploadArea.find('img').remove();
            }
        });
    }

    // Event listeners
    $(document).on('change', '.select2-variant-type', function () {
        updateVariantValues(this);
    });

    $(document).on('change', '.variant-values select', function () {
        updateVariantTable();
    });

    addVariantTypeBtn.addEventListener('click', addNewVariantType);

    // Initialize the first variant type
    updateVariantValues(document.querySelector('select[name="variant_type[]"]'));
    updateVariantTable();

    // Initialize Select2 for dropdowns
    initializeSelect2Basic('.select2-basic-category');
    initializeSelect2Basic('.select2-basic-brand');
    initializeSelect2WithAddOption('.select2-add-option');
    initializeSelect2('.select2-variant-type', { tags: false, closeOnSelect: true });
});

