<script>
    // Initialize Select2
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

    initializeSelect2('.select2');

    document.addEventListener('DOMContentLoaded', function() {
        let variantTypes = 1;
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

        function updateVariantImages(checkbox) {
            const variantType = checkbox.closest('.variant-type');
            const variantImages = variantType.querySelector('.variant-images');
            const variantValues = variantType.querySelector('.variant-values select');
            const variantIndex = Array.from(variantType.parentNode.children).indexOf(variantType);

            if (checkbox.checked) {
                variantImages.style.display = 'block';
                const values = Array.from(variantValues.selectedOptions).map(option => option.value);
                variantImages.innerHTML = values.map((value, index) => `
       <div class="mb-2">
           <label>${value}</label>
           <div class="drag-drop-area" data-variant="${value}">
               <input type="file" class="file-input" name="variant_images[${variantIndex}][${value}]" accept="image/*" hidden>
               <p>Drag & drop image here or click to upload</p>
           </div>
           <div class="image-preview"></div>
       </div>
   `).join('');
                initDragDrop(variantImages);
            } else {
                variantImages.style.display = 'none';
                variantImages.innerHTML = '';
            }
        }

        function addNewVariantType() {
            if (variantTypes < 2) {
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
            }
        }

        function initDragDrop(container) {
            const dragDropAreas = container.querySelectorAll('.drag-drop-area');
            dragDropAreas.forEach(area => {
                const fileInput = area.querySelector('.file-input');
                const preview = area.nextElementSibling;

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
                                preview.innerHTML =
                                    `<img src="${e.target.result}" alt="Uploaded image">`;
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
</script>
