@extends('user.layouts.master')

@section('content')

<div class="container-fluid md:px-20 lg:px-24 xl:px-24 h-[40vh] md:h-[50vh] lg:h-[80vh] xl:h-[100vh]  d-flex justify-content-center align-items-center" style="background-image: url('images/bg.png');background-size: cover; background-position: center;">
  
  <div class="p-1 p-md-3 p-lg-4 p-xl-4">
    <div class="mb-2 mb-md-4 mb-lg-6 mb-xl-8">
      <div class="d-flex gap-2">
        <a href="/home" class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
        <p class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">About</a>
      </div>
    </div>  
    
    <div class="grid gap-1 gap-md-3 p-0 col-8 col-md-6">
      <div class="max-w-[120px] md:max-w-[200px] lg:max-w-[480px]">
        <p class="text-[#CE8B50] text-[14px] md:text-[24px] lg:text-[50px] xl:text-[54px] aclonica-regular" style="line-height: 1.1;">Discover Your True Beauty with Glamoire</p>
      </div>

      <div>
        <p class="text-[5px] md:text-[8px] lg:text-[12px] xl:text-[14px]">Explore our wide range of luxurious cosmetics designed to enhance your natural beauty. From bold lipsticks to radiant foundations, each product is crafted to bring out the best version of you.</p>
      </div>
      
      <div class="col">
        <div class="row">
          <div class="col-md-4 col-4 grid p-0">
            <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[18px] xl:text-[24px]">200+</p>
            <p class="text-[5px] md:text-[7px] lg:text-[12px] xl:text-[14px]">International Brand</p>
          </div>
          <div class="col-md-4 col-4 grid p-0">
            <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[18px] xl:text-[24px]">30,000+</p>
            <p class="text-[5px] md:text-[7px] lg:text-[12px] xl:text-[14px]">Happy Customers</p>
          </div>
          <div class="col-md-4 col-12 grid p-0 mt-1 mt-md-0">
            <p class="text-black font-semibold text-[6px] md:text-[12px] lg:text-[18px] xl:text-[24px]">2,000+</p>
            <p class="text-[5px] md:text-[7px] lg:text-[12px] xl:text-[14px]">High-Quality Products</p>
          </div>
        </div>
      </div>

      <div>
        <a href="/shop" class="btn rounded-md w-1/2 w-md-1/4 text-white text-[6px] md:text-[7px] lg:text-[8px] xl:text-[14px]" style="background-color: #183018">Shop Now</a>
      </div>

    </div>
  </div>

</div>

<div class="container-fluid my-2 my-md-4 grid gap-2 gap-md-4 px-8 md:px-24 ">
  <div class="d-flex">
    <div class="col-6 col-md-6 p-0">
      <div class="d-flex justify-content-center align-items-center">
        <img src="images/about_glamoire.png" class="img-fluid" alt="">
      </div>
    </div>

    <div class="col-6 col-md-6 px-md-12 d-flex justify-content-center align-items-center">
      <div class="grid gap-1 gap-md-2">
        <h1 class="font-semibold text-[8px] md:text-[20px] lg:text-[24px] xl:text-[28px]">Glamoire</h1>
        <p class="text-justify text-black text-[5px] md:text-[10px] lg:text-[16px] xl:text-[18px]">E-commerce yang berkomitmen untuk menyediakan produk kosmetik berkualitas tinggi yang berbahan dasar tanaman. 
        Kami percaya bahwa kecantikan tidak harus mengorbankan kesejahteraan lingkungan.</p>
      </div>
    </div>
  </div>

  <div class="d-flex">
    <div class="col-6 col-md-6 px-md-12 d-flex justify-content-center align-items-center">
      <div class="grid gap-1 gap-md-2">
        <h1 class="text-end font-semibold text-[8px] md:text-[20px] lg:text-[24px] xl:text-[28px]">Our Vision</h1>
        <p class="text-end text-black text-[5px] md:text-[10px] lg:text-[16px] xl:text-[18px]">E-commerce yang berkomitmen untuk menyediakan produk kosmetik berkualitas tinggi yang berbahan dasar tanaman. 
        Kami percaya bahwa kecantikan tidak harus mengorbankan kesejahteraan lingkungan.</p>
      </div>
    </div>
  
    <div class="col-6 col-md-6 p-0">
      <div class="d-flex justify-content-center align-items-center">
        <img src="images/visi-misi.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>

  <div class="d-flex">
    <div class="col-6 col-md-6 p-0">
      <div class="d-flex justify-content-center align-items-center">
        <img src="images/about_glamoire.png" class="img-fluid" alt="">
      </div>
    </div>
  
    <div class="col-6 col-md-6 px-md-12 d-flex justify-content-center align-items-center">
      <div class="grid gap-1 gap-md-2">
        <h1 class="font-semibold text-[8px] md:text-[20px] lg:text-[24px] xl:text-[28px]">Glamoire</h1>
        <p class="text-justify text-black text-[5px] md:text-[10px] lg:text-[16px] xl:text-[18px]">E-commerce yang berkomitmen untuk menyediakan produk kosmetik berkualitas tinggi yang berbahan dasar tanaman. 
        Kami percaya bahwa kecantikan tidak harus mengorbankan kesejahteraan lingkungan.</p>
      </div>
    </div>
  </div>
</div>

@endsection