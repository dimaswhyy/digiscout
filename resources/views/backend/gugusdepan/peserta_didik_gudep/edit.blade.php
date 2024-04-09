@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Data Gudep / Penguji /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Penguji Gugus Depan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('peserta-didik-gudeps.update', $pesertadidikgudeps->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <input name="gudep_id" class="form-control" id="gudep_id" value="{{ auth()->user()->gudep_id }}" hidden>
                        <input name="admin_gudep_id" class="form-control" id="admin_gudep_id" value="{{ auth()->user()->id }}" hidden>
                        <input name="role_id" class="form-control" id="role_id" value="4" hidden>

                        <div class="form-group mb-3">
                            <label for="name">Nama Siswa <span style="color: red;">*</span></label>
                            <input type="name" name="name" class="form-control" id="name"
                            value="{{ old('name', $pesertadidikgudeps->name) }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin <span style="color: red;">*</span></label>
                            <select name="gender" class="form-control" id="gender">
                                @if ($pesertadidikgudeps->gender == "NULL")
                                <option>- Pilih -</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                                @elseif ($pesertadidikgudeps->gender == "Laki-laki")
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                                @else
                                <option>Perempuan</option>
                                <option>Laki-laki</option>
                                @endif
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
                                @if ($pesertadidikgudeps->information == "NULL")
                                <option>- Pilih -</option>
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                                @elseif ($pesertadidikgudeps->information == "Aktif")
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

                        <div class="form-group mb-3">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email', $pesertadidikgudeps->email) }}">
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
                                value="{{ old('password', $pesertadidikgudeps->password) }}"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> 
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Perbaharui !</button>
                        <a href="{{ route('peserta-didik-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
