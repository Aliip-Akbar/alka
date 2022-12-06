@extends('layout.main')
@section('isi')
<div class="card shadow mb-4 mt-4">
    <div class="card-header mb-0">
        <h1 class="h5 text-gray-800">Data Pelanggan</h1>
        <h6 class="font-weight-bold text-primary">Data Master / Data Pelanggan <a class=" btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewPelanggan"><i class="fas fa-user-plus"></i> Tambah Pelanggan</a></h6>
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
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Email</th>
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
                    <form id="pelangganForm" name="pelangganForm" class="form-horizontal">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="kd_user" id="kd_user" value="">
                                <label for="name" class="col-sm-4 control-label">Nama Pelanggan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama pelanggan" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Alamat</label>
                                     <div class="col-sm-12">
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat pelanggan" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Telp.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan No.telp pelanggan" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email pelanggan" value="" maxlength="50" required>
                                        <input type="hidden" class="form-control" id="j_pelanggan" name="j_pelanggan" value="biasa" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create" onclick="return notification = alertify.notify('Data Baru Saja Ditambahkan', 'success', 10, function(){  console.log('dismissed'); });">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

$(function() {
  var randomnumber = Math.floor(Math.random() * 10000)
  var kd = 'User-';
  var kd_user = kd + randomnumber;
  $('#kd_user').val(kd_user);
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
        "pageLength": 5,
        ajax: "{{ route('pelanggan.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'nama_pelanggan', name: 'nama_pelanggan'},
            {data: 'alamat', name: 'alamat'},
            {data: 'telp', name: 'telp'},
            {data: 'email', name: 'email'},

        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewPelanggan').click(function () {
        $('#saveBtn').val("create-Pelanggan");
        $('#id').val('');
        $('#pelangganForm').trigger("reset");
        $('#modelHeading').html("Tambah Pelanggan Baru");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editPelanggan', function () {
      var id = $(this).data('id');
      $.get("{{ route('pelanggan.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Pelanggan");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_pelanggan').val(data.nama_pelanggan).prop('readonly', false);
          $('#alamat').val(data.alamat).prop('readonly', false);
          $('#telp').val(data.telp).prop('readonly', false);
          $('#email').val(data.email).prop('readonly', false);
          $('#j_pelanggan').val(data.j_pelanggan).prop('readonly', false);
      })
    });

    /*------------------------------------------
    --------------------------------------------
    show Pelanggan Code
    --------------------------------------------
    --------------------------------------------*/

    $('body').on('click', '.showPelanggan', function () {
      var id = $(this).data('id');
      $.get("{{ route('pelanggan.index') }}" +'/' + id, function (data) {
          $('#modelHeading').html("Detail Pelanggan");
          $('#saveBtn').val("edit Pelanggan");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_pelanggan').val(data.nama_pelanggan).prop('readonly', true);
          $('#alamat').val(data.alamat).prop('readonly', true);
          $('#telp').val(data.telp).prop('readonly', true);
          $('#email').val(data.email).prop('readonly', true);
          $('#j_pelanggan').val(data.j_pelanggan).prop('readonly', true);
      })
    });
    /*------------------------------------------
    --------------------------------------------
    Create pelanggan Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
          data: $('#pelangganForm').serialize(),
          url: "{{ route('pelanggan.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#pelangganForm').trigger("reset");
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
    Delete Pelanggan Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deletePelanggan', function () {

        var id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('pelanggan.store') }}"+'/'+id,
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
