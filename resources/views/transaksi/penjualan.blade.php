@extends('template')
@section('judul', 'Halaman Penjualan')
@section('konten')
<div class="card shadow mb-2">
    <div class="card-header">
        <h6 class="font-weight-bold text-primary">Transaksi / Penjualan <a href="" class="btn btn-sm btn-danger float-right"><i class="fas fa-times"></i> Reset Transaksi</a></h6>
    </div>
    <div class="card-body">
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" name="id_barang" class="form-control" id="id_barang"  placeholder="Cari Barang">
          </div>
    </div>
</div>
<div class="card shadow mb-2">
    <div class="card-header mb-0">
    <h1 class="h5 text-gray-800 mb-0">Detail Penjualan</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="">
            <table class="table table-bordered data-table table-sm w-80">
                <thead class="table-primary">
                    <tr>
                        <th width="10px">#</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>@</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="todo-list" name="todo-list">

                </tbody>
            </table>
            </div>

        </div>
    </div>
</div>
<div class="card shadow mb-2">
    <div class="card-body">
        <form id="pelangganForm" name="pelangganForm" class="form-horizontal">
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-5 ">Nama Pembeli</label>
                        <select name="" id="" class="form-select col-sm">
                            <option>-- Pilih Pembeli --</option>
                             @foreach ($pelanggans as $i)
                                <option value="{{ $i->nama_pelanggan }}">{{ $i->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2">Metode Pembayaran</label>
                            <select name="" id="" class="form-select col-sm">
                                <option>-- Pilih Metode --</option>
                                <option value="">Tunai</option>
                                <option value="">Hutang</option>
                            </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2 ">Total Harga</label>
                        <input type="number" class="form-control col-lg text-end" value="0" readonly aria-readonly="true">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2 ">Diskon Toko</label>
                        <input type="number" class="form-control col-lg  text-end" value="0">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2 ">Biaya Ongkir</label>
                        <input type="number" class="form-control col-lg  text-end" value="0">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2">Total Belanja</label>
                        <input type="number" class="form-control col-lg  text-end" value="0" readonly aria-readonly="true">
                    </div>
                    <div class="form-inline  mb-0">
                        <label for="" class="mr-3">Pembayaran</label>
                        <input type="number" class="form-control col-lg  text-end" value="0">
                    </div>
                </div>
                <div class="card-body">
                  <input type="button" value="Simpan transaksi" class="btn btn-lg btn-success float-right">
                </div>
            </div>
        </form>

    </div>
</div>
<script type="text/javascript">

</script>
@endsection
