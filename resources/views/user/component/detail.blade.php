@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 py-2 mb-14 mb-md-0">
    <div class="container-fluid">
        <div class="row py-2 py-md-3">
            <div class="col-12">
                <div class="d-flex gap-2">
                    <a href="/home" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
                    <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
                    <a href="/shop" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Brand</a>
                    <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
                    <a href="#" class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Nama Produk</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail Start -->
    <div class="container-fluid">
        <!-- IMAGE PRODUCT -->
        <div class="row">
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 2rem">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperShow">
                        <div class="swiper-wrapper">
                            @for ($h = 1; $h <= 7; $h++)
                                @if ($h == 7)
                                    <div class="swiper-slide">
                                        <video class="zoomable-video" controls>
                                            <source src="images/videoproduk.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                @else
                                    <div class="swiper-slide">
                                        <div class="image-container">
                                            <img class="zoomable-image" src="images/produk{{$h}}.png" alt="product Image" />
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                    
                    <div class="swiper mySwiperProduct">
                        <div class="swiper-wrapper">
                            @for ($i = 1; $i <= 7; $i++)
                                @if ($i == 7)
                                    <div class="swiper-slide example-product hover:cursor-pointer p-1" id="videoproduk">
                                        <video class="zoomable-video" controls>
                                            <source src="images/videoproduk.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                @else
                                    <div class="swiper-slide example-product hover:cursor-pointer p-1" id="produk{{ $i }}">
                                        <a>
                                            <img src="{{ asset('images/produk' . $i . '.png') }}" alt="Produk{{ $i }}" />
                                        </a>
                                    </div>
                                @endif
                            @endfor
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid col-lg-8 gap-3">
                <div class="variant d-md-none">
                    <p class="text-[14px] md:text-[18px] lg:text-[20px] xl:text-[24px]">Color</p>
                    <div class="flex gap-1">
                        @for ($i=1; $i<=3;$i++)
                        <div class="border border-red rounded-md p-2">
                            <p class="text-[10px] md:text-[18px] lg:text-[20px] xl:text-[24px]">Warna {{ $i  }}</p>
                        </div>
                        @endfor
                    </div>
                </div>

                <div>
                    <h3 class="text-[14px] md:text-[18px] lg:text-[20px] xl:text-[24px]">Brand</h3>
                    <h3 class="font-weight-semi-bold text-[14px] md:text-[18px] lg:text-[20px] xl:text-[24px]">Product {{ $data }}</h3>
                </div>
                
                <div class="variant d-none d-md-block">
                    <p class="text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Variant Warna</p>
                    <div class="flex gap-2">
                        @for ($i=1; $i<=3;$i++)
                        <div class="border border-red rounded-md px-3 py-1 hover:cursor-pointer">
                            <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[14px]">Warna {{ $i  }}</p>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="d-flex">
                    <div class="mr-2">
                        <small class="fas fa-star text-[14px]" style="color:orange;"></small>
                        <small class="text-[14px] text-black">5</small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                
                <div>
                    <h3 class="font-weight-semi-bold text-[14px] md:text-[18px] lg:text-[20px] xl:text-[24px]">Rp80.000</h3>
                </div>
                
                <div>
                    <p class="text-[12px] md:text-[14px] lg:text-[16px] xl:text-[16px]">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.</p>
                </div>
                
                <div class="align-items-center gap-2 d-none d-lg-flex">
                    <div class="input-group quantity rounded-sm shadow-sm" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="/cart" class="btn rounded-sm shadow-sm px-3 text-black text-[14px] md:text-[16px] lg:text-[18px] xl:text-[18px]"><i class="fa fa-shopping-cart mr-1"></i>Keranjang</a>
                    <a href="/checkout" class="text-decoration-none py-2 rounded-sm hover:bg-neutral-900 shadow-sm px-3 text-white bg-[#183018] text-[14px] md:text-[16px] lg:text-[18px] xl:text-[18px]">Beli Produk</a>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="nav nav-tabs justify-content-start border-secondary mb-4">
                            <a class="nav-item nav-link active text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#tab-pane-1">Description</a>
                            <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#tab-pane-2">Information</a>
                            <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <h4 class="mb-3">Product Description</h4>
                                <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <h4 class="mb-3">Additional Information</h4>
                                <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                            </li>
                                        </ul> 
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                            </li>
                                        </ul> 
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-4 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">1 review for "Colorful Stylish Shirt"</h4>
                                        
                                        <div class="media mb-4">
                                            <img src="images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6 class="mb-2 text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                                <div class="text-primary mb-2 d-flex">
                                                    <i class="fas fa-star mr-1 text-[14px] md:text-[16px] lg:text-[18px] xl:text-[18px]" style="color:orange;"></i>
                                                    <p class="text-[12px] md:text-[14px] lg:text-[16x] xl:text-[16px]">5</p>
                                                </div>
                                                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                            </div>
                                        </div>
                                        <div class="media mb-4">
                                            <img src="images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6 class="mb-2 text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                                <div class="text-primary mb-2 d-flex">
                                                    <i class="fas fa-star mr-1 text-[14px] md:text-[16px] lg:text-[18px] xl:text-[18px]" style="color:orange;"></i>
                                                    <p class="text-[12px] md:text-[14px] lg:text-[16x] xl:text-[16px]">5</p>
                                                </div>
                                                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <h4 class="mb-4">Leave a review</h4>
                                        <small>Your email address will not be published. Required fields are marked *</small>
                                        <div class="d-flex my-3">
                                            <p class="mb-0 mr-2">Your Rating * :</p>
                                            <div class="text-primary">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <label for="message">Your Review *</label>
                                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Your Name *</label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Your Email *</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END IMAGE PRODUCT -->
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid mt-md-4">
        <div class="text-center md:mb-4 lg:mb-4 xl:mb-4 py-3 md:pt-4 lg:pt-4 xl:pt-4">
            <h2 class="section-title px-5  text-[12px] md:text-[14px] lg:text-[18px] xl:text-[22px]"><span class="px-2">You May Also Like</span></h2>
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
                                    <div class="flex justify-content-start gap-1">
                                        <i class="text-decoration-none fas fa-star text-[8px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                                        <p class="text-decoration-none text-black text-[8px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                                    </div>
                                    <h1 class="text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$i}}">Everlaskin 2in1 Produk {{ $i }}</h1>
                                    <div class="flex justify-content-start gap-1">
                                        <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                                        <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                                    </div>
                                </div>
                                <div class="flex justify-content-between px-2">
                                    <a href="/{{ $i }}_product" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red">
                                        <i class="fas fa-eye"></i>
                                        Detail
                                    </a>
                                    <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToWishlist({{$i}})">
                                        <i class="fas fa-heart"></i> Wishlist
                                    </a>

                                    <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red" onclick="addToCart({{$i}})">
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
    <!-- Products End -->
</div>

<div class="d-lg-none fixed-bottom" style="background-color:#183018;">
  <div class="container-fluid d-flex gap-2 py-1">
    <button class="btn rounded-sm shadow-sm w-fit bg-transparent border border-white text-[#183018] text-[10px] md:text-[16px] lg:text-[18px] xl:text-[18px]">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
            <path fill="#ffffff" d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z"/>
        </svg>
    </button>
    <a href="javascript:void(0)" class="btn rounded-sm shadow-sm w-fit bg-transparent text-white border border-white text-[12px]" onclick="addToCart({{$data}})">
        Keranjang
    </a>
    <a class="btn btn-light rounded-sm shadow-sm w-full text-[#183018] text-[12px]">
        Beli Sekarang
    </a>
  </div>
</div>

<!-- UNTUK MENGATUR ZOOM IN GAMBAR PADA HALAMAN DETAIL PRODUK -->
<script>
  document.querySelector('.image-container').addEventListener('mousemove', function(e) {
    const zoomableImage = this.querySelector('.zoomable-image');
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left; // Koordinat x kursor relatif terhadap kontainer
    const y = e.clientY - rect.top;  // Koordinat y kursor relatif terhadap kontainer

    // Mengatur transform-origin berdasarkan posisi kursor
    zoomableImage.style.transformOrigin = `${x}px ${y}px`;
  });
</script>
@endsection