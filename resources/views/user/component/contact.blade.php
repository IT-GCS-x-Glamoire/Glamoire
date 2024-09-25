@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 py-2 py-md-3 mb-4">
  <div class="container-fluid">
    <div class="row py-2 py-md-3">
      <div class="col-12">
        <div class="d-flex gap-2">
          <a href="/home" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
          <a href="/cart" class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Contact Us</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7 p-0">
        <form class="grid" id="question-form">
          @csrf
          <div class="col-12 mb-2">
            <div>
                <label for="name" class="form-label text-[#183018] text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Nama Lengkap </label>
                <input type="text" class="form-control rounded-lg text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="fullname" id="contact_fullname" placeholder="Masukkan Nama Lengkap" required>
            
                <label for="email" class="form-label text-[#183018] text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Email </label>
                <input type="email" class="form-control rounded-lg text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="email" id="contact_email" placeholder="contoh@gmail.com" required>
            
                <label for="description" class="form-label text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pertanyaan</label>
                <textarea class="form-control rounded-lg text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" name="question" id="contact_description" rows="3" placeholder="Apa yang ada tanyakan?" required></textarea>

                <button class="mt-2 py-2 w-full rounded-md text-white bg-[#183018] text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" type="submit" id="question-btn">Kirim Pertanyaan</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-5">
        <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
        <p class="text-[12px] md:text-[14px] lg:text-[14px] xl:text-[16px]">
          We'd love to hear from you! Whether you have a question about our products, need assistance with your order, or just want to share your thoughts, we're here to help.
        </p>
        <div class="d-flex flex-column mt-4">
          <p class="mb-2 text-[12px] md:text-[14px] lg:text-[14px] xl:text-[16px]">
            <i class="fa fa-map-marker-alt text-primary mr-3 h-4 w-4"></i>Jl Wijaya Kusuma no. 57, Surabaya
          </p>
          <p class="mb-2 text-[12px] md:text-[14px] lg:text-[14px] xl:text-[16px]">
            <i class="fa fa-envelope text-primary mr-3 h-4 w-4"></i>glamoirevegan.id@gmail.com              
          </p>
          <p class="mb-2 text-[12px] md:text-[14px] lg:text-[14px] xl:text-[16px]">
            <i class="fa fa-phone-alt text-primary mr-3 h-4 w-4"></i>+62 822-7373-6200
          </p>
          <p class="mb-2 text-[12px] md:text-[14px] lg:text-[14px] xl:text-[16px]">
            <i class="fab fa-instagram text-primary mr-3 h-4 w-4"></i>glamoire.idn
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on("submit", "#question-form", function (e) {
    e.preventDefault();

    let fullname = $("#contact_fullname").val();
    let email    = $("#contact_email").val();
    let question = $("#contact_description").val();

    console.log({
      fullname,
      email,
      question,
    });

    $.ajax({
        url: "{{ route('send.question') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            fullname: fullname,
            email: email,
            question: question,
        },
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                }).then(function () {
                    window.refresh(); // Redirect setelah berlangganan sukses
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
</script>
@endsection
