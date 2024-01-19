@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Poin SKU /</span> Tambah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Poin SKU</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('poinskus.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group mb-3">
                            <label for="group_id">Golongan <span style="color: red;">*</span></label>
                            <select name="group_id" class="form-control" id="group_id">
                                <option>- Pilih Golongan -</option>
                                @foreach ($getGolongan as $item)
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
                            <label for="level_group_id">Tingkatan <span style="color: red;">*</span></label>
                            <select name="level_group_id" class="form-control" id="level_group_id">
                                <option>- Pilih Tingkatan -</option>
                                @foreach ($getTingkatan as $item)
                                <option value="{{$item->id}}">{{$item->level_group_name}}</option>
                                @endforeach
                            </select>
                            @error('level_group_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sku_number">Poin <span style="color: red;">*</span></label>
                            <input name="sku_number" class="form-control" id="sku_number" placeholder="1">
                            @error('sku_number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sku_theme">Tema <span style="color: red;">*</span></label>
                            <input name="sku_theme" class="form-control" id="sku_theme" placeholder="Spiritual">
                            @error('sku_theme')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sku_desc">Deskripsi <span style="color: red;">*</span></label>
                            <input name="sku_desc" class="form-control" id="sku_desc" placeholder="Isi ...">
                            @error('sku_desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="skor">Nilai <span style="color: red;">*</span></label>
                            <input name="skor" class="form-control" id="skor" placeholder="1">
                            @error('skor')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan Sekarang !</button>
                        <a href="{{ route('poinskus.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
