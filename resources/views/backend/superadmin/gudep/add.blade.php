@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Gugus Depan /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Gugus Depan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('gudeps.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group mb-3">
                            <label>Logo Sekolah</label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control @error('school_logo') is-invalid @enderror"
                                    name="school_logo">
                                @error('school_logo')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Logo Gugus Depan</label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control @error('gudep_logo') is-invalid @enderror"
                                    name="gudep_logo">
                                @error('gudep_logo')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="school_name">Nama Sekolah <span style="color: red;">*</span></label>
                            <input name="school_name" class="form-control" id="school_name" placeholder="SDIT AL MANAR">
                            @error('school_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
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

                        <div class="form-group mb-3">
                            <label for="gudep_registration_pa">Nomor Gugus Depan Putra <span style="color: red;">*</span></label>
                            <input name="gudep_registration_pa" class="form-control" id="gudep_registration_pa"
                                placeholder="01197">
                            @error('gudep_registration_pa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gudep_registration_pi">Nomor Gugus Depan Putri <span style="color: red;">*</span></label>
                            <input name="gudep_registration_pi" class="form-control" id="gudep_registration_pi"
                                placeholder="01198">
                            @error('gudep_registration_pi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Alamat Sekolah <span style="color: red;">*</span></label>
                            <textarea name="address" class="form-control" id="address" rows="4"></textarea>
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="district">Kwartir Ranting <span style="color: red;">*</span></label>
                            <input name="district" class="form-control" id="district" placeholder="Duren Sawit">
                            @error('district')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="city">Kwartir Cabang <span style="color: red;">*</span></label>
                            <input name="city" class="form-control" id="city" placeholder="Jakarta Timur">
                            @error('city')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="province">Kwartir Daerah <span style="color: red;">*</span></label>
                            <input name="province" class="form-control" id="province" placeholder="DKI Jakarta">
                            @error('province')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone_number">Nomor Telepon <span style="color: red;">*</span></label>
                            <input name="phone_number" class="form-control" id="phone_number" placeholder="0855 XXXX XXXX">
                            @error('phone_number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="information">Keterangan <span style="color: red;">*</span></label>
                            <select name="information" class="form-control" id="information">
                                <option>- Pilih Keterangan -</option>
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                            </select>
                            @error('information')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
