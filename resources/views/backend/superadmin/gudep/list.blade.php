@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Gugus Depan</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header">
            <h5>Data Gugus Depan</h5><br>
            <a href="{{ route('gudeps.create') }}"" class="btn btn-sm btn-primary">Tambah</a>
            {{-- <a href="#" class="btn btn-sm btn-info">Import</a>
            <a href="#" class="btn btn-sm btn-success">Export</a> --}}
        </div>
        <div class="card-datatable table">
            <div class="card-datatable table-responsive text-nowrap">
                <table class="dt-scrollableTable table data-table-gudep">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sekolah</th>
                            <th>Jenjang</th>
                            <th>Gudep Pa</th>
                            <th>Gudep Pi</th>
                            <th>Nomor Aktif</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
