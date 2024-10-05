@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 py-2 py-md-3 mb-4">
  <div class="container-fluid">
    <div class="shadow-sm border border-black rounded-md py-2 py-md-3 my-1 my-md-3">
      <div class="d-flex gap-2 pl-2">
        <a href="/" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Beranda</a>
        <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-decoration-none text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Kontak Kami</a>
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

                <button class="mt-2 py-2 w-full rounded-md text-white bg-[#183018] text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]" type="submit" id="question-btn">Kirim Pertanyaan Kamu</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-5">
        <h5 class="font-weight-semi-bold mb-3">Hubungi Kami</h5>
        <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-justify">
          Kami ingin mendengar dari Anda! Apakah Anda memiliki pertanyaan tentang produk kami, memerlukan bantuan dengan pesanan Anda, atau hanya ingin membagikan pemikiran Anda, kami siap membantu.
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
                  window.refresh(); // Redirect ke halaman utama atau halaman lain
                });
            } else {
              let errors = response.errors;
              let errorMessages = response.message;
              for (const key in errors) {
                  if (errors.hasOwnProperty(key)) {
                      errorMessages += errors[key][0] + "<br>";
                  }
              }
              Toast.fire({
                icon: "error",
                text: errorMessahes,
                title: "Oops..",
                willOpen: () => {
                  const title = document.querySelector('.swal2-title');
                  const content = document.querySelector('.swal2-html-container');
                  if (title) title.style.color = '#ffffff'; // Ubah warna judul
                  if (content) content.style.color = '#ffffff'; // Ubah warna konten
                }
              });
            }
        },
        error: function (response) {
          Toast.fire({
            icon: "error",
            text: "Maaf Coba Lagi",
            title: "Oops..",
            willOpen: () => {
              const title = document.querySelector('.swal2-title');
              const content = document.querySelector('.swal2-html-container');
              if (title) title.style.color = '#ffffff'; // Ubah warna judul
              if (content) content.style.color = '#ffffff'; // Ubah warna konten
            }
          });
        },
    });
  });
</script>
@endsection
