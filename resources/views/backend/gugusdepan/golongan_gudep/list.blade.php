@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Data Gudep /</span> Golongan Gugus Depan</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header">
            <h5>Golongan Gugus Depan</h5><br>
            <a href="{{ route('golongan-gudeps.create') }}"" class="btn btn-sm btn-primary">Tambah</a>
        </div>
        <div class="card-datatable table">
            <div class="card-datatable table-responsive text-nowrap">
                <table class="dt-scrollableTable table data-table-golongan-gudep">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Golongan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
