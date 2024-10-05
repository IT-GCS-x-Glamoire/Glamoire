@extends('user.layouts.master')

@section('content')

@php
    if (session('id_user')){
        $wishlist = $data->wishlist;
    }
@endphp

<div class="md:px-20 lg:px-24 xl:px-24 py-2">
    <!-- PROMO FIRST USER -->
    @if (session('id_user'))
    <div class="modal fade" id="promoModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- Close button at the top right corner -->
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- Fullscreen image -->
                    <div class="container-fluid p-0 m-0">
                        <img src="images/bannerpromo1.png" alt="Promo" class="img-fluid w-auto h-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="modal fade" id="firstUser" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- Close button at the top right corner -->
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- Fullscreen image -->
                    <div class="container-fluid p-0 m-0">
                        <img src="images/modal.png" alt="Gambar Subscribe" class="img-fluid w-auto h-100">
                        <div class="d-flex gap-2">
                            <div class="py-2 grid md:flex col-12 align-items-center justify-content-center" style="background-color: #475136">
                                <div class="col-12 col-md-6 p-0 p-md-2 mb-2 mb-md-0">
                                    <p class="text-white text-[10px] md:text-[10px] lg:text-[10px] xl:text-[12px]">Dapatkan Kode Voucher Gratis Khusus Pengguna Baru</p>
                                </div>  
                                <div class="col-12 col-md-6 m-0 p-0">
                                    <form class="grid gap-1 gap-md-2" id="voucher-form">
                                        @csrf
                                        <div class="relative flex items-center">
                                            <i class="fas fa-envelope text-gray-400 absolute left-3"></i> <!-- Ikon Email -->
                                            <input type="email" class="form-control pl-10 pr-10 rounded-md text-[8px] md:text-[9px] lg:text-[10px] xl:text-[11px]" id="voucher_email" placeholder="Masukkan email" required>
                                            <div class="spinner-border text-[#183018] absolute right-3" role="status" style="width:15px; height:15px;display:none;"> <!-- Spinner -->
                                                <span class="visually-hidden"></span>
                                            </div>
                                        </div>

                                        <div id="validationEmailVoucher" class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]" style="display: none;">
                                        </div>
                                        <button class="py-2 font-italic w-full rounded-md text-white bg-[#183018] text-[8px] md:text-[9px] lg:text-[10px] xl:text-[11px]" type="submit" id="voucher-btn" disabled>Dapatkan Sekarang</button>
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- END PROMO FIRST USER-->


    <!-- CAROUSEL -->
    <div class="container-fluid">
        <div class="swiper mySwiperCarousel">
            <div class="swiper-wrapper">
                @for ($i=1;$i <= 3;$i++)
                    <div class="swiper-slide">
                        <div class="container-fluid p-0 m-md-4 m-lg-4 m-xl-4">
                            <img src="images/promo.png" alt="Nama Promo" class="img-fluid">
                        </div>
                    </div>
                @endfor
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- CAROUSEL END -->


    <!-- TOP SELLING Start -->
    <div class="container-fluid">
        <div class="text-center md:mb-4 lg:mb-4 xl:mb-4 pt-1 md:pt-4 lg:pt-4 xl:pt-4">
            <h2 class="section-title px-5  text-[10px] md:text-[14px] lg:text-[16px] xl:text-[18px]"><span class="px-2">Produk Terlaris</span></h2>
        </div>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper"> 
            @if (session('id_user'))
                @if (count($wishlist) !== 0)
                    @foreach ($wishlist as $wp)
                        @for($i = 0; $i <= 10; $i++)
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
                                                    @if ($i == $wp->product_id)
                                                        <a href="javascript:void(0);" class="text-decoration-none text-[#FF0000] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid align-items-center justify-content-between hover-red" onclick="addToWishlist({{$i}})">
                                                            <i class="fas fa-heart text-center"></i> Favorit
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);" class="text-decoration-none text-[#183018] p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] grid align-items-center justify-content-between hover-red" onclick="addToWishlist({{$i}})">
                                                            <i class="fas fa-heart text-center"></i> Favorit
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <h1 class="text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$i}}">Everlaskin {{$i}}</h1>
                                            <div class="flex justify-content-start gap-1">
                                                <p class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                                                <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                                            </div>
                                        </div>
                                        <div class="flex justify-content-between px-2">
                                            <a href="javascript:void(0);" class="mb-2 py-2 rounded-sm border border-[#183018] hover:border-white shadow-sm w-full hover:bg-[#183018] text-decoration-none text-[#183018] hover:text-white p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] flex gap-1 align-items-center justify-content-center hover-red" onclick="addToCart({{$i}})">
                                                + <i class="fas fa-shopping-cart"></i>
                                                Keranjang
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endfor
                    @endforeach

                @else
                    @for($i = 0; $i <= 10; $i++)
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
                @endif
            @else
                @for($i = 0; $i <= 10; $i++)
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
                                    <a href="javascript:void(0);" class="mb-2 py-2 rounded-sm border border-[#183018] hover:border-white shadow-sm w-full hover:bg-[#183018] text-decoration-none text-[#183018] hover:text-white p-0 text-[7px] md:text-[12px] lg:text-[10px] xl:text-[12px] flex gap-1 align-items-center justify-content-center hover-red" onclick="addToCart({{$i}})">
                                        + <i class="fas fa-shopping-cart"></i>
                                        Keranjang
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endfor
            @endif

                    
               
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
    <!-- TOP SELLING End -->


    <!-- NEW ARRIVAL Start -->
    <div class="container-fluid">
        <div class="text-center md:mb-4 lg:mb-4 xl:mb-4 pt-1 md:pt-4 lg:pt-4 xl:pt-4">
            <h2 class="section-title px-5  text-[10px] md:text-[14px] lg:text-[16px] xl:text-[18px]"><span class="px-2">Produk Terbaru</span></h2>
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
    <!-- NEW ARRIVAL End -->

    <!-- KEUNGGULAN -->
    <div class="container-fluid my-8 md:my-10 lg:my-12 xl:my-14">
        <div class="row">
            <div class="col-4">
                <h6 class="text-[10px] mb-2 md:text-[14px] lg:text-[16px] xl:text-[18px]">Plant-Based Cruelty-free</h6>
                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">1st Plant-Based Beauty Commerce in Indonesia</p>
            </div>
            <div class="col-4">
                <h6 class="text-[10px] mb-2 md:text-[14px] lg:text-[16px] xl:text-[18px]">BPOM Approved</h6>
                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Belanja produk kecantikan pasti asli dari ratusan brand yang bersertifikasi BPOM.</p>
            </div>
            <div class="col-4">
                <h6 class="text-[10px] mb-2 md:text-[14px] lg:text-[16px] xl:text-[18px]">Plant-Based Beauty</h6>
                <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">One stop Plant-Based Beauty Beauty, cosmetic & personal care</p>
            </div>
        </div>
    </div>

    <!-- LANGGANAN INFORMASI/SUBSCRIBE -->
    <div class="container-fluid mb-4">
        <div class="d-flex gap-2">
        <div class="py-3 grid md:flex col-12 align-items-center justify-content-center rounded-md" style="background-color: #475136">
            <div class="col-12 col-md-8 mb-2 mb-md-0 p-0 p-md-2">
                <p class="text-white text-[10px] md:text-[12px] lg:text-[14px] xl:text-[24px]">Langganan Untuk Mendapatkan Informasi Terbaru Dari Kami</p>
            </div>  
            <div class="col-12 col-md-4 p-0 p-md-2">
                <form class="grid gap-1 gap-md-2 m-0" id="subscribe-form">
                    @csrf
                    <div class="relative flex items-center">
                        <i class="fas fa-envelope text-gray-400 absolute left-3 text-[10px] md:text-[9px] lg:text-[10px] xl:text-[11px]"></i> <!-- Ikon Email -->
                        <input type="email" class="form-control pl-10 pr-10 rounded-md text-[8px] md:text-[9px] lg:text-[10px] xl:text-[11px]" id="subscribe_email" placeholder="Masukkan email" required>
                        <div class="spinner-border text-[#183018] absolute right-3" role="status" style="width:15px; height:15px;display:none;"> <!-- Spinner -->
                            <span class="visually-hidden"></span>
                        </div>
                    </div>

                    <div id="validationEmailSubscribe" class="text-[12px] md:text-[8px] lg:text-[10px] xl:text-[12px]" style="display: none;">
                    </div>
                    <button class="py-2 w-full rounded-md text-white bg-[#183018] text-[10px] md:text-[9px] lg:text-[10px] xl:text-[11px]" type="submit" id="subscribe-btn" disabled>Berlangganan Sekarang</button>
                </form>
            </div>
        </div>  
        </div>
    </div>
    <!-- END -->
</div>

<!-- SUBSCRIBE  -->
<script>
    $(document).on("submit", "#subscribe-form", function (e) {
        e.preventDefault();

        let email = $("#subscribe_email").val();

        $.ajax({
            url: "{{ route('subscribe') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}", // CSRF token dari Laravel
                email: email,
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
                    }).then(function () {
                      window.location.href = "/"; // Redirect ke halaman utama atau halaman lain
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
                Swal.fire("Error", "Maaf, Coba Lagi", "error");
            },
        });
    });

    $('#subscribe_email').on('keyup', function () {
        var email = $(this).val();
        console.log(email);
        if (email) {
            $.ajax({
                url: "{{ route('check.email.subscribe') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    email: email
                },
                beforeSend: function() {
                    // Tampilkan spinner sebelum request dimulai
                    $('.spinner-border').show();
                },
                success: function (response) {
                    if (response.exists) {
                        $('#validationEmailSubscribe').text('Email sudah didaftarkan').addClass('text-white').show();
                        $('#subscribe-btn').prop('disabled', true);
                    } else {
                        $('#validationEmailSubscribe').hide();
                        $('#subscribe-btn').prop('disabled', false);
                    }
                },
                complete: function() {
                    // Sembunyikan spinner setelah request selesai
                    $('.spinner-border').hide();
                },
                error: function() {
                    alert('error');
                    // Jika ada error, tetap sembunyikan spinner
                    $('.spinner-border').hide();
                }
            });
        }
    });

    $('#voucher_email').on('keyup', function () {
        var email = $(this).val();
        if (email) {
            $.ajax({
                url: "{{ route('check.email.voucher') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    email: email
                },
                beforeSend: function() {
                    // Tampilkan spinner sebelum request dimulai
                    $('.spinner-border').show();
                },
                success: function (response) {
                    if (response.exists) {
                        $('#validationEmailVoucher').text('Email sudah didaftarkan').addClass('text-white').show();
                        $('#voucher-btn').prop('disabled', true);
                    } else {
                        $('#validationEmailVoucher').hide();
                        // $('#validationEmailVoucher').text('Kocak').addClass('text-white').show();
                        $('#voucher-btn').prop('disabled', false);
                    }
                },
                complete: function() {
                    // Sembunyikan spinner setelah request selesai
                    $('.spinner-border').hide();
                },
                error: function() {
                    // Jika ada error, tetap sembunyikan spinner
                    $('.spinner-border').hide();
                }
            });
        }
    });
</script>

@if (session('id_user'))
<!-- MENGATUR POP-UP PROMO  -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var myModal = new bootstrap.Modal(document.getElementById('promoModal'));
    myModal.show();
    });
</script>
@else
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var myModal = new bootstrap.Modal(document.getElementById('firstUser'));
    myModal.show();
    });
</script>
@endif
@endsection