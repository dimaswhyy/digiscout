@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Pemberitahuan /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Pemberitahuan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('pemberitahuans.update', $pemberitahuans->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <input name="gudep_id" class="form-control" id="gudep_id" value="{{ auth()->user()->gudep_id }}" hidden>
                        <input name="penguji_gudep_id" class="form-control" id="penguji_gudep_id" value="{{ auth()->user()->id }}" hidden>

                        <div class="form-group mb-3">
                            <label for="title">Judul Pemberitahuan <span style="color: red;">*</span></label>
                            <input type="title" name="title" class="form-control" id="title"
                            value="{{ old('title', $pemberitahuans->title) }}">
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="desc">Deskripsi Informasi <span style="color: red;">*</span></label>
                            <textarea name="desc" class="form-control" id="desc">{{ old('desc', $pemberitahuans->desc) }}</textarea>
                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Tanggal <span style="color: red;">*</span></label>
                            <input name="date" class="form-control" type="date" value="{{ old('date', $pemberitahuans->date) }}" />
                            @error('date')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="time">Pukul <span style="color: red;">*</span></label>
                            <input name="time" class="form-control" type="time" value="{{ old('time', $pemberitahuans->time) }}" />
                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Perbaharui !</button>
                        <a href="{{ route('pemberitahuans.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
