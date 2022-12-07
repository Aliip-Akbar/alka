@extends('layout.main')
@section('isi')
<div class="card shadow mb-2">
    <div class="card-header mb-0">
        <h1 class="h5 text-gray-800 mb-0">Data Laporan</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <a href="#" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Stok Barang</a>
                <a href="/pegawai/cetak/penjualan" target="_blank" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Penjualan</a>
            </div>
            <div class="col">
                <a href="/cetak/penjualan" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Pembelian Barang</a>
                <a href="#" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Hutang</a>
            </div>
        </div>
    </div>
</div>
@endsection
