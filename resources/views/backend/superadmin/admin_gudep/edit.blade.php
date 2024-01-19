@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Admin Gudep /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Admin Gudep</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin-gudeps.update', $admingudeps->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf 
                        @method('PUT')

                        <input name="role_id" class="form-control" id="role_id" value="2" hidden>

                        <div class="form-group mb-3">
                            <label for="id_gudep">Asal Pangkalan <span style="color: red;">*</span></label>
                            <select name="id_gudep" class="form-control" id="id_gudep">
                                @foreach ($getGudep as $item)
                                <option value="{{$item->id}}" {{$admingudeps->id_gudep == $item->id ? 'selected':''}}>{{$item->school_name}}</option>
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
                            <input name="name" class="form-control" id="name" value="{{ old('name', $admingudeps->name) }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="nta">Nomor Tanda Anggota <span style="color: red;">*</span></label>
                            <input name="nta" class="form-control" id="nta" value="{{ old('nta', $admingudeps->nta) }}">
                            @error('nta')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Golongan <span style="color: red;">*</span></label>
                            <select name="gender" class="form-control" id="gender">
                                @if ($admingudeps->gender == "NULL")
                                <option>- Pilih -</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                                @elseif ($admingudeps->gender == "Laki-laki")
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
                            <label for="phone_number">Nomor Telepon <span style="color: red;">*</span></label>
                            <input name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number', $admingudeps->phone_number) }}">
                            @error('phone_number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email', $admingudeps->email) }}">
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
                                value="{{ old('password', $admingudeps->password) }}"
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
                                <img src="{{ Storage::url('public/photo_profile/') . $admingudeps->photo_profile }}" alt="Photo Profile"
                                class="rounded" style="max-height: 200px; margin-right: 10px;">
                            </div>
                            <label>Foto Profil</label>
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
                                <img src="{{ Storage::url('public/photo_full/') . $admingudeps->photo_full }}" alt="Photo Full"
                                class="rounded" style="max-height: 200px; margin-right: 10px;">
                                {{-- {{ asset('storage/photo_full/'.$post->image) }} --}}
                            </div>
                            <label>Foto Full Bebas Tanpa Background</label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control @error('photo_full') is-invalid @enderror"
                                    name="photo_full" >
                                @error('photo_full')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Ubah Sekarang !</button>
                        <a href="{{ route('admin-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
