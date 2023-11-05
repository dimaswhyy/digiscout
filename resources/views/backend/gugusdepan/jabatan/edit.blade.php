@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Gugus Depan /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Golongan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('jabatans.update', $jabatans->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <input type="text" class="form-control" name="gudep_id" value="{{ old('gudep_id', $jabatans->gudep_id) }}">
                        <input type="text" class="form-control" name="admin_gudep_id" value="{{ old('admin_gudep_id', $jabatans->admin_gudep_id) }}">

                        <div class="form-group mb-3">
                            <label for="position_name">Jabatan <span style="color: red;">*</span></label>
                            <input name="position_name" class="form-control" id="position_name" value="{{ old('position_name', $jabatans->position_name) }}">
                            @error('position_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="task_desc">Tupoksi <span style="color: red;">*</span></label>
                            <textarea name="task_desc" class="form-control" id="task_desc" rows="4">{{ old('task_desc', $jabatans->task_desc) }}</textarea>
                            @error('task_desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Perbaharui !</button>
                        <a href="{{ route('jabatans.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
