<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password ||  Glamoire</title>
    
    <!-- JQUERY -->
    <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
    <!-- SWEET ALERT -->
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Favicon -->
    <link href="{{ asset('logo.png') }}" rel="icon" type="image/x-icon"/>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- CSS -->
    <link href="css/app.css" rel="stylesheet">
    <!-- TAILWIND -->
    @vite('resources/css/app.css')
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="rounded-md shadow-md border border-[#183018] grid p-4 " style="max-width:80vh;">
            <div class="auth-logo text-center">
                <h4 class="text-xl text-[#183018] mb-3">Glamoire</h4>
            </div>
            <h1 class="auth-title text-sm mb-3">Lupa Kata Sandi</h1>
            <p class="auth-subtitle text-sm mb-3 text-center">Gunakan email anda untuk mengatur ulang kata sandi, kami akan mengirimkan link untuk mengubah kata sandi anda</p>
            <form class="grid gap-1 gap-md-2 mb-3" id="voucher-form">
                @csrf
                <div class="relative flex items-center">
                    <i class="fas fa-envelope text-gray-400 absolute left-3"></i> <!-- Ikon Email -->
                    <input type="email" class="form-control pl-10 pr-10 rounded-md text-sm" id="forgot_password_email" placeholder="Masukkan email" required>
                    <div class="spinner-border text-[#183018] absolute right-3" role="status" style="width:15px; height:15px;display:none;"> <!-- Spinner -->
                        <span class="visually-hidden"></span>
                    </div>
                </div>

                <div id="validationEmailForgot" class="text-xs" style="display: none;">
                </div>
                <button class="py-2 w-full rounded-md text-white bg-[#183018] text-sm" type="submit" id="forgot-btn" disabled>Dapatkan Link</button>
            </form>
            <div class="text-center text-lg fs-4">
                <p class="text-gray-600 text-sm">Sudah Ingat Akunmu? 
                    <a href="/home" class="text-black">Masuk</a>.
                </p>
            </div>
        </div>
    </div>
</body>

<!-- CHECK EMAIL & HANDPHONE REGISTER -->
<script>
    $('#forgot_password_email').on('keyup', function () {
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
                        $('#validationEmailForgot').text('Email Anda Terdaftar').addClass('text-red-950').show();
                        $('#forgot-btn').prop('disabled', false);
                    } else {
                        $('#validationEmailForgot').text('Oops, Email Anda Belum Terdaftar').addClass('text-red-950').show();
                        $('#forgot-btn').prop('disabled', true);
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

</html>


