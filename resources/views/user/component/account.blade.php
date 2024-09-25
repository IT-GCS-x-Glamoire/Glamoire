
@extends('user.layouts.master')

@section('content')

@php
  $shippingAddresses = $profile->shippingAddress;
  $whishlist         = $profile->whislist;
@endphp

<div class="md:px-20 lg:px-24 xl:px-24 py-2">
  <div class="container-fluid">
    <div class="py-2 py-md-3">
      <div class="d-flex gap-2 mb-2 mb-md-4">
        <a href="/home" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
        <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="/home" class="text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Manage Account</a>
      </div>
    </div>  
  </div>

  <div class="container-fluid">
    <nav class="tabbable">
      <div class="nav nav-tabs border-secondary mb-2">
          <a class="nav-item nav-link text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#my-profile">Profilku</a>
          <a class="nav-item nav-link text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#shipping-address">Alamat Pengiriman</a>
          <a class="nav-item nav-link text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#my-order">Orderanku</a>
          <a class="nav-item nav-link text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#my-whislist">Produk Favorit</a>
          <a class="nav-item nav-link text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#payment-waiting">Menunggu Pembayaran</a>
      </div>
    </nav>

    <div class="tab-content">
      <!-- PROFILE -->
      <div class="tab-pane fade px-2" id="my-profile" style="min-height:80vh;">
        @if (session('id_user'))
        <form class="row" id="profileForm" method="POST" action="{{route('edit.account')}}">
          @csrf
          @method('PUT')
          <div class="col-12">
            <label for="name" class="form-label text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Nama Lengkap</label>
            <input type="text" class="form-control text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="inputName" name="fullname" placeholder="Enter your fullname" value="{{ $profile->fullname ? $profile->fullname : '' }}">
          </div>
          <div class="col-12">
            <label for="handphone" class="form-label text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Handphone</label>
            <div class="input-group">
              <span class="input-group-text text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="basic-addon1">+62</span>
              <input type="number" class="form-control text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="inputHandphone" placeholder="Enter your phone number" pattern="[0]{1}[8]{1}[0-9]{9,10}" name="handphone" value="{{ $profile->handphone ? $profile->handphone : '' }}">
            </div>
          </div>
          <div class="col-12">
            <label for="email" class="form-label text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Email</label>
            <input type="email" class="form-control text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="inputEmail" placeholder="Enter your email" value="{{ $profile->email ? $profile->email : '' }}" name="email">
          </div>
          <div class="col-12">
            <label for="Gender" class="form-label text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Jenis Kelamin</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" type="radio" id="inputMale" name="gender" value="male" {{ $profile->gender == "male" ? "checked" : ""}}>
                <label class="form-check-label text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" for="inputMale">Pria</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" type="radio" id="inputFemale" name="gender" value="female" {{ $profile->gender == "female" ? "checked" : ""}}>
                <label class="form-check-label text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" for="inputFemale">Wanita</label>
              </div>
            </div>
          </div>

          <div class="col-12 pt-2">
            <button type="submit" class="btn btn-primary text-white w-full rounded-sm text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" style="background-color: #183018" id="submitBtn" disabled>
              Ubah Profil
            </button>
          </div>
        </form>
        @else    
        @endif
      </div>

      <!-- END PROFILE -->

      <!-- SHIPPING ADDRESS -->
      <div class="tab-pane fade" id="shipping-address" style="min-height:80vh;"> 
        <div class="col-12">
          <div class="row">
            <div class="col-12 p-0">
                <div class="d-flex align-items-center justify-content-end px-2">
                  <button type="button" class="btn border btn-light d-flex align-items-center rounded-sm mb-2" data-bs-toggle="modal" data-bs-target="#form-address">
                    <i class="fas fa-thin fa-plus me-2 d-flex align-items-center text-[10px] md:text-11px] lg:text-[13px] xl:text-[15px]"></i>
                    <p class="text-black mb-0 text-[10px] md:text-11px] lg:text-[13px] xl:text-[15px]">Tambahkan Alamat</p>
                  </button>
                </div>
            </div>
          </div>

          <div class="row"> 
            
            @foreach ($shippingAddresses as $sa)
              @if ($sa->is_main)
                <!-- ALAMAT UTAMA -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-2">
                  <div class="p-2 rounded-sm custom-shadow bg-[#183018]">
                    <div class="d-flex align-items-center">
                      <p class="text-white mb-0 text-[10px] md:text-11px] lg:text-[13px] xl:text-[15px]">{{ $sa->label }}</p>
                      <span class="badge bg-[#ffffff] text-[#183018] d-flex align-items-center justify-content-center ml-auto
                      text-[10px] md:text-[9px] lg:text-[11px] xl:text-[13px]">Utama</span>
                    </div>
                    
                    <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-white">{{ $sa->recipient_name }}</p>
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px] text-primary">{{ $sa->handphone }}</p>
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px] text-primary">{{ $sa->district }}, {{ $sa->regency }}, {{ $sa->province }} (61258)</p>
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px] text-primary">{{ $sa->address }}</p>
                    @if ($sa->benchmark)
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px] text-primary">({{ $sa->benchmark }})</p>
                    @endif

      
                    <div class="input-group-btn mt-2">
                      <button type="button" class="btn border text-[#183018] bg-light w-full rounded-sm text-[10px] md:text-[10px] lg:text-[13px] xl:text-[15px]"
                        data-bs-toggle="modal" data-bs-target="#form-edit-address"
                        data-id="{{ $sa->id }}"
                        data-label="{{ $sa->label }}"
                        data-recipient_name="{{ $sa->recipient_name }}"
                        data-handphone="{{ $sa->handphone }}"
                        data-province="{{ $sa->province }}"
                        data-regency="{{ $sa->regency }}"
                        data-district="{{ $sa->district }}"
                        data-address="{{ $sa->address }}"
                        data-benchmark="{{ $sa->benchmark }}"
                        >
                        Ubah Alamat
                      </button>
                    </div>
                  </div>
                </div>
                <!-- END ALAMAT UTAMA -->
              @else
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-2">
                  <div class="p-2 rounded-sm custom-shadow">
                    <div class="d-flex align-items-center">
                      <p class="text-black mb-0 text-[10px] md:text-11px] lg:text-[13px] xl:text-[15px]">{{ $sa->label }}</p>
                    </div>
                    
                    <p class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-black">{{ $sa->recipient_name }}</p>
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px]">{{ $sa->handphone }}</p>
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px]">{{ $sa->district }}, {{ $sa->regency }}, {{ $sa->province }} (61258)</p>
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px]">{{ $sa->address }}</p>
                    @if ($sa->benchmark)
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px]">({{ $sa->benchmark }})</p>
                    @else
                    <p class="text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px]">(Patokan Belum Ditambahkan)</p>
                    @endif
      
                    <div class="d-flex gap-2 input-group-btn mt-2">
                      <button type="button" class="btn border text-[#183018] bg-light w-full rounded-sm text-[10px] md:text-[10px] lg:text-[13px] xl:text-[15px]"
                              data-bs-toggle="modal" data-bs-target="#form-edit-address"
                              data-id="{{ $sa->id }}"
                              data-label="{{ $sa->label }}"
                              data-recipient_name="{{ $sa->recipient_name }}"
                              data-handphone="{{ $sa->handphone }}"
                              data-province="{{ $sa->province }}"
                              data-regency="{{ $sa->regency }}"
                              data-district="{{ $sa->district }}"
                              data-address="{{ $sa->address }}"
                              data-benchmark="{{ $sa->benchmark }}"
                              >
                        Ubah Alamat
                      </button>

                      <button data-id="{{ $sa->id }}" type="button" name="setMainAddress" class="btn border text-white bg-dark w-full rounded-sm text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] hover-shadow-md" style="background-color: #183018">
                        Jadikan Alamat Utama
                      </button>

                      <button data-id="{{ $sa-> id }}" name="deleteAddress" type="button" class="btn border w-fit rounded-sm text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" style="background-color: #ffffff">
                          <i aria-hidden="true" class="fas fa-solid fa-trash" title="Hapus Alamat"></i>
                      </button>
                      
                      
                     

                      <!-- <button data-id="{{ $sa->id }}" name="deleteAddress" type="submit" class="btn border w-fit rounded-sm text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" style="background-color: #ffffff">
                        <i aria-hidden="true" class="fas fa-solid fa-trash" title="Hapus Alamat"></i>
                      </button> -->
                    </div>
                  </div>
                </div>
              @endif
            @endforeach

          </div>
        </div>
      </div>
      <!-- END SHIPPING ADDRESS -->

      <!-- MY ORDER -->
      <div class="tab-pane fade p-0 m-0" id="my-order" style="min-height:80vh;">
        <!-- <nav class="tabbable">
          <div class="nav nav-tabs border-secondary mb-2 text-center">
            <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#all">All</a>
            <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#waiting">Waiting</a>
            <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#proses">Proses</a>
            <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#send">Send</a>
            <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#done">Done</a>
          </div>
        </nav> -->

        <div class="tab-pane p-0 m-0" id="all">
          <!-- CARD -->
          <div class="grid gap-2 p-0 m-0">
            <!-- DONE -->
            <div class="col-12 p-0">
              <div class="p-2 custom-shadow">
                <div class="d-flex align-items-center mb-2">
                  <i class="fas fa-plus  text-[9px] md:text-[11px] lg:text-[13px] xl:text-[15px]"></i>
                  <p class="font-semibold text-black mb-0 text-[9px] md:text-[11px] lg:text-[13px] xl:text-[15px] mx-2">Shopping</p>
                  <p class="text-black mb-0 text-[9px] md:text-[11px] lg:text-[13px] xl:text-[15px]">2 September 2024</p>
                  <span class="badge badge-success d-flex align-items-center justify-content-center
                  text-[9px] md:text-[9px] lg:text-[11px] xl:text-[13px] mx-2">Done</span>
                  <p class="text-primary mb-0 text-[9px] md:text-[11px] lg:text-[13px] xl:text-[15px] d-none d-md-block">
                    INV/07082024/IND/19081010111
                  </p>
                </div>

                <div class="d-flex align-items-center mb-2 gap-1" style="max-width:50px;">
                  <img src="images/l-1.png" alt="logo brand">
                  <p class="font-semibold text-black mb-0 text-[9px] md:text-11px] lg:text-[13px] xl:text-[15px]">Glamoire</p>
                </div>

                <div class="d-flex mb-2 md:mb-4 lg:md-4 xl:md-4">
                  <div class="col-2 col-md-1 p-0 m-0">
                    <img class="border" src="images/produk1.png" alt="nama produk">    
                  </div>
                  <div class="col-6 col-md-8 gap-4">
                    <p class="text-black font-semibold text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Nama Produk</p>
                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">1 Product x Rp10.000</p>
                  </div>
                  <div class="col-4 col-md-3 d-flex flex-column align-items-start justify-content-center border-left">
                    <p class="text-black font-semibold text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Total Belanja</p>
                    <p class="text-black font-semibold text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp20.000</p>  
                  </div>
                </div>
                

                <div class="d-flex justify-content-end input-group-btn mt-2">
                  <div class="col-12 d-flex p-0 justify-content-end gap-2">
                    <div class="d-flex align-items-center justify-content-center">
                      <a class="text-decoration-none hover:cursor-pointer text-[9px] md:text-[11px] lg:text-[13px] xl:text-[15px] text-red-700 font-semibold" data-bs-toggle="modal" data-bs-target="#transaction-detail">
                        Detail Transaksi
                      </a>
                    </div>
                    <button type="submit" class="btn border rounded-sm w-fit text-[#183018] text-[9px] md:text-[11px] lg:text-[13px] xl:text-[15px] hover-shadow-md" data-bs-toggle="modal" data-bs-target="#form-rating-review" style="background-color: #ffffff">
                      Rating & Review
                    </button>
                    <button type="submit" class="btn border rounded-sm w-fit text-white text-[9px] md:text-[11px] lg:text-[13px] xl:text-[15px] hover-shadow-md" style="background-color: #183018">
                      Beli Lagi
                    </button>
                  </div>
                </div>

              </div>
            </div>
            <!-- END DONE -->
            
            <!-- WAITING -->
            <div class="col-12 p-0">
              <div class="p-2 custom-shadow">
                <div class="d-flex align-items-center mb-2">
                  <i class="fas fa-plus  text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]"></i>
                  <p class="font-semibold text-black mb-0 text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px] mx-2">Shopping</p>
                  <p class="text-black mb-0 text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]">2 September 2024</p>
                  <span class="badge badge-secondary d-flex align-items-center justify-content-center
                  text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] mx-2">Confirm Waiting</span>
                </div>

                <div class="d-flex align-items-center mb-2 gap-1" style="max-width:50px;">
                  <img src="images/l-1.png" alt="logo brand">
                  <p class="font-semibold text-black mb-0 text-[9px] md:text-11px] lg:text-[13px] xl:text-[15px]">Glamoire</p>
                </div>

                <div class="d-flex mb-2 md:mb-4 lg:md-4 xl:md-4">
                  <div class="col-2 col-md-1 p-0 m-0">
                    <img class="border" src="images/produk1.png" alt="nama produk">    
                  </div>
                  <div class="col-6 col-md-8 gap-4">
                    <p class="text-black font-semibold text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Nama Produk</p>
                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">1 Product x Rp10.000</p>
                  </div>
                  <div class="col-4 col-md-3 d-flex flex-column align-items-start justify-content-center border-left">
                    <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Total Belanja</p>
                    <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp20.000</p>  
                  </div>
                </div>
              </div>
            </div>
            <!-- END WAITING -->

            <!-- PROSES -->
            <div class="col-12 p-0">
              <div class="p-2 custom-shadow">
                <div class="d-flex align-items-center mb-2">
                  <i class="fas fa-plus  text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]"></i>
                  <p class="font-semibold text-black mb-0 text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px] mx-2">Shopping</p>
                  <p class="text-black mb-0 text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]">2 September 2024</p>
                  <span class="badge badge-info d-flex align-items-center justify-content-center
                  text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] mx-2">In Progress</span>
                </div>

                <div class="d-flex align-items-center mb-2 gap-1" style="max-width:50px;">
                  <img src="images/l-1.png" alt="logo brand">
                  <p class="font-semibold text-black mb-0 text-[9px] md:text-11px] lg:text-[13px] xl:text-[15px]">Glamoire</p>
                </div>

                <div class="d-flex mb-2 md:mb-4 lg:md-4 xl:md-4">
                  <div class="col-2 col-md-1 p-0 m-0">
                    <img class="border" src="images/produk1.png" alt="nama produk">    
                  </div>
                  <div class="col-6 col-md-8 gap-4">
                    <p class="text-black font-semibold text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Nama Produk</p>
                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">1 Product x Rp10.000</p>
                  </div>
                  <div class="col-4 col-md-3 d-flex flex-column align-items-start justify-content-center border-left">
                    <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Total Belanja</p>
                    <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp20.000</p>  
                  </div>
                </div>
              </div>
            </div>
            <!-- PROSES -->

            <!-- PENGIRIMAN -->
            <div class="col-12 p-0">
              <div class="p-2 custom-shadow">
                <div class="d-flex align-items-center mb-2">
                  <i class="fas fa-plus  text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]"></i>
                  <p class="font-semibold text-black mb-0 text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px] mx-2">Shopping</p>
                  <p class="text-black mb-0 text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]">2 September 2024</p>
                  <span class="badge badge-warning d-flex align-items-center justify-content-center
                  text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px] mx-2">In Delivery</span>
                </div>

                <div class="d-flex align-items-center mb-2 gap-1" style="max-width:50px;">
                  <img src="images/l-1.png" alt="logo brand">
                  <p class="font-semibold text-black mb-0 text-[9px] md:text-11px] lg:text-[13px] xl:text-[15px]">Glamoire</p>
                </div>

                <div class="d-flex mb-2 md:mb-4 lg:md-4 xl:md-4">
                  <div class="col-2 col-md-1 p-0 m-0">
                    <img class="border" src="images/produk1.png" alt="nama produk">    
                  </div>
                  <div class="col-6 col-md-8 gap-4">
                    <p class="text-black font-semibold text-[7px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Nama Produk</p>
                    <p class="text-[7px] md:text-[9px] lg:text-[11px] xl:text-[13px]">1 Product x Rp10.000</p>
                  </div>
                  <div class="col-4 col-md-3 d-flex flex-column align-items-start justify-content-center border-left">
                    <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Total Belanja</p>
                    <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp20.000</p>  
                  </div>
                </div>
              </div>
            </div>
            <!-- PENGIRIMAN -->
          </div>
          <!-- CARD -->
        </div>
      </div>
      <!-- END MY ORDER -->

      <!-- WHISHLIST -->
      <div class="tab-pane fade" id="my-whislist" style="min-height:80vh;">
        <div class="col-12">
          <div class="row">
            @foreach ($whishlist as $wp)
            <div class="col-lg-3 col-md-4 col-6 p-1">
              <div class="bg-white rounded-lg shadow-sm overflow-hidden product-item border border-xl">
                  <a href="/detail" class="text-decoration-none">
                      <div class="position-relative overflow-hidden bg-transparent p-0">
                          <img class="img-fluid w-100 rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                      </div>
                      <div class="grid gap-1 text-left p-2">
                          <div class="flex justify-content-start gap-1">
                              <i class="text-decoration-none fas fa-star text-[12px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                              <p class="text-decoration-none text-black text-[12px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                          </div>
                          <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$wp->product_id}}">Everlaskin 2in1 {{ $wp->product_id }}</h1>
                          <div class="flex justify-content-start gap-1">
                              <p class="text-decoration-none text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                              <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                          </div>
                      </div>
                      <div class="flex justify-content-between px-2">
                          <a href="/detail" class="col-4 text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red text-center">
                            <i class="fas fa-eye"></i>
                            Detail
                          </a>
                          <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#FF0000] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-[#183018] text-center" onclick="removeFromWishlist({{$wp->product_id}})">
                            <i class="fas fa-heart"></i> Wishlist
                          </a>
                          <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red text-center" onclick="addToCart({{$wp->product_id}})">
                            <i class="fas fa-shopping-cart"></i>
                            Cart
                          </a>
                      </div>
                  </a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- END WHISLIST -->

      <!-- PAYMENT WAITING -->
      <div class="tab-pane fade" id="payment-waiting" style="min-height:80vh;">
        <div class="col-12 p-2">
          <div class="p-2 p-md-3 p-lg-3 p-xl-3 rounded-sm custom-shadow">
              <div class="row align-items-center mb-2 mb-md-3 border-bottom pb-2 pb-md-3">
                <div class="col-md-6 col-12">
                  <p class="text-black mb-0 text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]">Shopping - 2 September</p>
                </div>
                <div class="col-md-6 col-12 text-start text-md-end  text-lg-end  text-xl-end text-red-800">
                  <p class="text-[7px] md:text-[11px] lg:text-[13px] xl:text-[15px]">Bayar Sebelum, 3 September 2024 17:00 WIB</p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 col-8">
                  <div class="d-flex align-items-center gap-2">
                    <p class="text-black mb-0 text-[7px] md:text-[9px] lg:text-[13px] xl:text-[15px]">Nama Barang </p>
                    <p class="text-black mb-0 text-[7px] md:text-[9px] lg:text-[13px] xl:text-[15px]">| 2 Pcs</p>
                  </div>
                </div>

                <div class="row col-md-8 col-4 p-0 gap-2 gap-md-0 gap-lg-0 gap-xl-0">
                  <div class="col-md-4 col-12 p-0">
                    <div class="grid align-items-center">
                      <p class="text-black font-semibold mb-0 text-[6px] md:text-[9px] lg:text-[13px] xl:text-[15px]">Payment Method</p>
                      <p class="text-black mb-0 text-[6px] md:text-[9px] lg:text-[13px] xl:text-[15px]">BCA Virtual Account</p>
                    </div>
                  </div>

                  <div class="col-md-4 col-12 p-0">
                    <div class="grid align-items-center">
                      <p class="text-black font-semibold mb-0 text-[7px] md:text-[9px] lg:text-[13px] xl:text-[15px]">Virtual Account Number</p>
                      <p class="text-black mb-0 text-[7px] md:text-[9px] lg:text-[13px] xl:text-[15px]">8077708979243010</p>
                    </div>
                  </div>

                  <div class="col-md-4 col-12 p-0">
                    <div class="grid align-items-center">
                      <p class="text-black font-semibold mb-0 text-[7px] md:text-[9px] lg:text-[13px] xl:text-[15px]">Total Price</p>
                      <p class="text-black mb-0 text-[7px] md:text-[9px] lg:text-[13px] xl:text-[15px]">Rp45.000</p>
                    </div>
                  </div>
                </div>
  
              </div>

          </div>
        </div>
      </div>
      <!-- END PAYMENT WAITING -->
    </div>
  </div>
</div>

<!-- MODAL TAMBAH ALAMAT -->
<div class="modal fade" id="form-address" tabindex="-1" aria-labelledby="form-address" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content overflow-y-auto" style="max-height:90vh;">
      <div class="modal-header" style="background-color: #183018">
        <h1 class="modal-title text-white text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="exampleModalLabel">Tambahkan Alamat Baru</h1>
        <button type="button" class="btn-close" style="color:#FFFFFF;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body overflow-y-auto" style="max-height:100vh;">
        <form method="POST" action="{{ route('add.shipping.address')}}" id="add-address-form">
          @csrf
          <div class="grid gap-1 gap-md-2">
            <div class="col-12 p-0">
              <label for="label" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Label</label>
              <input type="text" class="form-control rounded-md text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="label" placeholder="Masukkan Nama Label Untuk Alamatmu" required>
            </div>
            <div class="col-12 p-0">
              <label for="receiver" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Nama Penerima</label>
              <input type="text" class="form-control rounded-md text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]"  name="recipient_name" placeholder="Masukkan Nama Penerima" required>
            </div>
            <div class="col-12 p-0">
              <label for="handphone" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Handphone</label>
              <div class="input-group">
                <span class="input-group-text text-red-700 text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="basic-addon1">+62</span>
                <input type="number" class="form-control rounded-end text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="handphone" placeholder="Contoh : 8979254301" pattern="[0]{1}[8]{1}[0-9]{9,10}" required>
              </div>
            </div>

            <div class="col-12 p-0">
              <label for="provinsi" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Provinsi</label>
              <select class="form-select text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]" aria-label="Provinsi" name="province" id="address_province">
                <option class="text-primary text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pilih Provinsi</option>
              </select>
              <input type="hidden" name="province_name" id="address_province_name">
            </div>

            <div class="col-12 p-0">
              <label for="kabupaten/kota" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Kabupaten/Kota</label>
              <select class="form-select text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]" aria-label="Kabupaten/Kota" name="regency" id="address_regency">
                <option class="text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pilih Kabupaten/Kota</option>
              </select>
              <input type="hidden" name="regency_name" id="address_regency_name">
            </div>

            <div class="col-12 p-0">
              <label for="kecamatan" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Kecamatan</label>
              <select class="form-select text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]" aria-label="Kecamatan" name="district" id="address_district">
                <option class="text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pilih Kecamatan</option>
              </select>
              <input type="hidden" name="district_name" id="address_district_name">
            </div>

            <!-- ALAMAT -->
            <div class="col-12 p-0">
              <label for="alamat" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Alamat</label>
              <textarea class="form-control rounded-lg text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="address" rows="3" placeholder="Masukkan Alamatmu" required></textarea>
            </div>

            <!-- PATOKAN -->
            <div class="col-12 p-0">
              <label for="patokan" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Patokan (Opsional)</label>
              <textarea class="form-control rounded-lg text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="benchmark" rows="3" placeholder="Contoh : Depan Warung Soto Ayam Jepang"></textarea>
            </div>
           
            <!-- BUTTON SUBMIT -->
            <div class="col-12 p-0">
              <button class="btn btn-primary w-full rounded-sm text-white text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" type="submit"  style="background-color: #183018">Tambahkan</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- END MODAL TAMBAH ALAMAT -->

<!-- MODAL EDIT ALAMAT -->
<div class="modal fade" id="form-edit-address" tabindex="-1" aria-labelledby="form-edit-address" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content overflow-y-auto" style="max-height:90vh;">
      <div class="modal-header" style="background-color: #183018">
        <h1 class="modal-title text-white text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="exampleModalLabel">Ubah Data Alamatmu</h1>
        <button type="button" class="btn-close" style="color:#FFFFFF;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body overflow-y-auto" style="max-height:100vh;">
        <form id="editShippingAddressForm" method="POST" action="{{route('edit.shipping.address')}}">
          @csrf
          @method('PUT')
          <input type="number" class="form-control d-none rounded-md text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="address-id">
          <div class="grid gap-1 gap-md-2">
            <div class="col-12 p-0">
              <label for="label" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Label</label>
              <input type="text" class="form-control rounded-md text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" placeholder="Masukkan Nama Label Untuk Alamatmu" name="label">
            </div>
            <div class="col-12 p-0">
              <label for="receiver" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Nama Penerima</label>
              <input type="text" class="form-control rounded-md text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]"  placeholder="Masukkan Nama Penerima" name="recipient_name">
            </div>
            <div class="col-12 p-0">
              <label for="handphone" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Handphone</label>
              <div class="input-group">
                <span class="input-group-text text-red-700 text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" id="basic-addon1">+62</span>
                <input type="number" class="form-control rounded-end text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" placeholder="Contoh : 8979254301" pattern="[0]{1}[8]{1}[0-9]{9,10}" name="handphone">
              </div>
            </div>

            <div class="col-12 p-0">
              <label for="provinsi" class="form-label text-black text-[12px] md:text-[12px] lg:text-[12px] xl:text-[14px]">Provinsi</label>
              <select class="form-select text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" aria-label="Provinsi" name="province">
                <option class="text-primary text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pilih Provinsi</option>
                <option value="Jawa Barat" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Jawa Barat</option>
                <option value="Jawa Tengah" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Jawa Tengah</option>
                <option value="Jawa Timur" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Jawa Timur</option>
              </select>
            </div>

            <div class="col-12 p-0">
              <label for="kabupaten/kota" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Kabupaten/Kota</label>
              <select class="form-select text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" aria-label="Kabupaten/Kota" name="regency">
                <option class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pilih Kabupaten/Kota</option>
                <option value="Sidoarjo" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Sidoarjo</option>
                <option value="Surabaya" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Surabaya</option>
                <option value="Krian" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Krian</option>
              </select>
            </div>

            <div class="col-12 p-0">
              <label for="kecamatan" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Kecamatan</label>
              <select class="form-select text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]" aria-label="Kecamatan" name="district">
                <option class="text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pilih Kecamatan</option>
                <option value="Sukodono" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Sukodono</option>
                <option value="Medaeng" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Medaeng</option>
                <option value="Taman"  class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Taman</option>
              </select>
            </div>

            <!-- ALAMAT -->
            <div class="col-12 p-0">
              <label for="alamat" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Alamat</label>
              <textarea class="form-control rounded-lg text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="address" rows="3" placeholder="Masukkan Alamatmu"></textarea>
            </div>

            <!-- PATOKAN -->
            <div class="col-12 p-0">
              <label for="patokan" class="form-label text-black text-[12px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Patokan (Opsional)</label>
              <textarea class="form-control rounded-lg text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="benchmark" rows="3" placeholder="Contoh : Depan Warung Soto Ayam Jepang"></textarea>
            </div>
           
            <!-- BUTTON SUBMIT -->
            <div class="col-12 p-0">
              <button class="btn btn-primary w-full rounded-sm text-white text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" type="submit" style="background-color: #183018">Perbarui</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- END MODAL EDIT ALAMAT -->

<!-- RATING & REVIEW -->
<div class="modal fade" id="form-rating-review" tabindex="-1" aria-labelledby="form-rating-review" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content overflow-y-auto" style="max-height:90vh;">
      <div class="modal-header pb-0 border-none">
        <h1 class="modal-title text-[#183018]" id="exampleModalLabel">Ulasan Produk</h1>
        <button type="button" class="btn-close" style="color:#183018;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body overflow-y-auto" style="max-height:100vh;">
        <div class="col-12 p-0">
          <p class="text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px] mb-2 mb-md-3">Detail Produk</p>
          <div class="d-flex mb-2 md:mb-4 lg:md-4 xl:md-4">
            <div class="col-2 col-md-2 p-0 m-0">
              <img class="border" src="images/produk1.png" alt="nama produk">    
            </div>
            <div class="col-6 col-md-7 gap-4">
              <div class="d-flex align-items-center mb-2 gap-1 max-w-[40px] max-w-md-[50px]">
                <img src="images/l-1.png" alt="logo brand">
                <p class="font-semibold text-black mb-0 text-[8px] md:text-[11px] lg:text-[13px] xl:text-[15px]">Glamoire</p>
              </div>
              <p class="text-black font-semibold text-[8px] md:text-[11px] lg:text-[13px] xl:text-[15px]">Nama Produk</p>
              <p class="text-[8px] md:text-[11px] lg:text-[13px] xl:text-[15px]">1 Product x Rp10.000</p>
            </div>
            <div class="col-4 col-md-3 d-flex flex-column align-items-start justify-content-center border-left">
              <p class="text-black font-semibold text-[8px] md:text-[9px] lg:text-[11px] xl:text-[15px]">Total Belanja</p>
              <p class="text-black font-semibold text-[8px] md:text-[11px] lg:text-[13px] xl:text-[15px]">Rp20.000</p>  
            </div>
          </div>
        </div>

        <div>
          <p class="text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px] mb-2 mb-md-3">Rating & Review</p>
          <form action="" id="review-and-rating-form">
            @csrf
            <div class="grid gap-1 gap-md-2">
              <!-- RATING -->
              <div class="d-flex justify-content-center align-items-center p-0">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
  
              <!-- REVIEW -->
              <div class="col-12 p-0">
                <textarea class="form-control rounded-lg text-[10px] md:text-[12px] lg:text-[13px] xl:text-[15px]" name="address" rows="3" placeholder="Ceritakan Pengalamanmu Tentang Produk ini" required></textarea>
              </div>
  
              <!-- BUTTON SUBMIT -->
              <div class="col-12 p-0">
                <button class="btn btn-primary w-full rounded-sm text-white text-[10px] md:text-[12px] lg:text-[12px] xl:text-[14px]" type="submit"  style="background-color: #183018">Selesai</button>
              </div>
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
</div>
<!-- END RATING & REVIEW -->

<!-- DETAIL TRANSAKSI -->
<div class="modal fade" id="transaction-detail" tabindex="-1" aria-labelledby="transaction-detail" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content overflow-y-auto" style="max-height:90vh;">

      <div class="modal-body overflow-y-auto" style="max-height:100vh;">
        <div class="row gap-2 gap-lg-0">
          <div class="col-12 col-lg-5 pl-lg-0 d-lg-none d-block">
            <div class="grid p-1 p-md-2 p-lg-3 custom-shadow rounded-md position-sticky" style="top: 0.1rem;">
              <div class="col-12 p-0 border-bottom">
                <p class="text-black text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px]">Riwayat Pengiriman</p>
                <div class="track">
                  <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text text-[10px] md:text-[12px] lg:text-[12px] xl:text-[12px]">Order confirmed</span> </div>
                  <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text text-[10px] md:text-[12px] lg:text-[12px] xl:text-[12px]"> Picked by courier</span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text text-[10px] md:text-[12px] lg:text-[12px] xl:text-[12px]"> On the way </span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text text-[10px] md:text-[12px] lg:text-[12px] xl:text-[12px]">Ready for pickup</span> </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-7">
            <div class="grid p-3 custom-shadow rounded-md">
              <div class="col-12 p-0 pb-2 border-bottom">
                <div class="d-flex">
                  <p class="text-[10px] md:text-[12px] lg:text-[12px] xl:text-[14px]">No. Invoice</p>
                  <p class="text-[10px] md:text-[12px] lg:text-[12px] xl:text-[14px] ml-auto">INV/07082024/IND/19081010111</p>
                </div>
                <div class="d-flex">
                  <p class="text-[10px] md:text-[12px] lg:text-[12px] xl:text-[14px]">Tanggal Pembelian</p>
                  <p class="text-[10px] md:text-[12px] lg:text-[12px] xl:text-[14px] ml-auto">06 September 2024, 15:03 </p>
                </div>
              </div>
              <div class="col-12 p-0 border-bottom">
                <p class="text-black text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px] mb-2 mb-md-3 pt-2 pt-md-3">Detail Produk</p>
                <div class="d-flex mb-2 md:mb-4 lg:md-4 xl:md-4">
                  <div class="col-2 col-md-2 p-0 m-0">
                    <img class="border" src="images/produk1.png" alt="nama produk">    
                  </div>
                  <div class="col-6 col-md-7 gap-4">
                    <div class="d-flex align-items-center mb-2 gap-1 max-w-[40px] max-w-md-[50px]">
                      <img src="images/l-1.png" alt="logo brand">
                      <p class="font-semibold text-black mb-0 text-[8px] md:text-[10px] lg:text-[13px] xl:text-[15px]">Glamoire</p>
                    </div>
                    <p class="text-black font-semibold text-[8px] md:text-[10px] lg:text-[13px] xl:text-[15px]">EVERLASKIN Refine Gentle Aqua Gel Face and Body Exfoliating Gel 30ml</p>
                    <p class="text-[8px] md:text-[10px] lg:text-[13px] xl:text-[15px]">1 Product x Rp10.000</p>
                  </div>
                  <div class="col-4 col-md-3 d-flex flex-column align-items-start justify-content-center border-left">
                    <p class="text-black font-semibold text-[8px] md:text-[10px] lg:text-[11px] xl:text-[13px]">Total Belanja</p>
                    <p class="text-black font-semibold text-[8px] md:text-[10px] lg:text-[11px] xl:text-[13px]">Rp20.000</p>  
                  </div>
                </div>
              </div>

              <!-- INFO PENGIRIMAN -->
              <div class="col-12 p-0 border-bottom">
                <p class="text-black text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px] mb-2 mb-md-3 pt-2 pt-md-3">Info Pengiriman</p>
                <div class="d-flex mb-1 mb-md-2">
                  <p class="col-2 text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">Kurir</p>
                  <p class="col-1 text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">:</p>
                  <p class="text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">JNE</p>
                </div>
                <div class="d-flex mb-1 mb-md-2">
                  <p class="col-2 text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">No.Resi</p>
                  <p class="col-1 text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">:</p>
                  <p class="text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">082723615</p>
                </div>
                <div class="d-flex mb-1 mb-md-2">
                  <p class="col-2 text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">Alamat</p>
                  <p class="col-1 text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">:</p>
                  <div class="grid gap-1">
                    <p class="text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">Penerima : Muhammad Helmi Satria</p>
                    <p class="text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">08979243010</p>
                    <p class="text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">Taman Aloha H4/17 (Depan Gudeg Jogja Bu Susi)</p>
                    <p class="text-[9px] md:text-[10px] lg:text-[13px] xl:text-[15px]">Jawa Timur, Sidoarjo, Sukodono</p>
                  </div>
                </div>
              </div>
              <!--  -->

              <!-- RINCIAN PEMBAYARAN -->
              <div class="col-12 p-0">
                <p class="text-black text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px] pt-2 pt-md-3">Rincian Pembayaran</p>
                  <div class="p-3 bg-light grid gap-2 gap-md-3">
                      <div class="grid">
                          <div class="d-flex">
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Total Harga (2 Barang)</p>
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] ml-auto">Rp30.000</p>
                          </div>
                          <div class="d-flex">
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Total Diskon</p>
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] ml-auto">-Rp30.000</p>
                          </div>
                          <div class="d-flex">
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Total Ongkos Kirim</p>
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] ml-auto">Rp30.000</p>
                          </div>
                          <div class="d-flex">
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Biaya Jasa Aplikasi</p>
                              <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] ml-auto">Rp30.000</p>
                          </div>
                      </div>
                      <div class="d-flex py-2 border-bottom border-top align-items-center"">
                          <p class="text-black text-[12px] md:text-[12px] lg:text-[12px] xl:text-[14px]">Subtotal</p>
                          <p class="text-black font-semibold text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px] ml-auto">Rp30.000</p>
                      </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-5 pl-lg-0 d-none d-lg-block">
            <div class="grid p-1 p-md-2 p-lg-3 custom-shadow rounded-md position-sticky" style="top: 0.1rem;">
              <div class="col-12 p-0 border-bottom">
                <p class="text-black text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px]">Riwayat Pengiriman</p>
                <div class="track">
                  <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text text-[10px] md:text-[8px] lg:text-[12px] xl:text-[12px]">Order confirmed</span> </div>
                  <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text text-[10px] md:text-[8px] lg:text-[12px] xl:text-[12px]"> Picked by courier</span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text text-[10px] md:text-[8px] lg:text-[12px] xl:text-[12px]"> On the way </span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text text-[10px] md:text-[8px] lg:text-[12px] xl:text-[12px]">Ready for pickup</span> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END DETAIL TRANSAKSI -->

  @if(!Auth::check())
    <script>
        $(document).ready(function(){
            $('#login').modal('show');
        });
    </script>
  @endif

  <!-- LOGIC PROFILE FORM -->
  <script>
    $(document).ready(function() {
        let initialData = $('#profileForm').serialize();
        // console.log('Initial data:', initialData);

        $('#profileForm').on('input change', function() {
            let currentData = $(this).serialize();
            // console.log('Current data:', currentData);

            if (currentData !== initialData) {
                $('#submitBtn').prop('disabled', false);
                // console.log('Button enabled');
            } else {
                $('#submitBtn').prop('disabled', true);
                // console.log('Button disabled');
            }
        });
    });

  </script>

  <!-- EDIT FORM ADDRESS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var editAddressModal = document.getElementById('form-edit-address');
      editAddressModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Tombol yang mengaktifkan modal
        var id = button.getAttribute('data-id');
        var label = button.getAttribute('data-label');
        var recipientName = button.getAttribute('data-recipient_name');
        var handphone = button.getAttribute('data-handphone');
        var province = button.getAttribute('data-province');
        var regency = button.getAttribute('data-regency');
        var district = button.getAttribute('data-district');
        var address = button.getAttribute('data-address');
        var benchmark = button.getAttribute('data-benchmark') == null ? "" : button.getAttribute('data-benchmark');

        var modalBody = editAddressModal.querySelector('.modal-body');

        modalBody.querySelector('[name="label"]').value = label;
        modalBody.querySelector('[name="recipient_name"]').value = recipientName;
        modalBody.querySelector('[name="handphone"]').value = handphone;
        modalBody.querySelector('[name="province"]').value = province;
        modalBody.querySelector('[name="regency"]').value = regency;
        modalBody.querySelector('[name="district"]').value = district;
        modalBody.querySelector('[name="address"]').value = address;
        modalBody.querySelector('[name="benchmark"]').value = benchmark;
        modalBody.querySelector('[name="address-id"]').value = id;


      });
    });
  </script>

  <!-- PERBARUI ALAMAT -->
  <!-- <script>
    document.getElementById('edit-address-form').addEventListener('submit', function (event) {
      event.preventDefault(); // Mencegah form dari submit default
      
      var formData = new FormData(this);
      var id = document.querySelector('[name="address-id"]').value;
      console.log(id);

      $.ajax({
          url: "{{ route('edit.shipping.address') }}",
          type: "PUT",
          data: {
            formData,
            _token: "{{ csrf_token() }}",
          },
          success: function (response) {
              if (response.success) {
                  Swal.fire({
                      title: "Success",
                      text: response.message,
                      icon: "success",
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
              Swal.fire("Error", "Failed to register", "error");
          },
      });


      
    });

  </script> -->

  <!-- DELETE ADDRESS -->
  <script>
    $(document).on('click', 'button[name="deleteAddress"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        
        $.ajax({
            url: "{{ route('delete.shipping.address') }}",
            type: 'POST',
            data: {
                address_id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
              Swal.fire({
                  title: "Success",
                  text: response.message,
                  icon: "success",
              }).then(function() {
                  location.reload(); // Refresh halaman jika diperlukan
              });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert("Error occurred!");
            }
        });
    });
  </script>

  <!-- SET MAIN ADDRESS -->
  <script>
    $(document).on('click', 'button[name="setMainAddress"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Ambil ID dari tombol yang diklik

        $.ajax({
            url: "{{ route('main.shipping.address') }}",  // Pastikan route ini di-render dengan benar
            type: 'POST',
            data: {
                address_id: id,  // Sesuaikan dengan request di controller
                _token: '{{ csrf_token() }}'  // Kirim token CSRF untuk keamanan
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                    }).then(function() {
                      location.reload(); // Refresh halaman jika diperlukan
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error",
                    text: "Error occurred while setting main address.",
                    icon: "error",
                });
            }
        });
    });
  </script>

  @if(session('after_add_address'))
    <script>
      Swal.fire({
        title: "Success",
        text: "Berhasil Menambahkan Alamat Pengiriman Baru",
        icon: "success",
      });
  </script>  
  @endif


<!-- 
@if(session('after_update_address'))
  <script>
    Swal.fire({
      title: "Success",
      text: "Berhasil Mengubah Data Alamat Pengiriman",
      icon: "success",
    });
</script>  
@endif

@if(session('after_delete_address'))
  <script>
    Swal.fire({
      title: "Success",
      text: "Berhasil Menghapus Data Alamat Pengiriman",
      icon: "success",
    });
</script>  
@endif

-->
@if(session('after_update_profile'))
  <script>
    Swal.fire({
      title: "Success",
      text: "Profilmu Berhasil Diubah",
      icon: "success",
    });
</script>  
@endif 

<!-- UNTUK CEK TAB ACCOUNT -->
<script>
  $(document).ready(function() {
    // Saat halaman dimuat, cek session untuk tab yang aktif terakhir
    $.ajax({
      url: "{{ route('get.active.tab') }}",
      type: 'GET',
      success: function(response) {
        if (response.activeTab) {
          // Jika ada, aktifkan tab tersebut
          $('.nav-tabs a[href="' + response.activeTab + '"]').addClass('active').tab('show');
          $(response.activeTab).addClass('active show');
        } else {
          // Jika tidak ada, secara default aktifkan tab pertama (My Profile)
          $('.nav-tabs a:first').addClass('active').tab('show');
          $('#my-profile').addClass('active show');
        }
      }
    });

    // Saat user klik tab, simpan ID tab ke session
    $('.nav-tabs a').on('click', function(e) {
      e.preventDefault();
      var tabId = $(this).attr('href');
      
      // Aktifkan tab yang diklik
      $(this).tab('show');

      // Simpan ke session
      $.ajax({
        url: "{{ route('set.active.tab') }}",
        type: 'POST',
        data: {
          tab_id: tabId,
          _token: '{{ csrf_token() }}'
        }
      });
    });
  });
</script>


@endsection

