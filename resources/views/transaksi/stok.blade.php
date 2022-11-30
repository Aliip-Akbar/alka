@extends('layout.main')
@section('isi')
<div class="card shadow mb-4 mt-4">
    <div class="card-header mb-0">
        <h1 class="h5 text-gray-800 mb-3">Stok Barang</h1>
        <h6 class="font-weight-bold text-primary">Transaksi / Stok Barang <a class=" btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewStok"><i class="fas fa-user-plus"></i> Tambah Stok</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="container">
                <table class="table table-borderless data-table table-sm">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th width="10px">#</th>
                            <th width="100px">Action</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Exp Date</th>
                            <th>Harga Beli</th>
                            <th>Jumlah Stok</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="StokForm" name="StokForm" class="form-horizontal">
                        <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Nama Barang</label>
                                    <div class="col-sm-12">
                                       <select name="nama_barang" id="nama_barang" class="form-select">
                                        <option>-- Pilih Barang --</option>
                                        @foreach ($barangs as $i)
                                            <option value="{{ $i->nama_barang }}">{{ $i->nama_barang }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Satuan</label>
                                    <div class="col-sm-12">
                                        <select name="satuan" id="satuan" class="form-select">
                                            <option>-- Pilih Satuan --</option>
                                            @foreach ($satuans as $i)
                                                <option value="{{ $i->nama_satuan }}">{{ $i->nama_satuan }}</option>
                                            @endforeach
                                           </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Exp Date</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" id="tgl_exp" name="tgl_exp" placeholder="Masukkan No.tgl_exp barang" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Harga Beli</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan harga beli barang" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Jumlah Stok</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan stok barang" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
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
        "pageLength": 5,
        ajax: "{{ route('stok.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'nama_barang', name: 'nama_barang'},
            {data: 'satuan', name: 'satuan'},
            {data: 'tgl_exp', name: 'tgl_exp'},
            {data: 'harga_beli', name: 'harga_beli'},
            {data: 'stok', name: 'stok'},

        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewStok').click(function () {
        $('#saveBtn').val("create-stok");
        $('#id').val('');
        $('#StokForm').trigger("reset");
        $('#modelHeading').html("Tambah Stok Baru");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editStok', function () {
      var id = $(this).data('id');
      $.get("{{ route('stok.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Stok");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_barang').val(data.nama_barang).attr("disabled", false);;
          $('#satuan').val(data.satuan).attr("disabled", false);
          $('#tgl_exp').val(data.tgl_exp).prop('readonly', false);
          $('#harga_beli').val(data.harga_beli).prop('readonly', false);
          $('#stok').val(data.stok).prop('readonly', false);
      })
    });

    /*------------------------------------------
    --------------------------------------------
    show barang Code
    --------------------------------------------
    --------------------------------------------*/

    $('body').on('click', '.showStok', function () {
      var id = $(this).data('id');
      $.get("{{ route('stok.index') }}" +'/' + id, function (data) {
          $('#modelHeading').html("Detail Stok");
          $('#saveBtn').val("edit Stok");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_barang').val(data.nama_barang).attr("disabled", true);;
          $('#satuan').val(data.satuan).attr("disabled", true);
          $('#tgl_exp').val(data.tgl_exp).prop('readonly', true);
          $('#harga_beli').val(data.harga_beli).prop('readonly', true);
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

        $.ajax({
          data: $('#StokForm').serialize(),
          url: "{{ route('stok.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#StokForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Simpan');
          }
      });
    });

    /*------------------------------------------
    --------------------------------------------
    Delete Stok Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteStok', function () {

        var id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('stok.store') }}"+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

  });
</script>

@endsection
