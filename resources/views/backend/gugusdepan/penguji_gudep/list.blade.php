@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Data Gudep /</span> Penguji Gugus Depan</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header">
            <h5>Penguji Gugus Depan</h5><br>
            <a href="{{ route('penguji-gudeps.create') }}"" class="btn btn-sm btn-primary">Tambah</a>
        </div>
        <div class="card-datatable table">
            <div class="card-datatable table-responsive text-nowrap">
                <table class="dt-scrollableTable table data-table-penguji-gudep">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penguji</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
