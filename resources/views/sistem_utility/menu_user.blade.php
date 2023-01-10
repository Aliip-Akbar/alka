@extends('layout.main')
@section('isi')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <div class="card shadow mt-4">
        <div class="card-header">
            <h1 class="h5 text-gray-800">Hak Akses <a class="btn btn-success btn-sm float-right" href="javascript:void(0)" id="createNewBarang"><i class="fas fa-plus-circle"></i></a></h1>
            <h6 class="m-0 font-weight-bold text-primary">Sistem Utility / Hak Ases</h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless data-table table-sm">
                <thead class="bg-primary text-light">
                    <tr>
                        <th width="10px">#</th>
                        <th width="100px">Action</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                        <div class="modal-body bg-light-400">
                            <form action="" id="barangForm" name="barangForm">
                            <input type="hidden" name="id" id="id">
                                <div class="container">
                                    <div class="form-group">
                                        <label class="">Nama</label>
                                            <select name="" id="" class="form-select">
                                                @foreach ($users as $i)
                                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
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

$('#generate').one('click',function() {
  var randomnumber = Math.floor(Math.random() * 10000);
  var kd = 'BRG-';
  var kd_barang = kd + randomnumber;
  $('#kd_barang').val(kd_barang);
});
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
        // {data: 'nama_barang', name: 'nama_barang'},
        // {data: 'kategori', name: 'kategori'},
        // {data: 'satuan_jual', name: 'satuan_jual'},
        // {data: 'harga_beli', name: 'harga_beli'},
        // {data: 'point', name: 'point'},

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
        $('#modelHeading').html("Ubah Hak Ases User");
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
        $('#generate').css("display", "none");
        $('#kd_class').addClass('col-sm-12');
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#kd_barang').val(data.kd_barang).prop('readonly', true);
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
        $('#generate').css("display", "none");
        $('#kd_class').addClass('col-sm-12');
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#kd_barang').val(data.kd_barang).prop('readonly', true);
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
