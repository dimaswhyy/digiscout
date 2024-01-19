@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Profil Gugus Depan /</span> Ubah</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Profil Gugus Depan</h5>
                <!-- Account -->
                <form class="forms-sample" action="{{ route('profil-gudeps.update', $Gudeps->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../assets/img/avatars/1.png" alt="school-logo" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar" />
                            <img src="../assets/img/avatars/1.png" alt="gudep-logo" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Perbaharui Logo Sekolah</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Perbaharui Logo Gugus Depan</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        {{-- <form id="formAccountSettings" method="POST" onsubmit="return false"> --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nama Sekolah <span style="color: red;">*</span></label>
                                <input name="school_name" class="form-control" id="school_name"
                                    value="{{ old('school_name', $Gudeps->school_name) }}">
                                @error('school_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Jenjang Sekolah <span style="color: red;">*</span></label>
                                <select name="level" class="form-control" id="level">
                                    @if ($Gudeps->level == "NULL")
                                    <option>- Pilih -</option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                    <option>SMK</option>
                                    @elseif ($Gudeps->level == "SD")
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                    <option>SMK</option>
                                    @elseif ($Gudeps->level == "SMP")
                                    <option>SMP</option>
                                    <option>SMA</option>
                                    <option>SMK</option>
                                    <option>SD</option>
                                    @elseif ($Gudeps->level == "SMA")
                                    <option>SMA</option>
                                    <option>SMK</option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    @else
                                    <option>SMK</option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nomor Gugus Depan Putra <span style="color: red;">*</span></label>
                                <input name="gudep_registration_pa" class="form-control" id="gudep_registration_pa"
                                    value="{{ old('gudep_registration_pa', $Gudeps->gudep_registration_pa) }}">
                                @error('gudep_registration_pa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nomor Gugus Depan Putra <span style="color: red;">*</span></label>
                                <input name="gudep_registration_pi" class="form-control" id="gudep_registration_pi"
                                    value="{{ old('gudep_registration_pi', $Gudeps->gudep_registration_pi) }}">
                                @error('gudep_registration_pi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Alamat <span style="color: red;">*</span></label>
                                <input name="address" class="form-control" id="address"
                                    value="{{ old('address', $Gudeps->address) }}">
                                @error('address')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kecamatan <span style="color: red;">*</span></label>
                                <input name="district" class="form-control" id="district"
                                    value="{{ old('district', $Gudeps->district) }}">
                                @error('district')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kab / Kota <span style="color: red;">*</span></label>
                                <input name="city" class="form-control" id="city"
                                    value="{{ old('city', $Gudeps->city) }}">
                                @error('city')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Provinsi <span style="color: red;">*</span></label>
                                <input name="province" class="form-control" id="province"
                                    value="{{ old('province', $Gudeps->province) }}">
                                @error('province')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nomor Telepon</label>
                                <input name="phone_number" class="form-control" id="phone_number"
                                    value="{{ old('phone_number', $Gudeps->phone_number) }}">
                                @error('phone_number')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status Gugus Depan <span style="color: red;">*</span></label>
                                <select name="information" class="form-control" id="information">
                                    @if ($Gudeps->information == 'NULL')
                                        <option>- Pilih -</option>
                                        <option>Aktif</option>
                                        <option>Tidak Aktif</option>
                                    @elseif ($Gudeps->information == 'Aktif')
                                        <option>Aktif</option>
                                        <option>Tidak Aktif</option>
                                    @else
                                        <option>Tidak Aktif</option>
                                        <option>Aktif</option>
                                    @endif
                                </select>
                                @error('information')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary mr-2">Ubah Sekarang !</button>
                            <a href="{{ route('profil-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                        </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
    </div>
@endsection
