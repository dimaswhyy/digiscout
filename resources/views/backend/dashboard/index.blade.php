@extends('backend.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Card -->
            <div class="col-lg-4 mb-4 order-0">
                <!-- Move the user image card here -->
                <div class="card ">
                    <!-- Logo Wosm Opacity -->
                    <img src="{{ asset('assets/backend/img/illustrations/wosm.png') }}" class="logo-wosm" alt="WOSM Logo" />
                    <!-- Tambahkan gambar pengguna -->
                    <img src="{{ asset('assets/backend/img/avatars/User.png') }}" class="user-image-card" alt="User" />
                </div>
            </div>
            <div class="col-lg-8 order-2 order-md-3 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Yeayy Selamat datang !! Kak Dimas 🎉</h5>
                                <p class="mb-4">
                                    Mulai harimu dengan <span class="fw-bold">Semangat Baru !</span>
                                    <br>"<span class="fst-italic">Langkah tak ternilai dalam pendidikan karakter adalah memberikan
                                    tanggung jawab kepada para anggota kepanduan."</span> <span class="fw-bold">~Baden Powell</span>
                                </p>
                                <a href="javascript:;" class="btn btn-sm btn-outline-primary rounded-full">Mulai Tantangan Baru</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/backend/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
            {{-- Tabel Sertifikat Kegiatan --}}
            {{--  --}}
        </div>
    </div>
@endsection
