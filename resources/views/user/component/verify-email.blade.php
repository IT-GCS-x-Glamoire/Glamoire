@extends('user.layouts.master')

@section('content')
<div class="container my-24">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Email Anda Terlebih Dahulu</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    {{ __('Silahkan periksa kotak masuk email anda untuk verifikasi akun anda.') }}
                    {{ __('Jika anda tidak mendapatkan email verifikasi ') }},
                    <form class="d-inline" id="verification-send-form">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-[#183018]">{{ __('Kirim Ulang Email Verifikasi ') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).on("submit", "#verification-send-form", function (e) {
    e.preventDefault(); // Mencegah form dari submit secara default

    // Tampilkan loading
    Swal.fire({
      title: "Mengirim Email...",
      text: "Mohon tunggu sebentar.",
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      }
    });

    $.ajax({
      url: "{{ route('verification.send') }}", // Route register di Laravel
      type: "POST",
      data: {
          _token: "{{ csrf_token() }}", // Token CSRF untuk Laravel
      },
      success: function (response) {
          Swal.close(); // Tutup loading

          if (response.success) {
              const Toast = Swal.mixin({
                toast: true,
                position: "center",
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                    Toast.fire({
                    icon: "success",
                    text: response.message,
                    title: "Berhasil"
                });
          } else {
              let errors = response.errors;
              let errorMessages = "Email gagal dikirim. Coba lagi<br>";
              for (const key in errors) {
                  if (errors.hasOwnProperty(key)) {
                      errorMessages += errors[key][0] + "<br>";
                  }
              }
              Swal.fire("Error", errorMessages, "error");
          }
      },
      error: function (response) {
          Swal.close(); // Tutup loading

          Swal.fire("Error", "Kesalahan Sistem", "error");
      },
    });
  });
</script>

@endsection
