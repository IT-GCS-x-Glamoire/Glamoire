
@extends('user.layouts.master')

@section('content')
  <div class="md:px-20 lg:px-24 xl:px-24 py-2">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-3">
          <div class="position-sticky mb-3 rounded-md shadow-md p-2 border border-[#183018]" style="top: 4rem">
            <div class="d-flex justify-content-center text-align-center">
              <p class="font-semibold text-black px-5 text-[10px] md:text-[14px] lg:text-[18px] xl:text-[22px]">Deskripsi</p>
            </div>
            <div class="d-flex">
              <img src="images/l-1.png" alt="brand" class="img-fluid w-1/2 md:w-full">
            </div>
            <h1 class="font-semibold text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] py-2">Glamoire</h1>
            <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Glamoire adalah e-commerce yang berkomitmen untuk menyediakan produk kosmetik berkualitas tinggi yang berbahan dasar tanaman. 
            Kami percaya bahwa kecantikan tidak harus mengorbankan kesejahteraan lingkungan.</p>
          </div>
        </div>
  
        <div class="col-md-9 col-12 p-md-0">
          <div>
            <div class="text-center">
              <p class="section-title my-3 px-5 text-[10px] md:text-[14px] lg:text-[16px] xl:text-[18px]"><span class="px-2">Produk Terbaru</span></p>
            </div>
    
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @for($i=0; $i<=10; $i++)
                    <div class="swiper-slide p-0">
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
                                          <a href="javascript:void(0);" class="text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid align-items-center justify-content-between hover-red" onclick="addToWishlist()">
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

                                  <a href="javascript:void(0);" class="btn mb-2 py-2 rounded-sm border border-[#183018] shadow-sm w-full text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] flex gap-1 align-items-center justify-content-center hover-red" onclick="addToCart({{$i}})">
                                      + <i class="fas fa-shopping-cart"></i>
                                      Keranjang
                                  </a>
                              </div>
                          </a>
                      </div>
                    </div>
                  @endfor
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination mt-8"></div>
            </div>
          </div>
          <div>
            <div class="text-center">
              <p class="section-title my-3 px-5 text-[10px] md:text-[14px] lg:text-[16px] xl:text-[18px]"><span class="px-2">Produk Terlaris</span></p>
            </div>
    
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @for($i=0; $i<=10; $i++)
                    <div class="swiper-slide p-0">
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
                                            <a href="javascript:void(0);" class="text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid align-items-center justify-content-between hover-red" onclick="addToWishlist()">
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

                                    <a href="javascript:void(0);" class="btn mb-2 py-2 rounded-sm border border-[#183018] shadow-sm w-full text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] flex gap-1 align-items-center justify-content-center hover-red" onclick="addToCart({{$i}})">
                                        + <i class="fas fa-shopping-cart"></i>
                                        Keranjang
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>
                  @endfor
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination mt-8"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- TOP SELLING End -->
    </div>
  </div>
@endsection

