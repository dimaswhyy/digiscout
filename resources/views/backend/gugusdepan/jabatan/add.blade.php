@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Data Gudep / Jabatan /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Jabatan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('jabatans.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="text" class="form-control" name="gudep_id" value="1">
                        <input type="text" class="form-control" name="admin_gudep_id" value="1">

                        <div class="form-group mb-3">
                            <label for="position_name">Nama Jabatan <span style="color: red;">*</span></label>
                            <input name="position_name" class="form-control" id="position_name" placeholder="Ka Mabigus">
                            @error('position_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="task_desc">Tupoksi <span style="color: red;">*</span></label>
                            <textarea name="task_desc" class="form-control" id="task_desc" rows="4"></textarea>
                            @error('task_desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('jabatans.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
