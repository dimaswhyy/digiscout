@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Dashboard / Data Gudep / Golongan /</span> Ubah
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Golongan Gugus Depan</h5>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('golongan-gudeps.update', $golongangudeps->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <input name="gudep_id" class="form-control" id="gudep_id" value="{{ auth()->user()->id_gudep }}" hidden>
                        <input name="admin_gudep_id" class="form-control" id="admin_gudep_id" value="{{ auth()->user()->id }}" hidden>

                        <div class="form-group mb-3">
                            <label for="golongan_id">Golongan <span style="color: red;">*</span></label>
                            <select name="golongan_id" class="form-control" id="golongan_id">
                                @foreach ($getGolongan as $item)
                                <option value="{{$item->id}}" {{$golongangudeps->golongan_id == $item->id ? 'selected':''}}>{{$item->group_name}}</option>
                                @endforeach
                            </select>
                            @error('golongan_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="information">Keterangan <span style="color: red;">*</span></label>
                            <select name="information" class="form-control" id="information">
                                @if ($golongangudeps->information == "NULL")
                                <option>- Pilih -</option>
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                                @elseif ($golongangudeps->information == "Aktif")
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                                @else
                                <option>Tidak Aktif</option>
                                <option>Aktif</option>
                                @endif
                            </select>
                            @error('information')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Perbaharui !</button>
                        <a href="{{ route('golongan-gudeps.index') }}" class="btn btn-light">Nanti Aja</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
