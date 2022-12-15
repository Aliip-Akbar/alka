@extends('layout.main')
@section('isi')
<div class="card shadow">
    <div class="card-body">
        <form id="barangForm" name="barangForm" class="form-horizontal">
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name" class=" control-label">Nama</label>
                        <div class="">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class=" control-label">Harga Beli</label>
                        <div class="">
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name" class=" control-label">Harga Normal</label>
                        <div class="">
                            <input type="text" class="form-control" id="harga_normal" name="harga_normal" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class=" control-label">Harga Mitra</label>
                        <div class="">
                            <input type="text" class="form-control" id="harga_mitra" name="harga_mitra" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name" class=" control-label">Harga Grosir</label>
                        <div class="">
                            <input type="text" class="form-control" id="harga_grosir" name="harga_grosir" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class=" control-label">Stok</label>
                        <div class="">
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok" value="" maxlength="50" required="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name" class=" control-label">Tanggal Expired</label>
                        <div class="">
                            <input type="date" class="form-control" id="tgl_exp" name="tgl_exp" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class=" control-label"></label>
                        <div class="mt-1">
                            <button type="submit" class="btn btn-primary col-lg" id="saveBtn" value="create">Simpan Data</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
    </div>
</div>
    <div class="card shadow mt-4">
        <div class="card-header">
            <h1 class="h5 text-gray-800">Data Barang</h1>
            <h6 class="m-0 font-weight-bold text-primary">Data Master / Data Barang</h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless data-table table-sm">
                <thead class="bg-primary text-light">
                    <tr>
                        <th width="10px">#</th>
                        <th width="100px">Action</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Normal</th>
                        <th>Harga Mitra</th>
                        <th>Harga Grosir</th>
                        <th>Tanggal Expired</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody  class="table-striped"></tbody>
            </table>
        </div>
    </div>


<script type="text/javascript">
        $(function () {

        /*------------------------------------------
        --------------------------------------------
        Pass Header Token
        --------------------------------------------
        --------------------------------------------*/
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        /*------------------------------------------
        --------------------------------------------
        Render DataTable
        --------------------------------------------
        --------------------------------------------*/
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('stok.index') }}",
        columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        {data: 'nama_barang', name: 'nama_barang'},
        {data: 'harga_beli', name: 'harga_beli'},
        {data: 'harga_normal', name: 'harga_normal'},
        {data: 'harga_grosir', name: 'harga_grosir'},
        {data: 'harga_mitra', name: 'harga_mitra'},
        {data: 'tgl_exp', name: 'tgl_exp'},
        {data: 'stok', name: 'stok'},
        ]
        });

        /*------------------------------------------
        --------------------------------------------
        Click to Button
        --------------------------------------------
        --------------------------------------------*/
        $('#createNewBarang').click(function () {
        $('#saveBtn').val("create-barang");
        $('#id').val('');
        $('#barangForm').trigger("reset");
        });

        /*------------------------------------------
        --------------------------------------------
        Click to Edit Button
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '.editBarang', function () {
        var id = $(this).data('id');
        $.get("{{ route('stok.index') }}" +'/' + id +'/edit', function (data) {
        $('#id').val(data.id);
        $('#stok').val(data.stok).prop('readonly', false);
        })
        });

        /*------------------------------------------
        --------------------------------------------
        Click to Show Button
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '.showBarang', function () {
        var id = $(this).data('id');
        $.get("{{ route('barang.index') }}" +'/' + id, function (data) {
        $('#modelHeading').html("Edit barang");
        $('#saveBtn').val("edit barang");
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#nama_barang').val(data.nama_barang).prop('readonly', true);
        $('#harga_beli').val(data.harga_beli).prop('readonly', true);
        $('#harga_normal').val(data.harga_normal).prop('readonly', true);
        $('#harga_mitra').val(data.harga_mitra).prop('readonly', true);
        $('#harga_grosir').val(data.harga_grosir).prop('readonly', true);
        $('#stok').val(data.stok).prop('readonly', true);

        })
        });

        /*------------------------------------------
        --------------------------------------------
        Create barang Code
        --------------------------------------------
        --------------------------------------------*/
        $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Tambah');
        var id = $(this).data("id");

        $.ajax({
        data: $('#barangForm').serialize(),
        url: "{{ route('barang.store') }}",
        type: "POST",
        dataType: 'json',
        success: function (data) {

        $('#barangForm').trigger("reset");
        $('#ajaxModel').modal('hide');
        table.draw();

        },
        error: function (data) {
        console.log('Error:', data);
        $('#saveBtn').html('Save Changes');
        }
        });
        });

        /*------------------------------------------
        --------------------------------------------
        Delete barang Code
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '.deleteBarang', function () {
            var id = $(this).data("id");
            if(confirm("Yakin Mau Dihapus")){
                $.ajax({
        type: "DELETE",
        url: "{{ route('barang.store') }}"+'/'+id,
        success: function (data) {
            table.draw();
        },
        error: function (data) {
            console.log('Error:', data);
        }
        });
        }
        });
        });
</script>

@endsection
