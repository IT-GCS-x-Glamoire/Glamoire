@extends('user.layouts.master')

@section('content')
<div class="grid md:px-20 lg:px-24 xl:px-24  2xl:px-96 py-2">
  <div class="container-fluid py-2 py-md-3">
    <div class="d-flex gap-2">
      <a href="/home" class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
      <p class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
      <a href="#" class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Bussiness Partner</a>
    </div>
  </div>

  <div class="container-fluid mb-2 mb-md-4">
    <div class="grid col-12 gap-2 mb-4 mb-md-4">
      <h1 class="text-black font-semibold text-[16px] md:text-[24px] lg:text-[32px] xl:text-[40px]">Grow your Business with us. </h1>
      <p class=" text-[9px] md:text-[13px] lg:text-[15px] xl:text-[17px]">Glamoire has become the best incubator of the beauty and personal care industry in Indonesia, therefore, we are ready to help grow your business!</p>
    </div>  
    
    <div class="grid md:flex mx-3 mx-md-32">
      <div class="col-12 col-md-4">
        <div class="position-sticky" style="top: 4rem">
          <div class="grid border p-3 p-lg-4 gap-1 gap-md-3">
            <h1 class="text-black font-semibold text-[12px] md:text-[12px] lg:text-[14px] xl:text-[24px]">Ready to grow your business ?</h1>
            <img src="images/l-1.png" alt="glamoire">
            <p class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[16px]">Please fill out this form, our team will contact you shortly.</p>
          </div>
        </div>
      </div>

      <!-- FORM -->
      <div class="col-12 col-md-8 p-0">
        <form id="business-partner-form" method="POST" action="{{ route('partnership')}}" enctype="multipart/form-data">
          @csrf
          <div class="grid gap-1 gap-md-4">
            <div class="col-12">
              <label for="name" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Fullname</label>
              <input type="text" class="form-control rounded-md text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="partner_fullname" name="partner_fullname" placeholder="Enter your fullname" required>
            </div>
            <div class="col-12">
              <label for="handphone" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Handphone</label>
              <div class="input-group">
                <span class="input-group-text text-red-700 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="basic-addon1">+62</span>
                <input type="number" class="form-control rounded-end text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="partner_handphone" name="partner_handphone" placeholder="Enter your phone number" pattern="[0]{1}[8]{1}[0-9]{9,10}" required>
              </div>
            </div>
            <div class="col-12">
              <label for="email" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Email</label>
              <input type="email" class="form-control rounded-md text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="partner_email" name="partner_email" placeholder="Enter your email" required>
            </div>
            <div class="col-12">
              <label for="company" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Company Name</label>
              <input type="text" class="form-control rounded-md text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="company" name="company" placeholder="Enter your company name" required>
            </div>
            <!-- DESCRIPTION -->
            <div class="col-12">
              <label for="description" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Description</label>
              <textarea class="form-control rounded-lg text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="description" name="description" rows="3" placeholder="Type description here" required></textarea>
            </div>
            <!-- COMPANY PROFILE -->
            <div class="col-12">
              <label for="company_profile" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Company Profile / Catalog Deck</label>
              <input type="file" class="form-control  text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" aria-label="file" name="file_company" required>
              <div class="invalid-feedback text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">PDF Format with 5MB maximum size</div>
            </div>
            <!-- BPOM -->
            <div class="col-12 flex gap-1 gap-md-6">
              <div class="col-6 p-0">
                <label for="Partnership Program" class="form-label text-black  text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">BPOM</label>
              </div>
              <div class="col-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" type="radio" name="bpom" id="bpom_yes" value="yes" required>
                  <label class="form-check-label text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" for="bpom">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" type="radio" name="bpom" id="bpom_no" value="no" required>
                  <label class="form-check-label text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" for="bpom">No</label>
                </div>
              </div>
            </div>
            <!-- BPOM CERTIFICATE -->
            <div class="col-12">
              <label for="formFileSm" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">BPOM Certificate</label>
              <input type="file" class="form-control  text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" aria-label="file" name="file_bpom" required>
              <div class="invalid-feedback text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">PDF Format with 5MB maximum size</div>
            </div>
            <!-- ANY DISTRIBUTOR -->
            <div class="col-12 flex gap-1 gap-md-6">
              <div class="col-6 p-0">
                <label for="Distributor" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Any official  distributor in Indonesia ?</label>
              </div>
              <div class="col-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" type="radio" name="distributor" id="distributor_yes" value="yes" required>
                  <label class="form-check-label text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" for="genderMale">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" type="radio" name="distributor" id="distributor_no" value="no" required>
                  <label class="form-check-label text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" for="genderFemale">No</label>
                </div>
              </div>
            </div>
            <!-- RECEIVE EMAIL -->
            <div class="col-12 flex gap-1 gap-md-6">
              <div class="col-6 p-0">
                <label for="Receive Email" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Have you reached Glamoire via email before ?</label>
              </div>
              <div class="col-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" type="radio" name="receive_email" id="receive_email_yes" value="yes" required>
                  <label class="form-check-label text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" for="genderMale">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" type="radio" name="receive_email" id="receive_email_no" value="no" required>
                  <label class="form-check-label text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]" for="genderFemale">No</label>
                </div>
              </div>
            </div>
            <!-- CATEGORY PRODUCT -->
            <div class="col-12">
              <label for="category_product" class="form-label text-black text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Category Product</label>
              <input type="text" class="form-control rounded-md text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="category_product" name="category_product" placeholder="Write your category product">
            </div>

            <!-- reCAPTCHA -->
            <!-- <div class="col-12">
              <div class="col-6 p-0">
                <div class="recaptcha-container">
                  <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                </div>
              </div>
            </div> -->
            
            <!-- BUTTON SUBMIT -->
            <div class="col-12">
              <button class="btn btn-primary w-full rounded-sm text-white text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" type="submit"  style="background-color: #183018">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- END FORM -->

    </div>
  </div>
</div>

@if(session('send_success'))
  <script>
    Swal.fire({
      title: "Success",
      text: "Horee.. Form Anda Akan Kami Review, Tunggu Email Balasan Dari Kami",
      icon: "success",
    });
</script>  
@endif

@endsection
