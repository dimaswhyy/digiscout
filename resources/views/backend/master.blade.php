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
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>DigiScout</title>

    <meta name="description" content />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/backend/img/favicon/logo-1.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    {{-- DataTables --}}
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    {{-- Text Editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/backend/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/backend/js/config.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Menangkap elemen-elemen yang diperlukan
            var passwordInput = $('#password');
            var toggleButton = $('.form-password-toggle .input-group-text');

            // Menangkap ikon mata di dalam tombol
            var eyeIcon = toggleButton.find('i');

            // Mengganti tipe input dari password ke text dan sebaliknya
            toggleButton.click(function() {
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    eyeIcon.removeClass('bx-hide').addClass('bx-show');
                } else {
                    passwordInput.attr('type', 'password');
                    eyeIcon.removeClass('bx-show').addClass('bx-hide');
                }
            });
        });
    </script>
    <style>
      .card {
        position: relative;
        overflow: hidden; /* Menyembunyikan konten yang melebihi batas card */
         /* Sesuaikan ukuran card sesuai kebutuhan Anda */
         /* Sesuaikan ukuran card sesuai kebutuhan Anda */
      }

      .logo-wosm {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0.2; /* Set opacity to 50% */
        /* Sesuaikan ukuran dan posisi logo sesuai kebutuhan Anda */
        z-index: 1;
        
      }

      .user-image-card {
        /* Gaya untuk gambar pengguna (user) */
        z-index: 2;
      }

      /* .menu-inner {
          overflow-y: auto;
          max-height: 80vh;
      } */

      .rounded-full {
      border-radius: 999px; /* Menggunakan nilai yang besar untuk membuatnya sangat bulat */
      }

      .brand-padding-cust {
      padding-top-cust: 20px;
      }

    </style>

    

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('backend.layouts.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('backend.layouts.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="container-xxl flex-grow-1 container-p-y">
          @yield('content')
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/backend/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/backend/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/backend/js/dashboards-analytics.js') }}"></script>

    {{-- DataTables --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function updateTime() {
            const dateTimeElement = document.getElementById('date-time');
            const now = new Date();

            const daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayOfWeek = daysOfWeek[now.getDay()];

            const day = now.getDate();
            const month = now.getMonth() + 1; // Perhatikan bahwa bulan dimulai dari 0 (Januari) hingga 11 (Desember)
            const year = now.getFullYear();

            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();

            const formattedDate = `${dayOfWeek}, ${day}-${month}-${year}`;
            const formattedTime = `${hours}:${minutes}:${seconds}`;

            dateTimeElement.textContent = `${formattedDate}, ${formattedTime}`;
        }

        // Memperbarui waktu setiap detik (1000 milidetik)
        setInterval(updateTime, 1000);

        // Panggil fungsi updateTime untuk mengatur waktu awal
        updateTime();
    </script>

    <script>
        // Ambil semua item menu yang memiliki class "menu-toggle"
        const menuToggles = document.querySelectorAll('.menu-toggle');

        // Tambahkan event listener untuk setiap item menu
        menuToggles.forEach(function(menuToggle) {
            menuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                // Toggle class "open" pada submenu
                this.parentElement.classList.toggle('open');
            });
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    {{-- Script List Data Table --}}
    <script type="text/javascript">
        $(function() {

            // Super Admin List Index
            // Datatable Gugus Depan
            var table = $('.data-table-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('gudeps.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'school_name',
                        name: 'school_name'
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                    {
                        data: 'gudep_registration_pa',
                        name: 'gudep_registration_pa'
                    },
                    {
                        data: 'gudep_registration_pi',
                        name: 'gudep_registration_pi'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'information',
                        name: 'information',
                        render: function(data, type, row, meta) {
                            if (data == 'Aktif') {
                                console.log(data);
                                return '<span class="badge bg-label-success me-1">Aktif</span>';
                            } else {
                                return '<span class="badge bg-label-warning me-1">Tidak Aktif</span>';
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Golongan
            var table = $('.data-table-golongan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('golongans.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'min_age',
                        name: 'min_age'
                    },
                    {
                        data: 'max_age',
                        name: 'max_age'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Poin SKU
            var table = $('.data-table-poinsku').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('poinskus.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'level_group_name',
                        name: 'level_group_name'
                    },
                    {
                        data: 'sku_number',
                        name: 'sku_number'
                    },
                    {
                        data: 'sku_theme',
                        name: 'sku_theme'
                    },
                    {
                        data: 'sku_desc',
                        name: 'sku_desc'
                    },
                    {
                        data: 'skor',
                        name: 'skor'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Tingkatan
            var table = $('.data-table-tingkatan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tingkatans.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'group_name',
                        name: 'golongans.group_name'
                    },
                    {
                        data: 'level_group_name',
                        name: 'level_group_name'
                    },
                    {
                        data: 'level_badge',
                        name: 'level_badge',
                        render: function(data, type, row) {
                            // Membangun URL gambar berdasarkan nama file
                            var imageUrl = "{{ asset('/storage/app/public/level_badge/') }}" +
                                '/' + data;
                            // Tampilkan badge dalam bentuk gambar
                            return '<img src="' + imageUrl + '" alt="Badge">';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Admin Gudep
            var table = $('.data-table-admin-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin-gudeps.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'nta',
                        name: 'nta'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });


            //Gugus Depan List Index
            // Datatable Jabatan Gudep
            var table = $('.data-table-jabatan-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('jabatans.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'position_name',
                        name: 'position_name'
                    },
                    {
                        data: 'task_desc',
                        name: 'task_desc'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Profil Gugus Depan
            var table = $('.data-table-profil-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('profil-gudeps.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'school_name',
                        name: 'school_name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'information',
                        name: 'information'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Golongan Gudep
            var table = $('.data-table-golongan-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('golongan-gudeps.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'group_name',
                        name: 'golongans.group_name'
                    },
                    {
                        data: 'information',
                        name: 'information'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Pengurus Gudep
            var table = $('.data-table-pengurus-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pengurus-gudeps.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'position_name',
                        name: 'jabatans.position_name'
                    },
                    {
                        data: 'information',
                        name: 'information'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Penguji Gudep
            var table = $('.data-table-penguji-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('penguji-gudeps.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'pengurus_gudeps.name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

            // Datatable Peserta Didik Gudep
            var table = $('.data-table-peserta-didik-gudep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('peserta-didik-gudeps.index') }}",
                    data: function(d) {
                        d.name = $('.searchName').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'information',
                        name: 'information'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".searchName").keyup(function() {
                table.draw();
            });

        });
    </script>
    {{-- End Script List Data Table --}}
    
  </body>
</html>
