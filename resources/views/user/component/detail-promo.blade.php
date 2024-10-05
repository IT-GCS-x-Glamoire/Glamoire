@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 2xl:px-96 py-2">

  <div class="container-fluid py-4">
    <div class="col my-2 p-0">
      <p class="font-semibold text-[14px] md:text-[12px] lg:text-[14px] xl:text-[24px] bg-[#183018] text-white w-fit py-2 pl-1 pr-3" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
        Promo Flash Sale
      </p>
    </div>

    <div class="col p-0">
      <img src="images/bannerpromo1.png" class="img-fluid py-1" alt="banner promo 1" title="Banner Promo 1" title="Nama Promo">
    </div>

    <div class="grid-container">
      @for ($i=1;$i <= 8;$i++)
        <div class="bg-white rounded-lg shadow-sm overflow-hidden product-item border border-xl">
          <a href="/{{ $i }}_product" class="text-decoration-none">
              <div class="position-relative overflow-hidden bg-transparent p-0">
                  <img class="img-fluid w-100 rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
              </div>
              <div class="grid gap-1 text-left p-2">
                  <div class="flex">
                      <div class="flex gap-1">
                          <i class="text-decoration-none fas fa-star text-[8px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                          <p class="text-decoration-none text-black text-[8px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                      </div>
                      <div class="ml-auto">
                          <a href="javascript:void(0);" class="text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid align-items-center justify-content-between hover-red" onclick="addToWishlist({{$i}})">
                              <i class="fas fa-heart text-center"></i> Favorit
                          </a>
                      </div>
                  </div>
                  <h1 class="text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$i}}">Everlaskin {{$i}}</h1>
                  <div class="flex justify-content-start gap-1">
                      <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                      <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                  </div>
              </div>
              <div class="flex justify-content-between px-2">
                  <!-- <a href="/{{ $i }}_product" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid hover-red">
                      <i class="fas fa-eye"></i>
                      Detail
                  </a>
                  <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid hover-red" onclick="addToWishlist()">
                      <i class="fas fa-heart"></i> Favorit
                  </a> -->

                  <a href="javascript:void(0);" class="mb-2 py-2 rounded-sm border border-[#183018] hover:border-white shadow-sm w-full hover:bg-[#183018] text-decoration-none text-[#183018] hover:text-white p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] flex gap-1 align-items-center justify-content-center hover-red" onclick="addToCart({{$i}})">
                      + <i class="fas fa-shopping-cart"></i>
                      Keranjang
                  </a>
              </div>
          </a>
        </div>
      @endfor
    </div>

  </div>
</div>

@endsection
