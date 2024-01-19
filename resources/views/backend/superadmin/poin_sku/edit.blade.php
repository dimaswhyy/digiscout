@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Poin SKU /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Poin SKU</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('poinskus.update', $poinskus->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="group_id">Golongan</label>
                            <select name="group_id" class="form-control" id="group_id">
                                @foreach ($getGolongan as $item)
                                <option value="{{$item->id}}" {{$poinskus->group_id == $item->id ? 'selected':''}}>{{$item->group_name}}</option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="level_group_id">Tingkatan</label>
                            <select name="level_group_id" class="form-control" id="level_group_id">
                                @foreach ($getTingkatan as $item)
                                <option value="{{$item->id}}" {{$poinskus->level_group_id == $item->id ? 'selected':''}}>{{$item->level_group_name}}</option>
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
                            <input name="sku_number" class="form-control" id="sku_number" value="{{ old('sku_number', $poinskus->sku_number) }}">
                            @error('sku_number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sku_theme">Tema <span style="color: red;">*</span></label>
                            <input name="sku_theme" class="form-control" id="sku_theme" value="{{ old('sku_theme', $poinskus->sku_theme) }}">
                            @error('sku_theme')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sku_desc">Deskripsi <span style="color: red;">*</span></label>
                            <input name="sku_desc" class="form-control" id="sku_desc" value="{{ old('sku_desc', $poinskus->sku_desc) }}">
                            @error('sku_desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="skor">Nilai <span style="color: red;">*</span></label>
                            <input name="skor" class="form-control" id="skor" value="{{ old('skor', $poinskus->skor) }}">
                            @error('skor')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Perbaharui !</button>
                        <a href="{{ route('poinskus.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
