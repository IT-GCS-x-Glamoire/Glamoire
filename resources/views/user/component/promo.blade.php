@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 2xl:px-96 py-2 mb-8">
  <div class="container-fluid p-0 py-4">
    <div class="col mb-2">
      <p class="font-semibold text-[14px] md:text-[12px] lg:text-[14px] xl:text-[24px] bg-[#183018] text-white w-fit py-2 pl-1 pr-3" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
        Makin Hemat dengan Voucher
      </p>
    </div>

    <div class="col mb-2">
        <div class="d-flex overflow-x-auto max-w-fit-content custom-scroll gap-2 border-top border-bottom py-2" style="max-height: 20vh; max-width: 100%;">
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo A" id="promo-a" alt="voucher" data-bs-toggle="modal" data-bs-target="#voucher" style="max-width: 30vh;">
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo B" id="promo-a" alt="voucher" style="max-width: 30vh;">
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo C" id="promo-a" alt="voucher" style="max-width: 30vh;">
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo D" id="promo-a" alt="voucher" style="max-width: 30vh;">
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo E" id="promo-a" alt="voucher" style="max-width: 30vh;">
            <img src="images/ongkir.png" class="img-fluid shadow-md rounded-sm" title="Promo F" id="promo-a" alt="ongkir" style="max-width: 30vh;">  
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo E" id="promo-a" alt="voucher" style="max-width: 30vh;">
            <img src="images/ongkir.png" class="img-fluid shadow-md rounded-sm" title="Promo F" id="promo-a" alt="ongkir" style="max-width: 30vh;">  
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo E" id="promo-a" alt="voucher" style="max-width: 30vh;">
            <img src="images/ongkir.png" class="img-fluid shadow-md rounded-sm" title="Promo F"  id="promo-a"alt="ongkir" style="max-width: 30vh;">  
            <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" title="Promo E"  id="promo-a"alt="voucher" style="max-width: 30vh;">
            <img src="images/ongkir.png" class="img-fluid shadow-md rounded-sm" title="Promo F" id="promo-a" alt="ongkir" style="max-width: 30vh;"> 
        </div>
    </div>


    <div class="col mb-2 mt-8">
      <p class="font-semibold text-[14px] md:text-[12px] lg:text-[14px] xl:text-[24px] bg-[#183018] text-white w-fit py-2 pl-1 pr-3" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
        Event Spektakuler Glamoire
      </p>
    </div>
    
    <div class="col">
      <div class="row">
        @for ($i=1;$i <= 2;$i++)
          <div class="col-lg-6 hover:shadow-xl">
            <a href="/detail-promo" class="hover:shadow-xl">
              <img src="images/bannerpromo{{$i}}.png" class="img-fluid py-1 hover:scale-105 transition-transform duration-300 hover:shadow-md" alt="banner promo 1" title="Promo">
            </a>
          </div>
        @endfor
      </div>
    </div>
  </div>
</div>

<!-- MODAL DETAIL VOUCHER -->
<div class="modal fade" id="voucher" tabindex="-1" aria-labelledby="promo" aria-hidden="true">
    <div class="modal-dialog modal-md-dialog-centered" style="min-width:50vw;">
        <div class="modal-content" style="min-height:60vh;">
            <div class="modal-header border-2-bottom border-[#183018] pb-3">
                <h1 class="modal-title font-semibold text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="exampleModalLabel">Nama Voucher</h1>
                <button type="button" class="btn-close text-[#183018] text-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-1 p-md-3">
                <div class="row p-0">
                    <div class="col-6 border-right border-[#183018]">
                        <div class="grid w-full mb-2">
                          <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-[#183018]">DESKRIPSI</p>
                          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-[#183018]">Voucher diskon 15% hingga Rp200.000</p>
                        </div>
                        <div class="grid w-full gap-2">
                          <div class="flex">
                            <div class="col-2 p-0 d-flex align-items-center justify-content-center">
                              <i class="fas fa-money-bill fa-sm fa-md-lg" style="color:#183018;"></i>
                            </div>
                            <div class="col-10 p-0 grid">
                              <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-[#183018]">Minimun Transaksi</p>
                              <p class="text-[7px] md:text-[8px] lg:text-[10px] xl:text-[12px]">Rp60.000</p>
                            </div>
                          </div>
                          
                          <div class="flex">
                            <div class="col-2 p-0 flex align-items-center justify-content-center">
                              <i class="fas fa-regular fa-calendar fa-sm fa-md-lg" style="color:#183018;"></i>
                            </div>
                            <div class="col-10 p-0">
                              <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-[#183018]">Periode Voucher</p>
                              <p class="text-[7px] md:text-[8px] lg:text-[10px] xl:text-[12px]">1 Oktober 2024 - 1 Januari 2025</p>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-6 grid">
                        <div class="border-bottom border-[#183018] p-0 p-md-2">
                          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-[#183018]">Syarat & Ketentuan</p>
                        </div>
                        <div class="overflow-y-auto">
                            <ol class="list-group-numbered" style="max-height:30vw;">
                                @for ($j = 1; $j <= 12; $j++)
                                <li class="list-group-item p-1 border-none d-flex align-items-start text-[6px] md:text-[6px] lg:text-[8px] xl:text-[10px]">
                                    <span class=""></span> <!-- Nomor list -->
                                    <p class="ml-2 text-[8px] md:text-[10px] lg:text-[10px] xl:text-[12px] mb-0">Kupon Toko Diskon dapat digunakan dengan membuka halaman promo di Keranjang.</p>
                                </li>
                                @endfor
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
