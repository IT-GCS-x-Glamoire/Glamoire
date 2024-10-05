<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password || Admin Glamoire</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="container py-8">
        <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="">
                <div class="auth-logo text-center">
                    <h4 class="text-2xl md:text-2xl lg:text-3xl text-[#183018] mb-3">Glamoire</h4>
                </div>
                <h1 class="auth-title text-lg md:text-lg lg:text-xl">Lupa Kata Sandi</h1>
                <p class="auth-subtitle text-lg md:text-lg lg:text-xl mb-3">Masukkan email akun anda, kami akan mengirimkan link ubah kata sandi</p>
                <form action="{{ route('reset.password') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token">
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password baru" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</body>


</html>
