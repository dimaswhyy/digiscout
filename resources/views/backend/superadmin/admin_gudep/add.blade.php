@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Admin Gudep /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Admin Gudep</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin-gudeps.store') }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <input name="role_id" class="form-control" id="role_id" value="2" hidden>

                        <div class="form-group mb-3">
                            <label for="id_gudep">Asal Pangkalan <span style="color: red;">*</span></label>
                            <select name="id_gudep" class="form-control" id="id_gudep">
                                <option>- Pilih Pangkalan -</option>
                                @foreach ($getGudep as $item)
                                <option value="{{$item->id}}">{{$item->school_name}}</option>
                                @endforeach
                            </select>
                            @error('id_gudep')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap <span style="color: red;">*</span></label>
                            <input name="name" class="form-control" id="name" placeholder="Dimas Wwahyu Pratomo">
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
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="dimas@pramuka.id">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label for="password">Password <span style="color: red;">*</span></label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="example-image-container">
                                <img src="{{ asset('assets/backend/img/avatars/user-profile.png') }}" alt="Contoh Gambar"
                                    style="max-height: 200px; margin-right: 10px;">
                            </div>
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
                            <label>Foto Full Bebas Tanpa Background</label>
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

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('admin-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
