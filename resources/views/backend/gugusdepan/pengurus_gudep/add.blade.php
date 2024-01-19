@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Data Gudep / Pengurus Gugus Depan /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah pengurus Gugus Depan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('pengurus-gudeps.store') }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <input name="gudep_id" class="form-control" id="gudep_id" value="{{ auth()->user()->id_gudep }}" hidden>
                        <input name="admin_gudep_id" class="form-control" id="admin_gudep_id" value="{{ auth()->user()->id }}" hidden>

                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap <span style="color: red;">*</span></label>
                            <input name="name" class="form-control" id="name" placeholder="Dimas Wahyu Pratomo">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="nta">Nomor Tanda Anggota </label>
                            <input name="nta" class="form-control" id="nta" placeholder="09.21.01.197.000.10">
                            @error('nta')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin <span style="color: red;">*</span></label>
                            <select name="gender" class="form-control" id="gender">
                                <option>- Pilih Jenis Kelamin -</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone_number">Nomor Telepon <span style="color: red;">*</span></label>
                            <input name="phone_number" class="form-control" id="phone_number" placeholder="62821xxxxxxxx">
                            @error('phone_number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Alamat <span style="color: red;">*</span></label>
                            <input name="address" class="form-control" id="address" placeholder="Jl. ...">
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="example-image-container">
                                <img src="{{ asset('assets/backend/img/avatars/user-profile.png') }}" alt="Contoh Gambar"
                                    style="max-height: 200px; margin-right: 10px;">
                            </div>
                            <label for="photo_profile">Foto Profil <span style="color: red;">*</span></label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control @error('photo_profile') is-invalid @enderror"
                                    name="photo_profile">
                                @error('photo_profile')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="example-image-container">
                                <img src="{{ asset('assets/backend/img/avatars/User.png') }}" alt="Contoh Gambar"
                                    style="max-height: 200px; margin-right: 10px;">
                            </div>
                            <label for="photo_full">Foto Full Bebas Tanpa Background <span style="color: red;">*</span></label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control @error('photo_full') is-invalid @enderror"
                                    name="photo_full">
                                @error('photo_full')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="position_id">Jabatan <span style="color: red;">*</span></label>
                            <select name="position_id" class="form-control" id="position_id">
                                <option>- Pilih Jabatan -</option>
                                @foreach ($getPosition as $item)
                                <option value="{{$item->id}}">{{$item->position_name}}</option>
                                @endforeach
                            </select>   
                            @error('position_id')
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
                        <a href="{{ route('golongan-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
