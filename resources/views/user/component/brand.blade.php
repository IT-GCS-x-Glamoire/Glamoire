
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
            @foreach ($brands as $brand)
              <div class="d-flex">
                <img src="{{ Storage::url($brand->brand_logo) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}" class="img-fluid w-1/2 md:w-full">
              </div>
              
              <h1 class="font-semibold text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] py-2">{{ $brand->name }}</h1>
              <p class="text-[10px] md:text-[10px] lg:text-[10px] xl:text-[12px] text-justify">
                {{$brand->description}}
              </p>
            @endforeach
          </div>
        </div>
  
        <div class="col-md-9 col-12 p-md-0">
          <!-- PRODUK TERBARU -->
          <div>
            <div class="text-center">
              <p class="section-title my-3 px-5 text-[10px] md:text-[14px] lg:text-[16px] xl:text-[18px]"><span class="px-2">Produk Terbaru</span></p>
            </div>
    
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @foreach($brands as $brand)
                    @foreach ($brand->products as $product)
                    <div class="swiper-slide p-0">
                        <div class="border border-[#183018] bg-white rounded-lg shadow-sm overflow-hidden product-item d-flex flex-column transition-transform duration-300" style="min-height:315px; max-height:315px;">
                            <img class="card-img-top" src="{{ Storage::url($product->main_image) }}" alt="{{ $product->product_name }}">

                            <div class="grid text-left content-card px-3 py-2 flex-grow-1">
                                <div class="flex rating-wishlist">
                                    <div class="flex gap-1">
                                        <i class="text-decoration-none fas fa-star text-[8px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                                        <p class="text-decoration-none text-black text-[8px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                                    </div>

                                    <div class="ml-auto">
                                        <a title="Tambah ke Favorit" href="javascript:void(0);" class="text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid align-items-center justify-content-between hover-red" onclick="addToWishlist({{$product->id}})">
                                            <i class="fas fa-heart text-center"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="grid name-price hover:cursor-pointer">
                                    <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[10px] xl:text-[12px]"> 
                                        <a href="/{{ $product->product_code }}_product" class="text-decoration-none">
                                            {{ Str::limit($product->product_name, 30) }}
                                        </a>
                                    </p>
                                    <div class="flex justify-content-start gap-1">
                                        <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">
                                            Rp {{ number_format($product->regular_price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-content-between px-2 mt-auto add-wishlist">
                                <a href="javascript:void(0);" class="mb-2 py-2 rounded-sm border border-[#183018] hover:border-white shadow-sm w-full hover:bg-[#183018] text-decoration-none text-[#183018] hover:text-white p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] flex gap-1 align-items-center justify-content-center hover-red" onclick="addToCart({{$product->id}})">
                                    + <i class="fas fa-shopping-cart"></i>
                                    Keranjang
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination mt-8"></div>
            </div>
          </div>
          <!-- END PRODUK TERBARU -->
          
          <!-- PRODUK TERLARIS -->
          <div>
            <div class="text-center">
              <p class="section-title my-3 px-5 text-[10px] md:text-[14px] lg:text-[16px] xl:text-[18px]"><span class="px-2">Produk Terlaris</span></p>
            </div>
    
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                @foreach($brands as $brand)
                  @foreach ($brand->products as $product)
                  <div class="swiper-slide p-0">
                      <div class="border border-[#183018] bg-white rounded-lg shadow-sm overflow-hidden product-item d-flex flex-column transition-transform duration-300" style="min-height:315px; max-height:315px;">
                          <img class="card-img-top" src="{{ Storage::url($product->main_image) }}" alt="{{ $product->product_name }}">

                          <div class="grid text-left content-card px-3 py-2 flex-grow-1">
                              <div class="flex rating-wishlist">
                                  <div class="flex gap-1">
                                      <i class="text-decoration-none fas fa-star text-[8px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                                      <p class="text-decoration-none text-black text-[8px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                                  </div>

                                  <div class="ml-auto">
                                      <a title="Tambah ke Favorit" href="javascript:void(0);" class="text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid align-items-center justify-content-between hover-red" onclick="addToWishlist({{$product->id}})">
                                          <i class="fas fa-heart text-center"></i>
                                      </a>
                                  </div>
                              </div>
                              
                              <div class="grid name-price hover:cursor-pointer">
                                  <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[10px] xl:text-[12px]"> 
                                      <a href="/{{ $product->product_code }}_product" class="text-decoration-none">
                                          {{ Str::limit($product->product_name, 30) }}
                                      </a>
                                  </p>
                                  <div class="flex justify-content-start gap-1">
                                      <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">
                                          Rp {{ number_format($product->regular_price, 0, ',', '.') }}
                                      </p>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="flex justify-content-between px-2 mt-auto add-wishlist">
                              <a href="javascript:void(0);" class="mb-2 py-2 rounded-sm border border-[#183018] hover:border-white shadow-sm w-full hover:bg-[#183018] text-decoration-none text-[#183018] hover:text-white p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] flex gap-1 align-items-center justify-content-center hover-red" onclick="addToCart({{$product->id}})">
                                  + <i class="fas fa-shopping-cart"></i>
                                  Keranjang
                              </a>
                          </div>
                      </div>
                  </div>
                  @endforeach
                @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination mt-8"></div>
            </div>
          </div>
          <!-- END PRODUK TERLARIS -->
        </div>
      </div>
      <!-- TOP SELLING End -->
    </div>
  </div>
@endsection

