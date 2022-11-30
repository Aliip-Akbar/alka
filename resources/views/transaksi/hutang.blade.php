@extends('template')
@section('judul', 'Halaman Pembayaran Hutang')
@section('konten')
<div class="card shadow mb-2">
    <div class="card-header mb-0">
        <h1 class="h5 text-gray-800 mb-0">Data Pelanggan</h1>
    </div>
    <div class="card-body">
        <div class="form-inline mb-4">
            <label for="" class="mr-4">Nama Pembeli</label>
                <select name="" id="" class="form-select col-lg">
                    @foreach ($mitras as $i)
                        <option value="{{ $i->nama_mitra }}">{{ $i->nama_mitra }}</option>
                    @endforeach
                    @foreach ($pelanggans as $i)
                        <option value="{{ $i->nama_pelanggan }}">{{ $i->nama_pelanggan }}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-inline float-right">
            <button class="btn btn-success">Tampilkan Tagihan</button>
        </div>
    </div>
</div>
@endsection

