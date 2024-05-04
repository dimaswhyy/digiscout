@extends('backend.master')
@section('content')
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
                            <h5 class="card-title text-primary">Yeayy Selamat datang !! Kak {{ auth()->user()->name }} 🎉
                            </h5>
                            <p class="mb-4">
                                Mulai harimu dengan <span class="fw-bold">Semangat Baru !</span>
                                <br>"<span class="fst-italic">Langkah tak ternilai dalam pendidikan karakter adalah
                                    memberikan
                                    tanggung jawab kepada para anggota kepanduan."</span> <span class="fw-bold">~Baden
                                    Powell</span>
                            </p>
                            @if (auth()->user()->role_id == 4)
                                <a href="javascript:;" class="btn btn-sm btn-outline-primary rounded-full">
                                    Mulai Tantangan Baru
                                </a>
                            @else
                            @endif
                            <div class="divider text-start">
                                <div class="divider-text">
                                    <i class="bx bx-sun"></i>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="{{ asset('assets/backend/img/icons/unicons/cc-group.png') }}" lt="Member Card" class="rounded">
                                            </div>
                                        </div>
                                        <span class="d-block">Anggota Keseluruhan</span>
                                        <h4 class="card-title mb-1 text-primary">100</h4>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('pemberitahuans.index') }}" class="btn btn-sm btn-outline-primary rounded-full">
                                Buat Pemberitahuan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
    {{-- Activity Timeline --}}
    <div class="col-lg-12 order-2 order-md-3 mb-4">
        <div class="card">
            <div class="card-header">
                Activity Timeline
            </div>
            <div class="card-body">
                <!-- Timeline -->
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Event Title</h6>
                            <p>Event description goes here.</p>
                            <small class="text-muted">3 days ago</small>
                            <div class="divider text-start">
                                <div class="divider-text">
                                    <i class="bx bx-sun"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Another Event Title</h6>
                            <p>Another event description goes here.</p>
                            <small class="text-muted">5 days ago</small>
                            <div class="divider text-start">
                                <div class="divider-text">
                                    <i class="bx bx-sun"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Yet Another Event Title</h6>
                            <p>Yet another event description goes here.</p>
                            <small class="text-muted">1 week ago</small>
                            <div class="divider text-start">
                                <div class="divider-text">
                                    <i class="bx bx-sun"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Timeline -->
            </div>
        </div>
    </div>
    {{-- End Activity Timeline --}}
    {{-- Tabel Sertifikat Kegiatan --}}
    {{--  --}}
    </div>
@endsection
