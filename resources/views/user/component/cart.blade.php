@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 mb-12 mb-md-0 py-2">
  <div class="container-fluid">
    <div class="row py-2 py-md-3">
        <div class="col-12">
            <div class="d-flex gap-2">
                <a href="/home" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
                <a href="/cart" class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Cart</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 col-12 border-md-right border-md-bottom">
            <div class="form-check py-2 py-md-3 border-bottom">
                <input class="form-check-input" type="checkbox" value="" id="checkAll" onclick="toggleCheckboxes(this)">
                <label class="form-check-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="checkAll">
                    Pilih Semua 
                </label>
            </div>

            @foreach ($data as $cart)
                @foreach ($cart->cartItems as $product)
                    <div class="form-check grid border-bottom py-2 py-md-3">
                        <div class="d-flex">
                            <div class="col-lg-2 col-md-4 col-5 pl-1">
                                <input class="form-check-input item-checkbox" type="checkbox" value="{{ $product->total }}" id="kodebarang{{ $product->id }}" onchange="calculateTotal()">
                                <img src="images/produk1.png" alt="nama produk">
                            </div>
                            <div class="col-lg-10 col-md-8 col-7 p-0 p-md-2">
                                <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Nama Produk {{ $product->product_id }}</h1>
                                <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] py-2">Category</h1>
                                <div class="flex">
                                    <div class="col-md-1 p-0 text-start">
                                        <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Harga</h1>
                                    </div>
                                    <div class="col-md-11 p-0 text-start">
                                        <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">: {{ 'Rp' . number_format($product->price, 0, ',', '.') }}</h1>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="col-md-1 p-0 text-start">
                                        <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Total</h1>
                                    </div>
                                    <div class="col-md-11 p-0 text-start">
                                        <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">: {{ 'Rp' . number_format($product->total, 0, ',', '.') }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex ml-auto">
                                <button class="btn btn-delete" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;"> 
                                    <i class="fas fa-trash text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]"></i>
                                </button>

                                <div class="input-group quantity rounded-sm shadow-sm max-w-[100px]">
                                    <div class="input-group-btn">
                                        <button class="btn btn-minus" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;">
                                            <i class="fa fa-minus text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="total_product" class="form-control bg-secondary text-center" value="{{$product->quantity}}" style="height: 32px; line-height: 32px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-plus" style="height: 32px; width: 32px; display: flex; justify-content: center; align-items: center;">
                                            <i class="fa fa-plus text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach 
        </div>

        <div class="col-md-3 col-12 mt-2 mt-md-0 d-none d-md-block">
            <div class="position-sticky" style="top: 4rem">
                <div class="mb-3 bg-light rounded">
                    <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rincian Pesanan</h1>
                    <div class="d-flex border-bottom py-2">
                        <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Total Harga</p>
                        <p id="totalPrice" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] ml-auto">{{ 'Rp' . number_format(0, 0, ',', '.') }}</p>
                    </div>
                    <button class="btn w-full rounded-sm text-white text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="background-color: #183018" type="submit" id="paynow" disabled>
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="d-md-none fixed-bottom" style="background-color:#183018;">
  <div class="container-fluid d-flex justify-content-end align-items-center gap-2">
    <div class="grid py-2 text-end">
        <p class="text-[10px] ">Total</p>
        <p id="totalPriceMobile" class="text-[12px] text-white ml-auto">-</p>
    </div>
    <button href="/checkout" class="btn w-fit h-fit font-semibold rounded-sm text-[#183018] text-[12px]" style="background-color: #ffffff" type="submit" id="paynowmobile" disabled>
        Beli
    </button>
  </div>
</div>

<script>
    function calculateTotal() {
        let total = 0;
        let itemCount = 0;
        // Mengambil semua checkbox yang dicentang
        const checkboxes = document.querySelectorAll('.item-checkbox:checked');
        checkboxes.forEach((checkbox) => {
            // Menambahkan harga produk yang dicentang
            total += parseFloat(checkbox.value);
            itemCount++;
        });
        
        // Menampilkan jumlah barang
        document.getElementById('paynowmobile').innerText = 'Beli (' + itemCount.toString() + ')';
        // Menampilkan total harga
        document.getElementById('totalPrice').innerText = 'Rp' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById('totalPriceMobile').innerText = 'Rp' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Mengaktifkan atau menonaktifkan tombol "Bayar Sekarang"
        document.getElementById('paynow').disabled = total === 0;
        document.getElementById('paynowmobile').disabled = total === 0;
    }

    function toggleCheckboxes(source) {
        const checkboxes = document.querySelectorAll('.item-checkbox');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = source.checked;
        });
        calculateTotal(); // Menghitung total saat checkbox "Pilih Semua" dicentang
    }
</script>

@endsection
