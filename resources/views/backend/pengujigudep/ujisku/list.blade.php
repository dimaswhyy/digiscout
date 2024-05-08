@extends('backend.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Uji SKU</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header">
            <h5>Data Uji SKU</h5><br>
        </div>
        <div class="card-datatable table">
            <div class="card-datatable table-responsive text-nowrap">
                <table class="dt-scrollableTable table data-table-penguji-uji-sku">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>SKU</th>
                            <th>Poin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
