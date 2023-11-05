<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">

        <!-- Logo Side Bar -->
        <a href="#" class="app-brand-link">
            <img src="{{ asset('assets/backend/img/favicon/logo-1.png') }}" width="25%" />
            <span class="app-brand-text demo menu-text fw-bolder ms-2"><span class="text-uppercase">D</span>igi<span
                    class="text-uppercase">S</span>cout</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        {{-- Anggota --}}
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Anggota</span>
        </li>
        <li class="menu-item">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">SKU</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">SKK</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Sertifikat</div>
            </a>
        </li> --}}

        <!-- Pembina -->
        {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Pembina</span></li> --}}
        <!-- Cards -->
        {{-- <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Buat Pemberitahuan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Kegiatan Harian</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Uji SKU</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Uji SKK</div>
            </a>
        </li> --}}

        <!-- Gugus Depan -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Gugus Depan</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Profil Gudep</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Data Gudep">Data Gudep</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('golongans.index') }}" class="menu-link">
                        <div data-i18n="Golongan">Golongan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('jabatans.index') }}" class="menu-link">
                        <div data-i18n="Jabatan">Jabatan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Pembina">Pembina</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Mabigus">Mabigus</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Rekap Kegiatan</div>
            </a>
        </li>

        <!-- SuperAdmin -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">SuperAdmin</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="{{ route('gudeps.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Basic">Gugus Depan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Basic">Admin Gudep</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('golongans.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Basic">Golongan</div>
            </a>
        </li>  
        <li class="menu-item">
            <a href="{{ route('tingkatans.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                <div data-i18n="Basic">Tingkatan</div>
            </a>
        </li> 
        <li class="menu-item">
            <a href="{{ route('poinskus.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file"></i>
                <div data-i18n="Basic">Poin SKU</div>
            </a>
        </li>   
        {{-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Basic">SKK</div>
            </a>
        </li>     --}}
    </ul>
</aside>
