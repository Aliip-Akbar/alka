@extends('template')

@section('judul', 'Halaman Data Barang')
@section('konten')
    <div class="card shadow">
        <div class="card-header">
            <h1 class="h5 text-gray-800">Data Barang</h1>
            <h6 class="m-0 font-weight-bold text-primary">Data Master / Data Barang  <a class="btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewBarang"><i class="fas fa-plus-circle"></i> Tambah barang</a></h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered data-table table-sm text-start">
                <thead class="table-primary">
                    <tr>
                        <th width="10px">#</th>
                        <th width="100px">Action</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Satuan Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody  class="table-striped"></tbody>
            </table>
        </div>
            <div class="modal fade" id="ajaxModel" aria-hidden="true">
                <div class="modal-lg modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeading"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="barangForm" name="barangForm" class="form-horizontal">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Kategori</label>
                                        <div class="col-sm-12">
                                            <select name="kategori" id="kategori" class="form-select">
                                                <option>-- Pilih Barang --</option>
                                                @foreach ($kategoris as $b)
                                                    <option value="{{ $b->nama_kategori }}">{{ $b->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Satuan Beli</label>
                                        <div class="col-sm-12">
                                            <select name="satuan_beli" id="satuan_beli" class="form-select">
                                                <option>-- Pilih Barang --</option>
                                                @foreach ($satuans as $b)
                                                    <option value="{{ $b->nama_satuan }}">{{ $b->nama_satuan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Satuan Jual</label>
                                        <div class="col-sm-12">
                                        <select name="satuan_jual" id="satuan_jual" class="form-select">
                                            <option>-- Pilih Barang --</option>
                                            @foreach ($satuans as $b)
                                                <option value="{{ $b->nama_satuan }}">{{ $b->nama_satuan }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Harga Beli</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Harga Normal</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="harga_normal" name="harga_normal" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Harga Mitra</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="harga_mitra" name="harga_mitra" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Harga Grosir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="harga_grosir" name="harga_grosir" placeholder="Masukkan Harga Barang" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-5 control-label">Stok</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok" value="" maxlength="50" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-5 control-label">Point</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="point" name="point" placeholder="Masukkan Point" value="" maxlength="50" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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
        ajax: "{{ route('barang.index') }}",
        columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        {data: 'nama_barang', name: 'nama_barang'},
        {data: 'kategori', name: 'kategori'},
        {data: 'satuan_jual', name: 'satuan_jual'},
        {data: 'harga_beli', name: 'harga_beli'},
        {data: 'stok', name: 'stok'},
        {data: 'point', name: 'point'},

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
        $('#modelHeading').html("Tambah barang Baru");
        $('#ajaxModel').modal('show');
        });

        /*------------------------------------------
        --------------------------------------------
        Click to Edit Button
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '.editBarang', function () {
        var id = $(this).data('id');
        $.get("{{ route('barang.index') }}" +'/' + id +'/edit', function (data) {
        $('#modelHeading').html("Edit barang");
        $('#saveBtn').val("edit barang");
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#nama_barang').val(data.nama_barang).prop('readonly', false);
        $('#kategori').val(data.kategori).attr("disabled", false);
        $('#satuan_beli').val(data.satuan_beli).attr("disabled", false);
        $('#satuan_jual').val(data.satuan_jual).attr("disabled", false);
        $('#harga_beli').val(data.harga_beli).prop('readonly', false);
        $('#harga_normal').val(data.harga_normal).prop('readonly', false);
        $('#harga_mitra').val(data.harga_mitra).prop('readonly', false);
        $('#harga_grosir').val(data.harga_grosir).prop('readonly', false);
        $('#stok').val(data.stok).prop('readonly', false);
        $('#point').val(data.point).prop('readonly', false);

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
        $('#kategori').val(data.kategori).attr("disabled", true);
        $('#satuan_beli').val(data.satuan_beli).attr("disabled", true);
        $('#satuan_jual').val(data.satuan_jual).attr("disabled", true);
        $('#harga_beli').val(data.harga_beli).prop('readonly', true);
        $('#harga_normal').val(data.harga_normal).prop('readonly', true);
        $('#harga_mitra').val(data.harga_mitra).prop('readonly', true);
        $('#harga_grosir').val(data.harga_grosir).prop('readonly', true);
        $('#stok').val(data.stok).prop('readonly', true);
        $('#point').val(data.point).prop('readonly', true);

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
