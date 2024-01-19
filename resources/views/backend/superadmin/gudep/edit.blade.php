@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Gugus Depan /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Gugus Depan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('gudeps.update', $gudeps->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

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
                            <input name="school_name" class="form-control" id="school_name" value="{{ old('school_name', $gudeps->school_name) }}">
                            @error('school_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="level">Jenjang Sekolah</label>
                            <select name="level" class="form-control" id="level">
                                @if ($gudeps->level == "NULL")
                                <option>- Pilih -</option>
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA</option>
                                <option>SMK</option>
                                @elseif ($gudeps->level == "SD")
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA</option>
                                <option>SMK</option>
                                @elseif ($gudeps->level == "SMP")
                                <option>SMP</option>
                                <option>SMA</option>
                                <option>SMK</option>
                                <option>SD</option>
                                @elseif ($gudeps->level == "SMA")
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
                            @error('level')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gudep_registration_pa">Nomor Gugus Depan Putra <span style="color: red;">*</span></label>
                            <input name="gudep_registration_pa" class="form-control" id="gudep_registration_pa"
                            value="{{ old('gudep_registration_pa', $gudeps->gudep_registration_pa) }}">
                            @error('gudep_registration_pa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gudep_registration_pi">Nomor Gugus Depan Putri <span style="color: red;">*</span></label>
                            <input name="gudep_registration_pi" class="form-control" id="gudep_registration_pi"
                            value="{{ old('gudep_registration_pi', $gudeps->gudep_registration_pi) }}">
                            @error('gudep_registration_pi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Alamat Sekolah <span style="color: red;">*</span></label>
                            <textarea name="address" class="form-control" id="address" rows="4">{{ old('address', $gudeps->address) }}</textarea>
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="district">Kwartir Ranting <span style="color: red;">*</span></label>
                            <input name="district" class="form-control" id="district" value="{{ old('district', $gudeps->district) }}">
                            @error('district')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="city">Kwartir Cabang <span style="color: red;">*</span></label>
                            <input name="city" class="form-control" id="city" value="{{ old('city', $gudeps->city) }}">
                            @error('city')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="province">Kwartir Daerah <span style="color: red;">*</span></label>
                            <input name="province" class="form-control" id="province" value="{{ old('province', $gudeps->province) }}">
                            @error('province')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone_number">Nomor Telepon <span style="color: red;">*</span></label>
                            <input name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number', $gudeps->phone_number) }}">
                            @error('phone_number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="information">Keterangan</label>
                            <select name="information" class="form-control" id="information">
                                @if ($gudeps->information == "NULL")
                                <option>- Pilih -</option>
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                                @elseif ($gudeps->information == "Aktif")
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

                        <button type="submit" class="btn btn-primary mr-2">Ubah Sekarang !</button>
                        <a href="{{ route('gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
