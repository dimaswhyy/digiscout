@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Tingkatan /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Tingkatan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('tingkatans.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group mb-3">
                            <label for="group_id">Golongan <span style="color: red;">*</span></label>
                            <select name="group_id" class="form-control" id="group_id">
                                <option>- Pilih Golongan -</option>
                                @foreach ($getGroup as $item)
                                <option value="{{$item->id}}">{{$item->group_name}}</option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="level_group_name">Tingkatan <span style="color: red;">*</span></label>
                            <input name="level_group_name" class="form-control" id="level_group_name" placeholder="Siaga Mula">
                            @error('level_group_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Badge</label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control @error('level_badge') is-invalid @enderror"
                                    name="level_badge">
                                @error('level_badge')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('golongans.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
