@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 2xl:px-96 py-2">
  <div class="container-fluid">
    <div class="py-2 py-md-3">
      <div class="d-flex gap-2">
        <a href="/home" class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
        <p class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-black text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Promo</a>
      </div>
    </div>  
  </div>

  <div class="container-fluid p-0">
    <div class="col mb-2">
        <h2 class="font-semibold text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Voucher</h2>
    </div>

    <div class="col mb-2">
      <div class="d-flex overflow-x-auto gap-2 border-top border-bottom py-2">
        <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" alt="voucher">
        <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" alt="voucher">
        <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" alt="voucher">
        <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" alt="voucher">
        <img src="images/voucher.png" class="img-fluid shadow-md rounded-sm" alt="voucher">
        <img src="images/ongkir.png" class="img-fluid shadow-md rounded-sm" alt="ongkir">  
      </div>
    </div>

    <div class="col mb-2">
      <h2 class="font-semibold text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Promo</h2>
    </div>
    
    <div class="col">
      <div class="">
        <a href="/detail-promo">
          <img src="images/bannerpromo1.png" class="img-fluid py-1" alt="banner promo 1">
        </a>
          
        <img src="images/bannerpromo2.png" class="img-fluid" alt="banner promo 2">
      </div>
    </div>
  </div>
</div>

@endsection
