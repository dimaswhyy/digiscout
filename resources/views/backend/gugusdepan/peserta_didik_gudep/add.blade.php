@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Data Gudep / Peserta Didik Gugus Depan /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Peserta Didik Gugus Depan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('peserta-didik-gudeps.store') }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <input name="gudep_id" class="form-control" id="gudep_id" value="{{ auth()->user()->id_gudep }}" hidden>
                        <input name="admin_gudep_id" class="form-control" id="admin_gudep_id" value="{{ auth()->user()->id }}" hidden>
                        <input name="role_id" class="form-control" id="role_id" value="4" hidden>

                        <div class="form-group mb-3">
                            <label for="name">Nama Siswa <span style="color: red;">*</span></label>
                            <input type="type" name="name" class="form-control" id="name"
                                placeholder="Dimas Wahyu Pratomo">
                            @error('name')
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

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('peserta-didik-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
