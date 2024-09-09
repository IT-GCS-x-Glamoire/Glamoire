<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/summernote/summernote-lite.min.css">


    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.navbar')

        <div id="main">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <h3>Edit Article</h3>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
                            <nav aria-label="breadcrumb" class="breadcrumb-header" style="margin-bottom: 20px;">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="/article-admin">Article</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h4 style="color: black">Tips Kecantikan</h4>
                                                        <p class="card-price" style="font-size: 1rem; font-weight: bolder; color: black; ">
                                                            Category Article
                                                        </p>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">                                                        
                                                            <div class="card">
                                                                <img src="{{ asset('images/carousel-2.jpg') }}"
                                                                    alt="Carousel Image" class="img-fluid"
                                                                    style="height: auto; margin-top: 20px;">
                                                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Nulla minus illum vero laboriosam delectus
                                                                    inventore veniam molestiae similique! Quibusdam ex
                                                                    consequatur sint dolorem quo quod maxime non ipsa
                                                                    cumque, laborum eaque. Nihil laudantium numquam
                                                                    culpa quia soluta ab ipsam nam! Aut deleniti
                                                                    dignissimos itaque quidem dolor facere inventore
                                                                    nihil assumenda sunt illum quibusdam, magnam eos
                                                                    similique, tempora adipisci rerum architecto iusto,
                                                                    voluptas aperiam recusandae totam distinctio
                                                                    consequuntur dolorum! Aliquam nihil earum error
                                                                    minus voluptates molestias, veritatis ipsam numquam!
                                                                    Quae laudantium unde sit illo earum adipisci ducimus
                                                                    culpa perferendis eum nobis reprehenderit autem
                                                                    deserunt vitae reiciendis, saepe quisquam, quam
                                                                    suscipit eos. Alias velit quos quis voluptate cumque
                                                                    blanditiis earum architecto atque quasi assumenda
                                                                    tenetur quia consequatur beatae perferendis ullam
                                                                    eligendi laudantium, necessitatibus vitae illo
                                                                    veniam in minima enim! Non provident ad animi quidem
                                                                    voluptatum numquam natus explicabo iure, ratione,
                                                                    modi aliquid? Cum repudiandae expedita tempora
                                                                    laborum unde dolorum eum rem! Corrupti?</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-sm btn-primary me-1 mb-1"
                                                            style="border-radius: 8px;"><i class="bi bi-upload" style="margin-right: 3px;"></i>Publish Article</button>
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/vendors/choices.js/choices.min.js"></script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>

    <!-- summernote -->
    <script src="assets/vendors/summernote/summernote-lite.min.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>


    
</body>

</html>
