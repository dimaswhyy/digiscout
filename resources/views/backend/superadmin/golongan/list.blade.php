@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Golongan</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header">
            <h5>Data Golongan</h5><br>
            <a href="{{ route('golongans.create') }}"" class="btn btn-sm btn-primary">Tambah</a>
            {{-- <a href="#" class="btn btn-sm btn-info">Import</a>
            <a href="#" class="btn btn-sm btn-success">Export</a> --}}
        </div>
        <div class="card-datatable table">
            <div class="card-datatable table-responsive text-nowrap">
                <table class="dt-scrollableTable table data-table-golongan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Golongan</th>
                            <th>Minimal Umur</th>
                            <th>Maksimal Umur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
