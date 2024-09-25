@extends('user.layouts.master')

@section('content')

<div class="md:px-20 lg:px-24 xl:px-24 pt-2">
    <div class="md:container-fluid">
        <div class="container-fluid">
            <div class="row py-2 py-md-3">
                <div class="col-12">
                    <div class="d-flex gap-2">
                        <a href="/home" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
                        <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
                        <a href="#" class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Checkout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gap-2 gap-md-0 m-0 p-0">
            <div class="col-md-8 grid gap-2">
                @foreach ($address as $checkout_address)
                    @if ($checkout_address->is_use)
                    <div class="col-12 p-0 md:shadow-md md:rounded p-md-3 py-2 py-md-0 border-bottom border-top md:border-none">
                        <h1 class="font-semibold text-black text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px] mb-2">Alamat Pengiriman</h1>
                        <div class="grid gap-md-2 mb-md-2">
                            <div class="d-flex gap-1 gap-md-2 align-items-center">
                                <i class="fas fa-location-arrow text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"></i>
                                <p class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">{{ $checkout_address->label }}</p>
                                <p class="font-bold text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">.</p>
                                <p class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">{{ $checkout_address->recipient_name }}</p>
                            </div>
                            <div class="d-flex gap-1 gap-md-2">
                                <p class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">{{ $checkout_address->address }}</p>
                                <p class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">({{ $checkout_address->benchmark }})</p>
                            </div>
                            <div class="d-flex">
                                <p class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">{{ $checkout_address->district }}, {{ $checkout_address->regency }}, {{ $checkout_address->province }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary rounded-sm text-white text-[6px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-bs-toggle="modal" data-bs-target="#change_address" style="background-color: #183018">
                                Ubah Alamat
                            </button>
                        </div>
                    </div>
                    @endif
                @endforeach

                <div class="col-12 p-0 md:shadow-md md:rounded p-md-3 py-2 py-md-0 border-bottom border-top md:border-none">
                    <h1 class="font-semibold text-black text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px] mb-2">Metode Pembayaran</h1>
                    <div class="grid gap-md-2 mb-md-2">
                        <div class="col-sm-10">
                            <form>
                                <div class="form-check d-flex align-items-center justify-content-start">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="qris" value="qris" checked>
                                    <label class="form-check-label text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="qris">
                                        QRIS
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center justify-content-start">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="bca_va" value="bca_va">
                                    <label class="form-check-label text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="bca_va">
                                        BCA Virtual Account
                                    </label>
                                </div>
                            </form>         
                                    
                        </div>
                    </div>
                </div>
        
                @for ($i=1;$i <= 1;$i++)
                    <div class="col-12 p-0 py-1 py-md-0 md:shadow-md md:border border-bottom border-top md:rounded p-md-3">
                        <div class="grid mb-2">
                            <h1 class="text-black font-semibold text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px] mb-1 mb-md-2">Produk - {{ $i }}</h1>
                        </div>  
        
                        <div class="flex">
                            <div class="w-[70px] h-[70px] w-md-[110px] h-md-[110px]">
                                <img src="images/produk1.png" alt="">
                            </div>
                            <div class="col p-0">
                                <div class="d-flex col-12 gap-1 gap-md-2 mb-2 h-[10px] h-md-[10px]">
                                    <img class="rounded-sm" src="images/l-1.png" alt="logo brand" style="background-color:#183018">
                                    <p class="font-semibold text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Glamoire</p>
                                </div>
                                <div class="grid lg:flex">
                                    <div class="col-lg-10">
                                        <p class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Fresh Foam | Pembeersih noda busa helm spray foam pembersih dan penyejuk busa helm - Kilap Premium</p>
                                    </div>
                                    <div class="col-lg-2 p-lg-0">
                                        <div class="d-flex gap-1 font-semibold">
                                            <p class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">1</p>
                                            <p class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">X</p>
                                            <p class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Rp990.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        
            <div class="col-md-4 p-0">
                <div class="position-sticky" style="top: 2rem">
                    <div class="p-3 bg-light rounded custom-shadow grid gap-2 gap-md-3">
                        <h1 class="font-semibold text-black text-[14px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Order Summary</h1>
        
                        <div class="grid">
                            <div class="d-flex">
                                <p class="text-[10px] md:text-[8px] lg:text-[12px] xl:text-[14px]">Total Harga (2 Barang)</p>
                                <p class="text-[10px] md:text-[8px] lg:text-[12px] xl:text-[14px] ml-auto">Rp30.000</p>
                            </div>
                            <div class="d-flex">
                                <p class="text-[10px] md:text-[8px] lg:text-[12px] xl:text-[14px]">Total Diskon</p>
                                <p class="text-[10px] md:text-[8px] lg:text-[12px] xl:text-[14px] ml-auto">-Rp30.000</p>
                            </div>
                            <div class="d-flex">
                                <p class="text-[10px] md:text-[8px] lg:text-[12px] xl:text-[14px]">Total Ongkos Kirim</p>
                                <p class="text-[10px] md:text-[8px] lg:text-[12px] xl:text-[14px] ml-auto">Rp30.000</p>
                            </div>
                        </div>
                        <div class="d-flex py-2 border-bottom border-top align-items-center"">
                            <p class="text-black text-[12px] md:text-[8px] lg:text-[12px] xl:text-[14px]">Subtotal</p>
                            <p class="text-black font-semibold text-[12px] md:text-[12px] lg:text-[16px] xl:text-[18px] ml-auto">Rp30.000</p>
                        </div>
                        <div>
                            <form action="" id="code-voucher-form" class="grid gap-2">
                                @csrf
                                <div class="d-flex gap-1">
                                    <input type="text" class="form-control w-full rounded-md text-[10px] md:text-[8px] lg:text-[14px] xl:text-[16px]" id="code_voucher" placeholder="Masukkan kode promo">
                                    <button type="submit" id="button-code-voucher" class="btn border rounded-md w-fit text-white text-[10px] md:text-[7px] lg:text-[14px] xl:text-[16px] hover-shadow-md" style="background-color: #183018">
                                        Pakai
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="d-flex align-items-center btn btn-primary rounded-sm text-black text-[6px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-bs-toggle="modal" data-bs-target="#promo" style="background-color: #FFFFFF">
                            <i class="fas fa-solid fa-tag mr-2"></i>
                            <p class="text-[10px] md:text-[8px] lg:text-[12px] xl:text-[14px]">Gunakan Promo</p>
                            <i class="fas fa-solid fa-arrow-right ml-auto"></i>
                        </button>
                        <button class="btn w-full rounded-sm text-white text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="background-color: #183018" type="submit" id="paynow">
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CHANGE ADDRESS -->
<div class="modal fade" id="change_address" tabindex="-1" aria-labelledby="change_address" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content overflow-y-auto" style="max-height:90vh;">
      <div class="modal-header border-none pb-0">
        <h1 class="modal-title text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="exampleModalLabel">Pilih Alamat Pengiriman</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        @foreach ($address as $address)
            @if ($address->is_use)
                <div class="col-12 p-2 shipping-address" id="shipping-address-{{ $address->id }}" onclick="selectAddress(this)">
                    <div class="p-2 rounded-sm border border-dark">
                        <div class="d-flex align-items-center">
                            <p class="text-black mb-0 text-[9px] md:text-11px] lg:text-[13px] xl:text-[15px]">{{ $address->label }}</p>
                            @if ($address->is_main)
                                <span class="badge bg-[#ffffff] text-[#183018] d-flex align-items-center justify-content-center ml-auto
                                text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">Utama</span>
                            @endif
                        </div>

                        <div class="flex">
                            <div class="col-10 p-0">
                                <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-black">{{ $address->recipient_name }}</p>
                                <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">{{ $address->handphone }}</p>
                                <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] ">{{ $address->district }}, {{ $address->regency }}, {{ $address->Province }}</p>
                                <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] ">{{ $address->address }}</p>
                                @if ($address->benchmark)
                                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">Patokan ({{ $address->benchmark }})</p>
                                @endif
                            </div>
                            <div class="col-2 p-0 d-flex flex-column align-items-start justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-12 p-2 shipping-address" id="shipping-address-{{ $address->id }}" onclick="selectAddress(this)">
                <div class="p-2 rounded-sm custom-shadow">
                    <div class="d-flex align-items-center">
                        <p class="text-black mb-0 text-[9px] md:text-11px] lg:text-[13px] xl:text-[15px]">{{ $address->label }}</p>
                        @if ($address->is_main)
                            <span class="badge bg-[#ffffff] text-[#183018] d-flex align-items-center justify-content-center ml-auto
                            text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">Utama</span>
                        @endif
                    </div>
                    
                    <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-black">{{ $address->recipient_name }}</p>
                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">{{ $address->handphone }}</p>
                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] ">{{ $address->district }}, {{ $address->regency }}, {{ $address->Province }}</p>
                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] ">{{ $address->address }}</p>
                    @if ($address->benchmark)
                        <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">Patokan ({{ $address->benchmark }})</p>
                    @endif
    
                    <div class="d-flex gap-2 input-group-btn mt-2">
                        <button type="button" class="bg-white hover:border-dark btn border w-full rounded-sm text-[#183018] text-[9px] md:text-11px lg:text-[13px] xl:text-[15px]" name="useAddress" data-id="{{ $address->id }}">
                            Gunakan
                        </button>
                    </div>
                </div>
            </div>
            @endif
        @endforeach

    </div>
    </div>
  </div>
</div>
<!-- END MODAL CHANGE ADDRESS -->

<!-- MODAL USE PROMO -->
<div class="modal fade" id="promo" tabindex="-1" aria-labelledby="promo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-y-auto" style="max-height:90vh;">
            <div class="modal-header border-none pb-0">
                <h1 class="modal-title text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="exampleModalLabel">Gunakan Voucher Promo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-1 p-md-3">
                <div class="col-12 p-0">
                    @for ($i=1;$i <= 3;$i++)
                    <div class="col-12 p-2 promo-item" onclick="selectPromo(this)">
                        <div class="grid gap-1 p-2 border rounded-sm bg-light cursor-pointer">
                            <div class="d-flex">
                                <div class="col-10 p-0">
                                    <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-black font-semibold">PROMO DISCOUNT UP TO 10%</p>
                                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] text-[#988888]">Get 10% off with min Rp100.000</p>
                                </div>
                                <div class="col-2 d-flex flex-column align-items-start justify-content-center">
                                    <i class="fas fa-check hidden"></i>
                                </div>
                            </div>

                            <div class="d-flex gap-1 gap-md-2 align-items-center">
                                <i class="fas fa-regular fa-clock"></i>
                                <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">Berlaku hingga 31 Agustus 2024</p>
                                <a class="ml-auto text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] text-danger text-decoration-none" onclick="toggleDetail(event, '#detail-promo-{{$i}}', this)">Lihat Detail</a>
                            </div>

                            <div class="grid mt-3 detail-promo" id="detail-promo-{{$i}}" style="display: none;">
                                <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-black font-semibold">Syarat & Ketentuan</p>
                                <ol class="list-group-numbered overflow-y-auto" style="max-height:100px;">
                                    @for ($j = 1; $j <= 12; $j++)
                                    <li class="list-group-item p-1 border-none d-flex align-items-start text-[7px] md:text-[7px] lg:text-[9px] xl:text-[11px]">
                                        <span class=""></span> <!-- Nomor list -->
                                        <p class="ml-2 text-[7px] md:text-[7px] lg:text-[9px] xl:text-[11px] mb-0">Kupon Toko Diskon dapat digunakan dengan membuka halaman promo di Keranjang.</p>
                                    </li>
                                    @endfor
                                </ol>
                            </div>

                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <div class="modal-footer">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div>
                        <p class="mb-0 text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">Yey, kamu hemat</p>
                        <p class="mb-0 text-black font-semibold text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">Rp10.000</p>
                    </div>
                    <button type="submit" id="button-use-voucher" class="btn border rounded-md text-white text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px] hover-shadow-md" style="background-color: #183018">
                        Pakai Voucher
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Function to toggle promo details
    function toggleDetail(event, detailId, link) {
        event.stopPropagation(); // Prevent the click from bubbling up to the promo item
        const detail = document.querySelector(detailId);
        const isVisible = detail.style.display === 'block';

        // Toggle detail visibility
        if (isVisible) {
            detail.style.display = 'none';
            link.textContent = 'Lihat Detail';
        } else {
            detail.style.display = 'block';
            link.textContent = 'Tutup Detail';
        }
    }

    // Function to highlight selected promo
    function selectPromo(promoElement) {
        // Remove border from all promo items
        const allPromos = document.querySelectorAll('.promo-item');
        allPromos.forEach(promo => {
            promo.querySelector('.grid').classList.remove('border-dark');
            promo.querySelector('.fas.fa-check').classList.add('hidden');
        });

        // Add border to the selected promo
        promoElement.querySelector('.grid').classList.add('border', 'border-dark');
        promoElement.querySelector('.fas.fa-check').classList.remove('hidden');
    }

    function selectAddress(addressElement) {
        const allAddress = document.querySelectorAll('.shipping-address');

        allaAddress.forEach(address => {
            promo.querySelector('.grid').classList.remove('border-dark');
            promo.querySelector('.fas.fa-check').classList.add('hidden');
        });

        // Add border to the selected promo
        promoElement.querySelector('.grid').classList.add('border', 'border-dark');
        promoElement.querySelector('.fas.fa-check').classList.remove('hidden');
    }

    $(document).on('click', 'button[name="useAddress"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        
        $.ajax({
            url: "{{ route('use.shipping.address') }}",
            type: 'POST',
            data: {
                address_id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
              Swal.fire({
                  title: "Success",
                  text: response.message,
                  icon: "success",
              }).then(function() {
                  location.reload(); // Refresh halaman jika diperlukan
              });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert("Error occurred!");
            }
        });
    });

</script>
@endsection