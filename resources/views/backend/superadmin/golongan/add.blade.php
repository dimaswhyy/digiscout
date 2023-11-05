@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Golongan /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Golongan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('golongans.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group mb-3">
                            <label for="group_name">Golongan <span style="color: red;">*</span></label>
                            <select name="group_name" class="form-control" id="group_name">
                                <option>- Pilih Golongan -</option>
                                <option>Siaga</option>
                                <option>Penggalang</option>
                                <option>Penegak</option>
                                <option>Pandega</option>
                            </select>
                            @error('group_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="min_age">Minimal Umur <span style="color: red;">*</span></label>
                            <input name="min_age" class="form-control" id="min_age" placeholder="7">
                            @error('min_age')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="max_age">Maksimal Umur <span style="color: red;">*</span></label>
                            <input name="max_age" class="form-control" id="max_age" placeholder="10">
                            @error('max_age')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="desc">Deskripsi <span style="color: red;">*</span></label>
                            <textarea name="desc" class="form-control" id="desc" rows="4"></textarea>
                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('golongans.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
