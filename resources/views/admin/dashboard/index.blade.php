<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard || Admin Glamoire</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard</h3>
                <nav aria-label="breadcrumb" class="breadcrumb-header me-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">New Order</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Out Of Stock</h6>
                                                <h6 class="font-extrabold mb-0">183</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Available Stock</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">canceled by the buyer.</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Sales Information</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Input untuk memilih range tanggal -->
                                                <input type="text" id="filter-date-range" class="form-control"
                                                    placeholder="Select Date Range">
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Filter untuk memilih Brand -->
                                                <select id="filter-brand" class="form-select select2">
                                                    <option value="">Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-sales-information"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>Sales Ranking</h4>
                                            <p>best-selling product across all brands</p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <!-- Input untuk memilih range tanggal -->
                                                <input type="text" id="filter-date-range" class="form-control"
                                                    placeholder="Select Date Range">
                                            </div>
                                            <div>
                                                <div class="me-4">
                                                    <!-- Filter untuk memilih Brand -->
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary">Export</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Product</th>
                                                    <th>quantity of items sold</th>
                                                    <th>quantity available</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ Storage::url($product->main_image) }}"
                                                                loading="lazy" class="lazyload" alt="Product Image"
                                                                style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover;">
                                                            {{ $product->product_name }}
                                                        </td>
                                                        <td>{{ $product->stock_quantity }}</td>
                                                        <td>{{ $product->stock_quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-primary" width="32" height="32"
                                                        fill="blue" style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Europe</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">862</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-europe"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-success" width="32" height="32"
                                                        fill="blue" style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">America</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">375</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-america"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-danger" width="32" height="32"
                                                        fill="blue" style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">1025</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-indonesia"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Latest Comments</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/5.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Congratulations on your graduation!</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/2.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Wow amazing design! Can you make another
                                                                tutorial for
                                                                this design?</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">                       
                        <div class="card">
                            <div class="card-header">
                                <h4>Recent Messages</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                        Conversation</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Visitors Profile</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                       
                    </div>
                </section>
            </div>

            @include('admin.layouts.footer')

        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script src="assets/js/main.js"></script>
    {{-- script awal untuk sales information --}}
    {{-- <script>
        // Inisialisasi chart menggunakan ApexCharts
        let salesChart;

        // Function untuk memuat data berdasarkan tanggal dan tipe data
        function loadSalesData(startDate, endDate, type) {
            // Kamu bisa ganti ini dengan data yang kamu dapatkan dari backend
            let allData = {
                sales: [40, 55, 60, 70, 80, 90, 100],
                returns: [10, 15, 20, 25, 30, 35, 40]
            };

            let categories = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            let filteredData = [];

            // Filter data sesuai tipe
            if (type === 'sales') {
                filteredData = allData.sales;
            } else if (type === 'returns') {
                filteredData = allData.returns;
            } else {
                filteredData = allData.sales.map((value, index) => value + allData.returns[index]);
            }

            // Update atau render chart
            if (salesChart) {
                salesChart.updateOptions({
                    series: [{
                        name: 'Amount',
                        data: filteredData
                    }],
                    xaxis: {
                        categories: categories
                    }
                });
            } else {
                var options = {
                    chart: {
                        type: 'line',
                        height: 350
                    },
                    series: [{
                        name: 'Amount',
                        data: filteredData
                    }],
                    xaxis: {
                        categories: categories
                    }
                };

                salesChart = new ApexCharts(document.querySelector("#chart-sales-information"), options);
                salesChart.render();
            }
        }

        // Inisialisasi Date Range Picker
        $(function() {
            $('#filter-date-range').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                let type = $('#filter-type').val();
                loadSalesData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), type);
            });
        });

        // Event listener untuk tipe data
        document.getElementById('filter-type').addEventListener('change', function() {
            let dates = $('#filter-date-range').data('daterangepicker');
            let startDate = dates.startDate.format('YYYY-MM-DD');
            let endDate = dates.endDate.format('YYYY-MM-DD');
            let type = this.value;

            loadSalesData(startDate, endDate, type);
        });

        // Load initial chart data
        let initialStart = moment().subtract(6, 'days').format('YYYY-MM-DD');
        let initialEnd = moment().format('YYYY-MM-DD');
        loadSalesData(initialStart, initialEnd, 'all');
    </script> --}}

    <script>
        // inisialisasi select2
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select Brand', // Placeholder untuk select
                allowClear: true // Mengizinkan opsi untuk dibersihkan
            });
        });
        // Inisialisasi chart menggunakan ApexCharts
        let salesChart;

        // Function untuk memuat data berdasarkan tanggal dan tipe data
        function loadSalesData(startDate, endDate, brandId) {
            // Ganti dengan AJAX call ke controller jika diperlukan
            let allData = {
                sales: [40, 55, 60, 70, 80, 90, 100],
                returns: [10, 15, 20, 25, 30, 35, 40]
            };

            let categories = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            let filteredData = allData.sales; // Gunakan data sales secara langsung

            // Render chart
            if (salesChart) {
                salesChart.updateOptions({
                    series: [{
                        name: 'Amount',
                        data: filteredData
                    }],
                    xaxis: {
                        categories: categories
                    }
                });
            } else {
                var options = {
                    chart: {
                        type: 'line',
                        height: 350
                    },
                    series: [{
                        name: 'Amount',
                        data: filteredData
                    }],
                    xaxis: {
                        categories: categories
                    }
                };

                salesChart = new ApexCharts(document.querySelector("#chart-sales-information"), options);
                salesChart.render();
            }
        }

        // Inisialisasi Date Range Picker
        $(function() {
            $('#filter-date-range').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end) {
                let brandId = $('#filter-brand').val(); // Ambil brandId
                loadSalesData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), brandId);
            });
        });

        // Event listener untuk filter brand
        document.getElementById('filter-brand').addEventListener('change', function() {
            let dates = $('#filter-date-range').data('daterangepicker');
            let startDate = dates.startDate.format('YYYY-MM-DD');
            let endDate = dates.endDate.format('YYYY-MM-DD');
            let brandId = this.value;

            loadSalesData(startDate, endDate, brandId);
        });

        // Load initial chart data
        let initialStart = moment().subtract(6, 'days').format('YYYY-MM-DD');
        let initialEnd = moment().format('YYYY-MM-DD');
        loadSalesData(initialStart, initialEnd, ''); // Muat data awal
    </script>

    {{-- <script>
        // Inisialisasi chart menggunakan ApexCharts
        let salesChart;

        // Function untuk memuat data berdasarkan tanggal dan tipe data
        function loadSalesData(startDate, endDate, type) {
            // Kamu bisa ganti ini dengan data yang kamu dapatkan dari backend
            let allData = {
                sales: [40, 55, 60, 70, 80, 90, 100],
                returns: [10, 15, 20, 25, 30, 35, 40]
            };

            let categories = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            let filteredData = [];

            // Filter data sesuai tipe
            if (type === 'sales') {
                filteredData = allData.sales;
            } else if (type === 'returns') {
                filteredData = allData.returns;
            } else {
                filteredData = allData.sales.map((value, index) => value + allData.returns[index]);
            }

            // Update atau render chart
            if (salesChart) {
                salesChart.updateOptions({
                    series: [{
                        name: 'Amount',
                        data: filteredData
                    }],
                    xaxis: {
                        categories: categories
                    }
                });
            } else {
                var options = {
                    chart: {
                        type: 'line',
                        height: 350
                    },
                    series: [{
                        name: 'Amount',
                        data: filteredData
                    }],
                    xaxis: {
                        categories: categories
                    }
                };

                salesChart = new ApexCharts(document.querySelector("#chart-sales-information"), options);
                salesChart.render();
            }
        }

        // Inisialisasi Date Range Picker
        $(function() {
            $('#filter-date-range').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                let type = $('#filter-type').val();
                loadSalesData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), type);
            });
        });

        // Event listener untuk tipe data
        document.getElementById('filter-type').addEventListener('change', function() {
            let dates = $('#filter-date-range').data('daterangepicker');
            let startDate = dates.startDate.format('YYYY-MM-DD');
            let endDate = dates.endDate.format('YYYY-MM-DD');
            let type = this.value;

            loadSalesData(startDate, endDate, type);
        });

        // Load initial chart data
        let initialStart = moment().subtract(6, 'days').format('YYYY-MM-DD');
        let initialEnd = moment().format('YYYY-MM-DD');
        loadSalesData(initialStart, initialEnd, 'all');



        // Function untuk memuat data berdasarkan brand
        function loadSalesDataByBrand(brandId) {
            $.ajax({
                url: '/dashboard/get-sales-data', // Ganti dengan route yang sesuai
                method: 'GET',
                data: {
                    brand_id: brandId
                },
                success: function(response) {
                    let categories = response.categories; // Kategori untuk x-axis (misal: tanggal)
                    let data = response.data; // Data yang sesuai dengan brand

                    // Update chart atau render chart baru
                    if (salesChart) {
                        salesChart.updateOptions({
                            series: [{
                                name: 'Sales Amount',
                                data: data
                            }],
                            xaxis: {
                                categories: categories
                            }
                        });
                    } else {
                        var options = {
                            chart: {
                                type: 'line',
                                height: 350
                            },
                            series: [{
                                name: 'Sales Amount',
                                data: data
                            }],
                            xaxis: {
                                categories: categories
                            }
                        };

                        salesChart = new ApexCharts(document.querySelector("#chart-sales-information"),
                            options);
                        salesChart.render();
                    }
                }
            });
        }

        // Event listener untuk filter brand
        document.getElementById('filter-brand').addEventListener('change', function() {
            let brandId = this.value;
            loadSalesDataByBrand(brandId);
        });
    </script> --}}

    {{-- <script>
        // Inisialisasi chart menggunakan ApexCharts
        let salesChart;

        // Function untuk memuat data berdasarkan tanggal, brand, dan tipe data
        function loadSalesData(startDate, endDate, brandId, type) {
            $.ajax({
                url: '/dashboard/get-sales-data', // Ganti dengan route yang sesuai
                method: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                    brand_id: brandId,
                    type: type // Bisa sales atau returns
                },
                success: function(response) {
                    let categories = response.categories; // Kategori untuk x-axis (misal: tanggal)
                    let data = response.data; // Data yang sesuai dengan filter

                    // Update chart atau render chart baru
                    if (salesChart) {
                        salesChart.updateOptions({
                            series: [{
                                name: 'Sales Amount',
                                data: data
                            }],
                            xaxis: {
                                categories: categories
                            }
                        });
                    } else {
                        var options = {
                            chart: {
                                type: 'line',
                                height: 350
                            },
                            series: [{
                                name: 'Sales Amount',
                                data: data
                            }],
                            xaxis: {
                                categories: categories
                            }
                        };

                        salesChart = new ApexCharts(document.querySelector("#chart-sales-information"),
                        options);
                        salesChart.render();
                    }
                }
            });
        }

        // Inisialisasi Date Range Picker
        $(function() {
            $('#filter-date-range').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                let brandId = $('#filter-brand').val(); // Dapatkan brand yang dipilih
                let type = $('#filter-type').val(); // Dapatkan tipe data (sales/returns)
                loadSalesData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), brandId, type);
            });
        });

        // Event listener untuk filter brand
        document.getElementById('filter-brand').addEventListener('change', function() {
            let dates = $('#filter-date-range').data('daterangepicker');
            let startDate = dates.startDate.format('YYYY-MM-DD');
            let endDate = dates.endDate.format('YYYY-MM-DD');
            let brandId = this.value; // Brand yang dipilih
            let type = $('#filter-type').val(); // Tipe data (sales/returns)

            loadSalesData(startDate, endDate, brandId, type);
        });

        // Event listener untuk tipe data
        document.getElementById('filter-type').addEventListener('change', function() {
            let dates = $('#filter-date-range').data('daterangepicker');
            let startDate = dates.startDate.format('YYYY-MM-DD');
            let endDate = dates.endDate.format('YYYY-MM-DD');
            let brandId = $('#filter-brand').val(); // Brand yang dipilih
            let type = this.value; // Tipe data (sales/returns)

            loadSalesData(startDate, endDate, brandId, type);
        });

        // Load initial chart data (7 hari terakhir dan semua brand secara otomatis)
        let initialStart = moment().subtract(6, 'days').format('YYYY-MM-DD');
        let initialEnd = moment().format('YYYY-MM-DD');
        loadSalesData(initialStart, initialEnd, '', 'all');
    </script> --}}


    {{-- setup backend --}}
    {{-- <script>
        function loadSalesData(startDate, endDate, type) {
            $.ajax({
                url: '/get-sales-data',
                method: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                    type: type
                },
                success: function(response) {
                    let categories = response.categories; // Label untuk x-axis (misal: tanggal)
                    let filteredData = response.data; // Data yang ditampilkan (sales, returns, atau keduanya)

                    salesChart.updateOptions({
                        series: [{
                            name: 'Amount',
                            data: filteredData
                        }],
                        xaxis: {
                            categories: categories
                        }
                    });
                }
            });
        }
    </script> --}}
</body>

</html>
