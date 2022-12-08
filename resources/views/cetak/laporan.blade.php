@extends('layout.main')
@section('isi')
        <div class="accordion" id="accordionExample">
            <div class="card shadow">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Laporan Transaksi
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <a href="/cetak/pembelian" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Pembelian Barang</a>
                    <a href="/cetak/penjualan_reguler" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Penjualan</a>
                    <a href="/cetak/penjualan_mitra" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Penjualan Mitra</a>
                </div>
              </div>
            </div>
        </div>

        <div class="accordion mt-2" id="accordion2">
            <div class="card shadow">
              <div class="card-header" id="headingTwos">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="true" aria-controls="collapseTwos">
                    Laporan Barang
                  </button>
                </h5>
              </div>
              <div id="collapseTwos" class="collapse show" aria-labelledby="headingTwos" data-parent="#accordion2">
                <div class="card-body">
                    <a href="/cetak/barang_masuk" class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Barang Masuk</a>
                    <a href="/cetak/barang_keluar"  class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Barang Keluar</a>
                    <a href="/cetak/stok_barang"  class="text-light btn btn-primary col-12 text-start mb-2"><i class="fas fa-file-alt"></i> Laporan Stok Barang</a>
                </div>
              </div>
            </div>
        </div>
@endsection
