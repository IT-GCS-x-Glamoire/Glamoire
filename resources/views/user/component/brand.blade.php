
@extends('user.layouts.master')

@section('content')
  <div class="md:px-20 lg:px-24 xl:px-24 py-2">
    <div class="container-fluid">
      <div class="py-2 py-md-3  ">
        <div class="d-flex gap-2">
          <a href="/home" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
          <a href="/home" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Brands</a>
          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
          <a href="#" class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Glamoire</a>
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-3 pt-2 md:pt-0 lg:pt-0 xl:pt-0 border-right border-bottom">
          <div class="position-sticky mb-3 bg-light rounded" style="top: 2rem">
            <div class="d-flex justify-content-center text-align-center">
              <h2 class=" font-bold font-weight-500 text-black px-5 text-[8px] md:text-[14px] lg:text-[18px] xl:text-[22px]">ABOUT</h2>
            </div>
            <div class="d-flex">
              <img src="images/l-1.png" alt="brand" class="img-fluid w-1/3 md:w-full">
            </div>
            <h1 class="font-semibold text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] py-2">Glamoire</h1>
            <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Glamoire adalah e-commerce yang berkomitmen untuk menyediakan produk kosmetik berkualitas tinggi yang berbahan dasar tanaman. 
            Kami percaya bahwa kecantikan tidak harus mengorbankan kesejahteraan lingkungan.</p>
          </div>
        </div>
  
        <div class="col-md-9 col-12">
          <div>
            <div class="text-center md:mb-4 lg:mb-4 xl:mb-4 pt-1 md:pt-4 lg:pt-4 xl:pt-4">
              <h2 class="section-title px-5 text-[8px] md:text-[14px] lg:text-[18px] xl:text-[22px]"><span class="px-2">NEW ARRIVAL</span></h2>
            </div>
    
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @for($i=0; $i<=10; $i++)
                      <div class="swiper-slide p-0">
                          <div class="bg-white rounded-lg shadow-sm overflow-hidden product-item border border-xl">
                              <a href="/detail" class="text-decoration-none">
                                  <div class="position-relative overflow-hidden bg-transparent p-0">
                                      <img class="img-fluid w-100 rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                                  </div>
                                  <div class="grid gap-1 text-left p-2">
                                      <div class="flex justify-content-start gap-1">
                                          <i class="text-decoration-none fas fa-star text-[8px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                                          <p class="text-decoration-none text-black text-[8px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                                      </div>
                                      <h1 class="text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$i}}">Everlaskin 2in1 Fill and Clean Gentle Scalp & Body Massager</h1>
                                      <div class="flex justify-content-start gap-1">
                                          <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                                          <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                                      </div>
                                  </div>
                                  <div class="flex justify-content-between px-2">
                                      <a href="/detail" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red">
                                          <i class="fas fa-eye"></i>
                                          Detail
                                      </a>
                                      <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToWishlist()">
                                          <i class="fas fa-heart"></i> Wishlist
                                      </a>

                                      <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToCart()">
                                          <i class="fas fa-shopping-cart"></i>
                                          Cart
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
            <div class="text-center md:mb-4 lg:mb-4 xl:mb-4 pt-1 md:pt-4 lg:pt-4 xl:pt-4">
              <h2 class="section-title px-5 text-[8px] md:text-[14px] lg:text-[18px] xl:text-[22px]"><span class="px-2">BEST SELLER</span></h2>
            </div>
    
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @for($i=0; $i<=10; $i++)
                      <div class="swiper-slide p-0">
                          <div class="bg-white rounded-lg shadow-sm overflow-hidden product-item border border-xl">
                              <a href="/detail" class="text-decoration-none">
                                  <div class="position-relative overflow-hidden bg-transparent p-0">
                                      <img class="img-fluid w-100 rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                                  </div>
                                  <div class="grid gap-1 text-left p-2">
                                      <div class="flex justify-content-start gap-1">
                                          <i class="text-decoration-none fas fa-star text-[8px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                                          <p class="text-decoration-none text-black text-[8px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                                      </div>
                                      <h1 class="text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$i}}">Everlaskin 2in1 Fill and Clean Gentle Scalp & Body Massager</h1>
                                      <div class="flex justify-content-start gap-1">
                                          <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                                          <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                                      </div>
                                  </div>
                                  <div class="flex justify-content-between px-2">
                                      <a href="/detail" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red">
                                          <i class="fas fa-eye"></i>
                                          Detail
                                      </a>
                                      <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToWishlist()">
                                          <i class="fas fa-heart"></i> Wishlist
                                      </a>

                                      <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToCart()">
                                          <i class="fas fa-shopping-cart"></i>
                                          Cart
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

