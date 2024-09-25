@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 2xl:px-96 py-2">
  <div class="container-fluid">
    <div class="py-2 py-md-3">
      <div class="d-flex gap-2">
        <a href="/home" class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
        <p class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Promo</a>
        <p class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-black text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Nama Promo</a>
      </div>
    </div>  
  </div>

  <div class="container-fluid">
    <div class="col my-2 p-0">
      <h2 class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Nama Promo</h2>
    </div>

    <div class="col p-0">
      <div class="">
        <a href="#">
          <img src="images/bannerpromo1.png" class="img-fluid py-1" alt="banner promo 1" title="Banner Promo 1">
        </a>
      </div>
    </div>


    <div class="col my-2 p-0">
      <h2 class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Promo</h2>
    </div>

    <div class="col">
      <div class="row">
        <!-- Card Items -->
        @for ($i=1;$i <= 8;$i++)
        <div class="col-lg-3 col-md-4 col-6 p-1">
          <div class="bg-white rounded-lg shadow-sm overflow-hidden product-item border border-xl">
              <a href="/detail" class="text-decoration-none">
                  <div class="position-relative overflow-hidden bg-transparent p-0">
                      <img class="img-fluid w-100 rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                  </div>
                  <div class="grid gap-1 text-left p-2">
                      <div class="flex justify-content-start gap-1">
                          <i class="text-decoration-none fas fa-star text-[11px] md:text-[13px] lg:text-[15px] xl:text-[15px]" style="color:orange;"></i>
                          <p class="text-decoration-none text-black text-[11px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                      </div>
                      <h1 class="text-[11px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$i}}">Everlaskin 2in1 Fill and Clean Gentle Scalp & Body Massager</h1>
                      <div class="flex justify-content-start gap-1">
                          <p class="text-decoration-none text-black text-[11px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                          <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                      </div>
                  </div>
                  <div class="flex justify-content-between px-2">
                      <a href="/detail" class="col-4 text-center text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red">
                          <i class="fas fa-eye"></i>
                          Detail
                      </a>
                      <a href="javascript:void(0);" class="col-4 text-center text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToWishlist()">
                          <i class="fas fa-heart"></i> Wishlist
                      </a>

                      <a href="javascript:void(0);" class="col-4 text-center text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToCart()">
                          <i class="fas fa-shopping-cart"></i>
                          Cart
                      </a>
                  </div>
              </a>
          </div>
        </div>
        @endfor
        
        <!-- End Card Items -->
      </div>
    </div>

  </div>
</div>

@endsection
