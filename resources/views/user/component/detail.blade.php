@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 py-2 mb-14 mb-md-0">
    <div class="container-fluid">
        <div class="shadow-sm border border-black rounded-md py-2 py-md-3 my-2 my-md-3">
            <div class="d-flex gap-2 pl-2">
                <a href="/" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Beranda</a>
                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
                <a href="/shop" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Belanja</a>
                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
                <a href="#" class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">{{ $product->product_name }}</a>
            </div>
        </div>
    </div>

    <!-- Shop Detail Start -->
    <div class="container-fluid">
        <!-- IMAGE PRODUCT -->
        <div class="row">
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 4rem">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperShow">
                        <div class="swiper-wrapper">

                            @if (!empty($product->main_image))
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="zoomable-image" src="{{ Storage::url($product->main_image) }}" alt="product Image" />
                                    </div>
                                </div>
                            @endif

                            @if (!empty($product->images))
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide">
                                        <div class="image-container">
                                            <img class="zoomable-image" src="{{ Storage::url($image) }}" alt="product Image" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if (!empty($product->video))
                                <div class="swiper-slide h-fit">
                                    <video class="zoomable-video" id="mainVideo" controls controlsList="nodownload noplaybackrate">
                                        <source src="{{ Storage::url($product->video) }}" type="video/mp4">
                                    </video>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="swiper mySwiperProduct">
                        <div class="swiper-wrapper">
                            @if (!empty($product->images))
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide example-product hover:cursor-pointer p-1" id="main_image">
                                        <a>
                                            <img src="{{ Storage::url($image) }}" alt="{{ $product->product_name }}}}" />
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            
                            @if (!empty($product->main_image))
                                <div class="swiper-slide example-product hover:cursor-pointer p-1" id="main_image">
                                    <a>
                                        <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->product_name }}}}" />
                                    </a>
                                </div>
                            @endif

                            @if (!empty($product->video))
                                <div class="swiper-slide example-product hover:cursor-pointer p-1" id="videoproduk">
                                    <a>
                                        <div class="video-thumbnail-wrapper">
                                            <img src="{{ Storage::url($product->main_image) }}" alt="Video Thumbnail" />
                                            <i class="fas fa-play" style="color: #183018;"></i>
                                        </div>
                                    </a>
                                </div>
                            @endif
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
                    <a href="/brand" class="text-decoration-none text-black text-[14px] md:text-[18px] lg:text-[20px] xl:text-[24px]">Brand</a>
                    <h3 class="font-weight-semi-bold text-[14px] md:text-[18px] lg:text-[20px] xl:text-[24px]">{{ $product->product_name }}</h3>
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
                    <small class="pt-1">(50 Ulasan)</small>
                </div>
                
                <div>
                    <h3 class="font-weight-semi-bold text-[14px] md:text-[18px] lg:text-[20px] xl:text-[24px]">Rp {{ number_format($product->regular_price, 0, ',', '.') }}</h3>
                </div>
                
                <div>
                    <p class="text-[12px] md:text-[14px] lg:text-[16px] xl:text-[16px]">
                        {{ $product->description }}
                    </p>
                </div>
                
                <div class="align-items-center gap-2 d-none d-lg-flex">
                    <div class="input-group quantity-detail-produk rounded-sm shadow-sm" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" 
                            class="form-control bg-secondary text-center px-2" 
                            id="total-detail-product-quantity-{{$product->id}}" 
                            value="1" 
                            min="1" 
                            max="{{ $product->stock_quantity }}" 
                            oninput="checkMaxQuantity(this, {{ $product->stock_quantity }})">
                        <div class="input-group-btn">
                            <button class="btn btn-plus" id="btn-plus-{{$product->id}}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <a onclick="addCartWithQuantity({{$product->id}})" class="hover:cursor-pointer py-2 hover:bg-gray-100 rounded-sm shadow-sm text-decoration-none px-3 text-black text-[14px] md:text-[12px] lg:text-[16px] xl:text-[16px]"><i class="fa fa-plus mr-1"></i> Keranjang</a>
                    <a onclick="buyNow({{$product->id}})" class="hover:cursor-pointer text-decoration-none py-2 rounded-sm hover:bg-neutral-900 shadow-sm px-3 text-white bg-[#183018] text-[14px] md:text-[12px] lg:text-[16px] xl:text-[16px]">Beli Sekarang</a>
                </div>
                
                <span id="quantity-warning-{{$product->id}}" class="text-danger" style="display: none;">Batas untuk pembelian produk terpenuhi</span>
                
                <div class="row">
                    <div class="col">
                        <div class="nav nav-tabs justify-content-start border-secondary mb-4">
                            <a class="nav-item nav-link active text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#tab-pane-1">Deskripsi</a>
                            <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#tab-pane-2">Informasi</a>
                            <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#tab-pane-3">Ulasan (0)</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <h4 class="mb-3">Deskripsi Produk</h4>
                                <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">{{ $product->description }}</p>
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
                                    <div class="col-12 overflow-y-auto custom-scroll" style="max-height:50vh;">
                                        <h4 class="mb-4 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">1 review for "Colorful Stylish Shirt"</h4>
                                        @for ($k=1; $k <= 10;$k++)
                                            <div class="comment mb-4">
                                                <div class="media-body grid">
                                                    <div class="flex">
                                                        <div class="col-10">
                                                            <div class="grid">
                                                                <div class="flex">
                                                                    <img src="images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                                                    <div class="grid">
                                                                        <h6 class="mb-2 text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                                                        <div class="mr-2">
                                                                            <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                                                                            <small class="text-[10px] md:text-[12px] lg:text-[14x] xl:text-[16px] text-black">5</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 d-flex align-items-center">
                                                            <img src="images/produk1.png" alt="" style="height: 100%; object-fit: cover; width: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Bagikan Produk ke:</p>
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
            <h2 class="section-title px-5  text-[12px] md:text-[14px] lg:text-[18px] xl:text-[22px]"><span class="px-2">Produk Yang Mungkin Anda Suka</span></h2>
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
    <a href="javascript:void(0)" class="btn rounded-sm shadow-sm w-fit bg-transparent text-white border border-white text-[12px]" onclick="addToCart({{$product}})">
        Keranjang
    </a>
    <a class="btn btn-light rounded-sm shadow-sm w-full text-[#183018] text-[12px]">
        Beli Sekarang
    </a>
  </div>
</div>

<!-- UNTUK MENGATUR ZOOM IN GAMBAR PADA HALAMAN DETAIL PRODUK -->
@if (!empty($product->video))
    <script>
        document.getElementById('videoproduk').addEventListener('click', function(e) {
            e.preventDefault();
            // Temukan video berdasarkan ID
            const video = document.getElementById('mainVideo');
            
            // Pastikan video berada di slide yang aktif
            const swiperInstance = document.querySelector('.swiper').swiper;
            swiperInstance.slideTo(6); // Mengarahkan ke slide dengan indeks yang berisi video

            // Tunggu sampai transisi selesai dan kemudian play video
            setTimeout(function() {
                video.play();
            }, 500); // Delay untuk memastikan transisi selesai
        });
    </script>
@endif
<script>
    document.querySelector('.image-container').addEventListener('mousemove', function(e) {
        const zoomableImage = this.querySelector('.zoomable-image');
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left; // Koordinat x kursor relatif terhadap kontainer
        const y = e.clientY - rect.top;  // Koordinat y kursor relatif terhadap kontainer

        // Mengatur transform-origin berdasarkan posisi kursor
        zoomableImage.style.transformOrigin = `${x}px ${y}px`;
    });

    


    function addCartWithQuantity(productId) {
        var currentQuantity = parseInt($('#total-detail-product-quantity-' + productId).val());

        // console.log({
        //     productId,
        //     currentQuantity,
        // });

        $.ajax({
            url: "{{ route('add.to.chart.with.quantity') }}", // Route register di Laravel
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}", // Token CSRF untuk Laravel
                product_id: productId,
                quantity: currentQuantity,
            },
            success: function (response) {
                if (response.success) {
                    Toast.fire({
                      icon: "success",
                      text: response.message,
                      title: "Berhasil",
                      willOpen: () => {
                        const title = document.querySelector('.swal2-title');
                        const content = document.querySelector('.swal2-html-container');
                        if (title) title.style.color = '#ffffff'; // Ubah warna judul
                        if (content) content.style.color = '#ffffff'; // Ubah warna konten
                      }
                    });
                } else {
                    let errors = response.errors;
                    let errorMessages = response.message;
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessages += errors[key][0] + "<br>";
                        }
                    }
                    Swal.fire("Error", errorMessages, "error");
                }
            },
            error: function (response) {
                Swal.fire("Error", "Kesalahan Sistem", "error");
            },
        });
    }

    function buyNow(productId) {
        var currentQuantity = parseInt($('#total-detail-product-quantity-' + productId).val());

        // console.log({
        //     productId,
        //     currentQuantity,
        // });

        $.ajax({
            url: "{{ route('add.product.buy.now') }}", // Route register di Laravel
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}", // Token CSRF untuk Laravel
                product_id: productId,
                quantity: currentQuantity,
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = "/buy-now";
                } else {
                    let errors = response.errors;
                    let errorMessages = response.message;
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessages += errors[key][0] + "<br>";
                        }
                    }
                    Swal.fire("Error", errorMessages, "error");
                }
            },
            error: function (response) {
                Swal.fire("Error", "Kesalahan Sistem", "error");
            },
        });
    }

    // Product Quantity
    $(".quantity-detail-produk button").on("click", function () {
        var button = $(this);
        var input = button.parent().parent().find("input");
        var oldValue = input.val();
        var maxQuantity = {{ $product->stock_quantity }};
        var newVal;

        if (button.hasClass("btn-plus")) {
            newVal = parseFloat(oldValue) + 1;
        } else {
            newVal = (oldValue > 1) ? parseFloat(oldValue) - 1 : 1;
        }

        // Set the new value to the input
        input.val(newVal);
        
        // Call checkMaxQuantity to handle warning message and button state
        checkMaxQuantity(input[0], maxQuantity);
    });

    function checkMaxQuantity(input, maxQuantity) {
        var value = parseFloat(input.value);
        var warningElement = document.getElementById("quantity-warning-" + input.id.split('-').pop());
        var plusButton = document.getElementById("btn-plus-" + input.id.split('-').pop());

        if (value >= maxQuantity) {
            warningElement.style.display = "block"; // Show warning
            plusButton.disabled = true; // Disable the plus button
        } else {
            warningElement.style.display = "none"; // Hide warning
            plusButton.disabled = false; // Enable the plus button
        }
    }
</script>
@endsection