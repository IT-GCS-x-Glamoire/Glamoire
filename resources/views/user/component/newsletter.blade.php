@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 py-2">
  <div class="container-fluid"> 
    <div class="py-2 py-md-3">
      <div class="d-flex gap-2">
        <a href="/" class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
        <p class="text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-black text-[9px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Newsletter</a>
      </div>
    </div>  
  </div>

  <div class="container-fluid p-0">
    <div class="col">
      <nav class="tabbable">
        <div class="nav nav-tabs mb-2 mb-md-4" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#all">All</a>
          <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#newest">Newest</a>
          <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#beauty">Beauty</a>
          <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#skincare">Skincare</a>
          <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#dailyroutine">Daily Tips</a>
          <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#dailyroutine">Daily Tips</a>
        </div>
      </nav>

      <div class="tab-content p-1 md:p-4 lg:md-4 xl:md-4 m-0">
        <div class="tab-pane fade show active overflow-hidden" id="all">
          <div class="container-fluid">
            <div class="row">
              <!-- Card Items -->
              @for ($i=1; $i <= 7; $i++)
                <div class="col-md-3 p-1 p-md-2 col-6">
                  <a href="/blog">
                    <div class="bg-white rounded-lg shadow-sm overflow-hiddenproduct-item mb-2 md:mb-4 lg:mb-4 xl:mb-4 border-xl">
                      <div class="position-relative overflow-hidden bg-transparent p-0">
                        <img class="img-fluid w-full rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                      </div>
                      <div class="text-left p-2 md:p-2 lg:p-2 xl:p-2 md:pt-4 lg:pt-4 md:pb-3 lg:pb-3">
                        <p class="text-[6px] md:text-[12px] lg:text-[12px] xl:text-[14px]">CATEGORY | 29 Agustus 2024</p>
                        <h1 class="text-black font-bold text-[8px] md:text-[14px] lg:text-[16px] xl:text-[18px] py-2 md:py-3 lg:py-3 xl:py-3">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                        <p class="text-[6px] md:text-[10px] lg:text-[12px] xl:text-[12px]">by <a class="font-bold">Admin Glamoire</a></p>
                      </div>
                    </div>
                  </a>
                </div>
              @endfor
              <!-- End Card Items -->
            </div>
          </div>
        </div>

        <div class="tab-pane fade overflow-hidden" id="newest">
          <div class="row">
            <!-- Card Items -->
            <div class="col-lg-4 col-md-4 p-1 p-md-2 col-6">
              <div class="bg-white rounded-lg shadow-sm overflow-hiddenproduct-item mb-2 md:mb-4 lg:mb-4 xl:mb-4 border-xl">
                <div class="position-relative overflow-hidden bg-transparent p-0">
                    <img class="img-fluid w-full rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                </div>
                <div class="text-left p-2 md:p-2 lg:p-2 xl:p-2 md:pt-4 lg:pt-4 md:pb-3 lg:pb-3">
                  <p class="text-[6px] md:text-[12px] lg:text-[12px] xl:text-[14px]">CATEGORY | 29 Agustus 2024</p>
                  <h1 class="text-black font-bold text-[8px] md:text-[14px] lg:text-[16px] xl:text-[18px] py-2 md:py-3 lg:py-3 xl:py-3">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                  <p class="text-[6px] md:text-[10px] lg:text-[12px] xl:text-[12px]">by <a class="font-bold">Admin Glamoire</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 p-1 p-md-2 col-6">
              <div class="bg-white rounded-lg shadow-sm overflow-hiddenproduct-item md:mb-4 lg:mb-4 xl:mb-4 border-xl">
                <div class="position-relative overflow-hidden bg-transparent p-0">
                    <img class="img-fluid w-full rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                </div>
                <div class="text-left p-2 md:p-2 lg:p-2 xl:p-2 md:pt-4 lg:pt-4 md:pb-3 lg:pb-3">
                  <p class="text-[6px] md:text-[12px] lg:text-[12px] xl:text-[14px]">CATEGORY | 29 Agustus 2024</p>
                  <h1 class="text-black font-bold text-[8px] md:text-[14px] lg:text-[16px] xl:text-[18px] py-2 md:py-3 lg:py-3 xl:py-3">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                  <p class="text-[6px] md:text-[10px] lg:text-[12px] xl:text-[12px]">by <a class="font-bold">Admin Glamoire</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 p-1 p-md-2 col-6">
              <div class="bg-white rounded-lg shadow-sm overflow-hiddenproduct-item md:mb-4 lg:mb-4 xl:mb-4 border-xl">
                <div class="position-relative overflow-hidden bg-transparent p-0">
                    <img class="img-fluid w-full rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                </div>
                <div class="text-left p-2 md:p-2 lg:p-2 xl:p-2 md:pt-4 lg:pt-4 md:pb-3 lg:pb-3">
                  <p class="text-[6px] md:text-[12px] lg:text-[12px] xl:text-[14px]">CATEGORY | 29 Agustus 2024</p>
                  <h1 class="text-black font-bold text-[8px] md:text-[14px] lg:text-[16px] xl:text-[18px] py-2 md:py-3 lg:py-3 xl:py-3">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                  <p class="text-[6px] md:text-[10px] lg:text-[12px] xl:text-[12px]">by <a class="font-bold">Admin Glamoire</a></p>
                </div>
              </div>
            </div>
            <!-- End Card Items -->
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- SUBSCRIBE NEWSLETTER -->
  <div class="container-fluid my-8">
    <div class="d-flex gap-2">
      <div class="py-3 grid md:flex col-12 align-items-center justify-content-center rounded-md" style="background-color: #475136">
        <div class="col-12 col-md-8 mb-2 mb-md-0">
          <p class="text-white text-[14px] md:text-[10px] lg:text-[14px] xl:text-[24px] aclonica-regular">Ikuti Tren Seputar Kecantikan dengan Berlangganan Artikel Kami</p>
        </div>  
        <div class="col-12 col-md-4">
          <form class="grid gap-1 gap-md-2 m-0" id="subscribe-form">
            @csrf
            <input type="email" class="form-control rounded-md text-[10px] md:text-[12px] lg:text-[14px] xl:text-[14px]" id="subscribe_email" placeholder="Masukkan Email" required>
            <button class="hover:text-white py-2 hover:bg-neutral-900 font-italic w-full rounded-md text-white bg-[#183018] text-[10px] md:text-[12px] lg:text-[14px] xl:text-[14px]" type="submit">Subscribe Artikel</button>
          </form>
        </div>
      </div>  
    </div>
  </div>
</div>

@endsection
