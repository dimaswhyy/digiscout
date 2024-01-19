@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Golongan /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Golongan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('golongans.update', $golongans->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <input name="role_id" class="form-control" id="role_id" value="2" hidden>

                        <div class="form-group mb-3">
                            <label for="group_name">Golongan <span style="color: red;">*</span></label>
                            <select name="group_name" class="form-control" id="group_name">
                                @if ($golongans->group_name == "NULL")
                                <option>- Pilih -</option>
                                <option>Siaga</option>
                                <option>Penggalang</option>
                                <option>Penegak</option>
                                <option>Pandega</option>
                                @elseif ($golongans->group_name == "Siaga")
                                <option>Siaga</option>
                                <option>Penggalang</option>
                                <option>Penegak</option>
                                <option>Pandega</option>
                                @elseif ($golongans->group_name == "Penggalang")
                                <option>Penggalang</option>
                                <option>Penegak</option>
                                <option>Pandega</option>
                                <option>Siaga</option>
                                @elseif ($golongans->group_name == "Penegak")
                                <option>Penegak</option>
                                <option>Pandega</option>
                                <option>Siaga</option>
                                <option>Penggalang</option>
                                @else
                                <option>Pandega</option>
                                <option>Siaga</option>
                                <option>Penggalang</option>
                                <option>Penegak</option>
                                @endif
                            </select>
                            @error('group_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="min_age">Minimal Umur <span style="color: red;">*</span></label>
                            <input name="min_age" class="form-control" id="min_age" value="{{ old('min_age', $golongans->min_age) }}">
                            @error('min_age')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="max_age">Maksimal Umur <span style="color: red;">*</span></label>
                            <input name="max_age" class="form-control" id="max_age" value="{{ old('max_age', $golongans->max_age) }}">
                            @error('max_age')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="desc">Deskripsi <span style="color: red;">*</span></label>
                            <textarea name="desc" class="form-control" id="desc" rows="4">{{ old('desc', $golongans->desc) }}</textarea>
                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Perbaharui !</button>
                        <a href="{{ route('golongans.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
