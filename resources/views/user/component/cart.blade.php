@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 mb-12 mb-md-0 py-2">
  <div class="container-fluid">
    <div class="shadow-sm border border-black rounded-md py-2 py-md-3 my-2 my-md-3">
        <div class="d-flex gap-2 pl-2">
            <a href="/" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Beranda</a>
            <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
            <a href="#" class="text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Keranjang</a>
        </div>
    </div>

    <div class="row mb-14">
        <div class="col-lg-9 col-12 pr-lg-0">
            <div class="container border border-[#183018] rounded shadow-md">
                <div class="form-check py-2 py-md-3 border-bottom border-[#183018]">
                    <input class="form-check-input" type="checkbox" value="" id="select-all" onclick="toggleCheckboxes(this)" onchange="toggleSelectAll()">
                    <label class="form-check-label text-black text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="checkAll">
                        Pilih Semua 
                    </label>
                </div>
    
                @foreach ($data as $cart)
                    @foreach ($cart->cartItems as $product)
    
                        <div class="form-check grid border-bottom border-[#183018] py-2 py-md-3">
                            <div class="d-flex">
                                <div class="col-lg-2 col-md-4 col-4 pl-1">
                                    <input class="form-check-input item-checkbox" type="checkbox" value="{{ $product->total }}" id="produk_{{ $product->product_id }}" data-price="{{ $product->price }}" onchange="calculateTotal()" {{ $product->is_choose == TRUE ? "checked" : "" }}>
                                    <img src="{{ Storage::url($product->product->main_image) }}" alt="nama produk" class="img-fluid w-100 border border-[#183018] rounded-md">
                                </div>
                                <div class="col-lg-10 col-md-8 col-8 p-0 p-md-2 d-flex flex-column">
                                    <h1 class="text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">{{ $product->product->product_name }}</h1>
                                    <h1 class="text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">{{ 'Rp' . number_format($product->product->regular_price, 0, ',', '.') }}</h1>
                                    <!-- BUTTON PLUS & MINUS & DELETE -->
                                    <div class="d-flex mt-auto bottom">
                                        <div class="d-flex ml-auto">
                                            <button class="btn btn-delete" name="delete-product-cart" title="Hapus product dari keranjang" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;" data-id="{{ $product->product_id }}"> 
                                                <i class="fas fa-trash text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]"></i>
                                            </button>
    
                                            <!-- <div class="input-group quantity rounded-sm shadow-sm max-w-[100px] md:max-w-[115px]">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-minus" data-id="{{$product->product_id}}" data-quantity="{{$product->quantity}}" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;" id="minus-btn-product-cart">
                                                        <i class="fa fa-minus text-xs"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="total_product" class="text-xs form-control bg-secondary text-center" id="product-quantity-{{ $product->product_id }}" value="{{ $product->quantity }}">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-plus" data-id="{{$product->product_id}}" data-quantity="{{$product->quantity}}" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;" id="plus-btn-product-cart">
                                                        <i class="fa fa-plus text-xs"></i>
                                                    </button>
                                                </div>
                                            </div> -->
                                            <div class="input-group quantity-detail-produk rounded-sm shadow-sm" style="width: 130px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-minus" data-id="{{$product->product_id}}" data-quantity="{{$product->product->stock_quantity}}" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;" id="minus-btn-product-cart-{{$product->product_id}}">
                                                        <i class="fa fa-minus text-xs"></i>
                                                    </button>
                                                </div>

                                                <input type="number" 
                                                    id="product-quantity-{{ $product->product->id }}" 
                                                    value="{{ $product->quantity }}"
                                                    name="total_product"
                                                    class="text-xs form-control bg-secondary text-center" 
                                                    min="1" 
                                                    max="{{ $product->product->stock_quantity}}" 
                                                    oninput="validateInput(this, {{ $product->product->stock_quantity }})">

                                                    
                                                <div class="input-group-btn">
                                                    <button class="btn btn-plus" data-id="{{$product->product_id}}" data-quantity="{{$product->product->stock_quantity}}" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;" id="plus-btn-product-cart-{{$product->product_id}}">
                                                        <i class="fa fa-plus text-xs"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    @endforeach
                @endforeach 
            </div>
        </div>

        <div class="col-lg-3 col-12 mt-2 mt-md-0 d-none d-lg-block">
            <div class="position-sticky" style="top: 4rem">
                <div class="mb-3 rounded p-3 bg-white shadow-md border border-[#183018]">
                    <div class="d-flex py-2">
                        <p class="text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[16px]">Total Harga</p>
                        <p id="totalPrice" class="text-[12px] md:text-[10px] lg:text-[12px] xl:text-[16px] ml-auto">{{ 'Rp' . number_format(0, 0, ',', '.') }}</p>
                    </div>
                    <div class="border-top border-[#183018] pt-2">
                        <a href="/checkout">
                            <button class="btn w-full rounded-sm text-white text-[12px] md:text-[10px] lg:text-[12px] xl:text-[16px]" style="background-color: #183018" type="submit" id="paynow" disabled>
                                Bayar Sekarang
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="d-lg-none fixed-bottom" style="background-color:#183018;">
  <div class="container-fluid d-flex justify-content-end align-items-center gap-2">
    <div class="grid py-2 text-end">
        <p class="text-white text-[12px]">Total</p>
        <p id="totalPriceMobile" class="text-[12px] ml-auto text-white">{{ 'Rp' . number_format(0, 0, ',', '.') }}</p>
    </div>
    <a href="/checkout">
        <button class="btn w-fit h-fit font-semibold rounded-sm text-[#183018] text-[12px]" style="background-color: #ffffff" type="submit" id="paynowmobile" disabled>
            Beli
        </button>
    </a>
  </div>
</div>


<!-- DELETE PRODUCT FROM CART -->
<script>
     $(document).on('click', 'button[name="delete-product-cart"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "{{ route('delete.product.cart') }}",
            type: 'POST',
            data: {
                product_id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                Toast.fire({
                    icon: "success",
                    text: response.message,
                    title: "Berhasil",
                    willOpen: () => {
                    const title = document.querySelector('.swal2-title');
                    const content = document.querySelector('.swal2-html-container');
                    if (title) title.style.color = '#ffffff'; // Ubah warna judul
                    if (content) content.style.color = '#ffffff'; // Ubah warna konten
                    }
                }).then(function () {
                    location.reload(); // Redirect ke halaman utama atau halaman lain
                });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert("Error occurred!");
            }
        });
    });
</script>


<!-- FUNCTION FOR DATABASE -->
<!-- CHOOSE PRODUCT -->
<script>
    // Fungsi untuk memeriksa status checkbox "Pilih Semua"
    function updateSelectAllStatus() {
        let totalCheckboxes = $('.item-checkbox').length;  // Jumlah semua checkbox item
        let checkedCheckboxes = $('.item-checkbox:checked').length;  // Jumlah checkbox item yang dipilih

        if (totalCheckboxes === checkedCheckboxes) {
            $('#select-all').prop('checked', true);  // Pilih Semua jika semua item dipilih
        } else {
            $('#select-all').prop('checked', false);  // Hapus Pilih Semua jika tidak semua item dipilih
        }
    }

    // Fungsi untuk toggle status Pilih Semua
    function toggleSelectAll() {
        let selectAllChecked = $('#select-all').is(':checked');
        $('.item-checkbox').prop('checked', selectAllChecked);

        // Kirim AJAX request untuk mengupdate semua produk
        $.ajax({
            url: "{{ route('choose.product.cart') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                select_all: true, // Indikator bahwa ini untuk memilih semua
                is_choose: selectAllChecked ? 1 : 0 // TRUE jika semua dipilih, FALSE jika tidak
            },
            success: function(response) {
                if (response.success) {
                    console.log('Semua produk berhasil diupdate.');
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Terjadi kesalahan.');
            }
        });
    }

    // Fungsi untuk toggle produk individu
    function toggleProductSelection(productId) {
        let isChecked = $('#produk_' + productId).is(':checked');

        // Kirim AJAX request untuk mengupdate produk individu
        $.ajax({
            url: "{{ route('choose.product.cart') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                is_choose: isChecked ? 1 : 0
            },
            success: function(response) {
                if (response.success) {
                    console.log('Produk ' + productId + ' berhasil diupdate.');
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Terjadi kesalahan.');
            }
        });

        // Update status checkbox "Pilih Semua"
        updateSelectAllStatus();
    }

    // Event listener untuk checkbox individu
    $('.item-checkbox').on('change', function() {
        let productId = $(this).attr('id').split('_')[1];
        toggleProductSelection(productId);
    });

    // Update status "Pilih Semua" ketika halaman dimuat
    $(document).ready(function() {
        updateSelectAllStatus(); // Memastikan status "Pilih Semua" sesuai ketika halaman dimuat
    });

    // Event listener untuk checkbox "Pilih Semua"
    $('#select-all').on('change', function() {
        toggleSelectAll();
    });
</script>

<!-- HANDLE QUANTITY -->
<script>
    $(document).ready(function() {

        // Handle quantity input change (both via plus/minus buttons and manual input)
        $(document).on('input', '[name="total_product"]', function() {
            var productId = $(this).attr('id').split('-').pop(); // Get product ID from input ID
            var newQuantity = parseInt($(this).val());

            // Ensure the quantity is a valid number and greater than 0
            if (!isNaN(newQuantity) && newQuantity > 0) {
                updateProductQuantity(productId, newQuantity);
            } else {
                alert("Quantity must be a valid number greater than 0");
                $(this).val(1); // Reset to 1 if the input is invalid
                updateProductQuantity(productId, 1);
            }
        });

        // Handle minus button click
        $(document).on('click', '.btn-minus', function() {
            var productId = $(this).data('id');
            var currentQuantity = parseInt($('#product-quantity-' + productId).val());

            if (currentQuantity >= 1) {
                $('#product-quantity-' + productId).val(currentQuantity);
                updateProductQuantity(productId, currentQuantity);
            }
        });

        // Handle plus button click
        $(document).on('click', '.btn-plus', function() {
            var productId = $(this).data('id');
            var currentQuantity = parseInt($('#product-quantity-' + productId).val());

            $('#product-quantity-' + productId).val(currentQuantity);
            updateProductQuantity(productId, currentQuantity);
        });

        // Function to send AJAX request to update quantity
        function updateProductQuantity(productId, newQuantity) {
            $.ajax({
                url: "{{ route('update.cart.quantity') }}",  // Your route to update quantity
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: newQuantity
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Quantity updated successfully for product ' + productId);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert("An error occurred.");
                }
            });
        }
    });
</script>
<!-- END FUNCTION FOR DATABASE -->


<!-- MENGHITUNG TOTAL HARGA -->
<script>
    // Fungsi untuk menghitung total harga
    function calculateTotal() {
        let total = 0; // Inisialisasi total
        let hasSelectedProduct = false; // Flag untuk memeriksa apakah ada produk yang dipilih

        // Loop melalui semua checkbox produk
        $('.item-checkbox:checked').each(function() {
            let productId = $(this).attr('id').split('_')[1]; // Mendapatkan ID produk
            let quantity = parseInt($('#product-quantity-' + productId).val()); // Mendapatkan kuantitas produk
            
            // Mengambil harga dari elemen yang sesuai
            let price = parseFloat($(this).data('price')); // Mengambil harga dari data atribut

            console.log('Quantity setelah klik: ' + quantity);
            console.log('Harga: ' + price);

            // Hitung total harga untuk produk ini
            total += price * quantity; 
            hasSelectedProduct = true; // Tandai bahwa ada produk yang dipilih
        });

        // Update total harga di tampilan
        $('#totalPrice').text('Rp ' + number_format(total, 0, ',', '.'));
        $('#totalPriceMobile').text('Rp ' + number_format(total, 0, ',', '.'));

        // Aktifkan atau nonaktifkan tombol "Bayar Sekarang"
        if (hasSelectedProduct) {
            $('#paynow').removeAttr('disabled'); // Aktifkan tombol
            $('#paynowmobile').removeAttr('disabled');
            
        } else {
            $('#paynow').attr('disabled', 'disabled'); // Nonaktifkan tombol
            $('#paynowmobile').attr('disabled', 'disabled');
        }
    }

    // Fungsi untuk format angka ke format mata uang
    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-.]/g, ''); // Menghapus karakter yang tidak diinginkan
        let n = !isFinite(+number) ? 0 : +number; // Memastikan bahwa ini adalah angka
        let prec = !isFinite(+decimals) ? 0 : Math.abs(decimals); // Mengambil angka desimal
        let sep = typeof thousands_sep === 'undefined' ? ',' : thousands_sep; // Pemisah ribuan
        let dec = typeof dec_point === 'undefined' ? '.' : dec_point; // Pemisah desimal
        let toFixedFix = function(n, prec) {
            let k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
        // Mengatur desimal
        let s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        // Mengatur ribuan
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(\d{3})+(?!\d))/g, sep);
        }
        // Menggabungkan kembali
        return s.join(dec);
    }

    $(document).ready(function() {
        // Event listener untuk tombol tambah/kurang kuantitas
        $(document).on('click', '.btn-plus, .btn-minus', function() {
            let productId = $(this).data('id');
            let quantityInput = $('#product-quantity-' + productId);
            let currentQuantity = parseInt(quantityInput.val());

            if ($(this).hasClass('btn-plus')) {
                quantityInput.val(currentQuantity);
            } else {
                if (currentQuantity > 1) { // Menghindari kuantitas negatif
                    quantityInput.val(currentQuantity);
                }
            }

            // Hitung total lagi setelah kuantitas diperbarui
            calculateTotal();
        });

        // Event listener untuk input manual kuantitas produk
        $(document).on('change', '.form-control', function() {
            let quantity = $(this).val();
            $(this).val(quantity < 1 ? 1 : quantity); // Pastikan kuantitas minimal 1
            calculateTotal(); // Hitung total saat kuantitas diubah
        });

        // Event listener untuk checkbox produk
        $(document).on('change', '.item-checkbox', function() {
            calculateTotal(); // Hitung total saat checkbox diubah
        });

        // Hitung total saat halaman dimuat
        calculateTotal();
    });


    function toggleCheckboxes(source) {
        const checkboxes = document.querySelectorAll('.item-checkbox');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = source.checked;
        });
        calculateTotal(); // Menghitung total saat checkbox "Pilih Semua" dicentang
    }

    // Product Quantity
    $(".quantity-detail-produk button").on("click", function () {
    var button = $(this);
    var input = button.parent().parent().find("input");
    var oldValue = parseFloat(input.val());
    var maxQuantity = parseFloat(button.data("quantity")); // Ambil nilai max quantity dari data attribute
    var newVal;

    if (button.hasClass("btn-plus")) {
        if (oldValue < maxQuantity) {
            newVal = oldValue + 1;
        } else {
            newVal = maxQuantity; // Jika sudah mencapai maksimum, tetap pada max
        }
    } else {
        newVal = (oldValue > 1) ? oldValue - 1 : 1;
    }

    // Set nilai baru ke input field
    input.val(newVal);
    
    // Panggil checkMaxQuantity untuk memeriksa batas
        checkMaxQuantity(input[0], maxQuantity);
    });

    // Fungsi untuk memeriksa apakah sudah mencapai max quantity
    function checkMaxQuantity(input, maxQuantity) {
        var value = parseFloat(input.value);
        var warningElement = document.getElementById("quantity-warning-" + input.id.split('-').pop());
        var plusButton = document.getElementById("plus-btn-product-cart-" + input.id.split('-').pop());

        if (value > maxQuantity) {
            plusButton.disabled = true; // Disable tombol plus ketika sudah mencapai stok maksimum
            if (warningElement) {
                warningElement.innerText = "Batas untuk pembelian produk terpenuhi";
            }
        } else {
            plusButton.disabled = false; // Enable tombol plus jika belum mencapai stok maksimum
            if (warningElement) {
                warningElement.innerText = "";
            }
        }
    }

    function validateInput(input, maxQuantity) {
        var value = parseFloat(input.value);

        if (value > maxQuantity) {
            input.value = maxQuantity; // Jangan biarkan lebih dari stok
        } else if (value < 1) {
            input.value = 1; // Jangan biarkan di bawah 1
        }
        checkMaxQuantity(input, maxQuantity); // Update status tombol
    }
</script>






@endsection
