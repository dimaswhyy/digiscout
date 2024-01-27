<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Daftar Sekolah | DigiScout</title>

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/backend/img/favicon/logo-1.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/boxicons.css') }}" />



    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />



    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/pages/page-auth.css') }}">
    <!-- Helpers -->
    <script src="{{ asset('assets/backend/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/backend/js/config.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>

    <!-- Content -->

    <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="#" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/backend/img/favicon/logo-1.png') }}" width="60" alt="">
                            </span>
                            <br>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Salam Pramuka ! 👋</h4>
                    <p class="mb-4">Silahkan daftarkan sekolahmu sekarang juga.</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('daftar-sekolah.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="school_name" class="form-label">Nama Sekolah</label>
                            <input type="text" class="form-control" id="school_name" name="school_name"
                                placeholder="Masukkan Nama Sekolahmu" autofocus>
                            @error('school_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="level">Jenjang Sekolah <span style="color: red;">*</span></label>
                            <select name="level" class="form-control" id="level">
                                <option>- Pilih Jenjang -</option>
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA</option>
                                <option>SMK</option>
                            </select>
                            @error('level')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gudep_registration_pa" class="form-label">Nomor Gudep Putra</label>
                            <input type="text" class="form-control" id="gudep_registration_pa" name="gudep_registration_pa"
                                placeholder="Masukkan Nomor Gugus Depan Putra" autofocus>
                            @error('gudep_registration_pa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gudep_registration_pi" class="form-label">Nomor Gudep Putra</label>
                            <input type="text" class="form-control" id="gudep_registration_pi" name="gudep_registration_pi"
                                placeholder="Masukkan Nomor Gugus Depan Putri" autofocus>
                            @error('gudep_registration_pi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Masukkan Alamat Sekolahmu" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Masukkan Nomor Telepon Sekolahmu" autofocus>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Daftar Sekarang</button>
                            <a href="{{ route('home') }}" class="btn btn-light d-grid w-100">Nanti Aja</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/backend/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->



    <!-- Main JS -->
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>

    <!-- Page JS -->



    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>
