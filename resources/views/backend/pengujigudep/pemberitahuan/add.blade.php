@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Pemberitahuan /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Pemberitahuan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('pemberitahuans.store') }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <input name="gudep_id" class="form-control" id="gudep_id" value="{{ auth()->user()->id_gudep }}"
                            hidden>
                        <input name="admin_gudep_id" class="form-control" id="penguji_gudep_id"
                            value="{{ auth()->user()->id }}" hidden>

                        <div class="form-group mb-3">
                            <label for="title">Judul <span style="color: red;">*</span></label>
                            <input name="title" class="form-control" id="title" placeholder="Judul Pemberitahuan">
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="desc">Deskripsi Informasi <span style="color: red;">*</span></label>
                            <textarea name="desc" class="form-control" id="desc" placeholder="Informasi"></textarea>
                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Tanggal <span style="color: red;">*</span></label>
                            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="time">Pukul <span style="color: red;">*</span></label>
                            <input class="form-control" type="time" value="12:30:00" id="html5-time-input" />
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('penguji-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
