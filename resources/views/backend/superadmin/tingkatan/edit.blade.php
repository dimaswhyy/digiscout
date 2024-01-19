@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Tingkatan /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Tingkatan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('tingkatans.update', $tingkatans->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="group_id">Unit</label>
                            <select name="group_id" class="form-control" id="group_id">
                                @foreach ($getGolongan as $item)
                                <option value="{{$item->id}}" {{$tingkatans->group_id == $item->id ? 'selected':''}}>{{$item->group_name}}</option>
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
                            <input name="level_group_name" class="form-control" id="level_group_name" value="{{ old('level_group_name', $tingkatans->level_group_name) }}">
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

                        <button type="submit" class="btn btn-primary mr-2">Perbaharui !</button>
                        <a href="{{ route('golongans.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
