@extends('layout.main')
@section('isi')
    <div class="card shadow mt-4">
        <div class="card-header">
            <h1 class="h5 text-gray-800">Data Hutang <a class="btn btn-success btn-sm float-right" href="javascript:void(0)" id="createNewBarang"><i class="fas fa-plus-circle"></i></a></h1>
            <h6 class="m-0 font-weight-bold text-primary">Laporan / Data Hutang</h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless data-table table-sm">
                <thead class="bg-primary text-light">
                    <tr>
                        <th width="10px">#</th>
                        <th>Nama</th>
                        <th>Total Belanja</th>
                        <th>Satuan Jual</th>
                        <th>Harga Beli</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody  class="table-striped"></tbody>
            </table>
        </div>
    </div>


<script type="text/javascript">
        $(function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('hutang.index') }}",
        columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nama', name: 'nama'},
        {data: 'jumlah_hutang', name: 'jumlah_hutang'},
        {data: 'total_bayar', name: 'total_bayar'},
        {data: 'sisa_hutang', name: 'sisa_hutang'},
        {data: 'status', name: 'status'},
        ]
        });
        });
</script>

@endsection
