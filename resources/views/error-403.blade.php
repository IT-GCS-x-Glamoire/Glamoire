<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/error.css') }}">
</head>

<body>
    <div id="error">
        <div class="error-page container text-center">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error img-fluid" src="{{ asset('assets/images/samples/error-403.png') }}" alt="403 Forbidden">
                <h1 class="error-title">403 Forbidden</h1>
                <p class="auth-subtitle mb-3">You do not have permission to access this page.</p>

                <a href="{{ session('last_page', url('/')) }}" class="btn btn-sm btn-outline-primary mt-2">Go Back</a>

                {{-- <div class="mt-5 text-lg fs-4">
                    <p class="text-gray-600">If you believe this is an error, please contact the administrator.</p>
                </div> --}}
            </div>
        </div>
    </div>
</body>

</html>
