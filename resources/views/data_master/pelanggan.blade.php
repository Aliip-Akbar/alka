@extends('template')
@section('judul', 'Halaman Data Pelanggan')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header mb-0">
        <h1 class="h5 text-gray-800 mb-3">Data Pelanggan</h1>
        <h6 class="font-weight-bold text-primary">Data Master / Data Pelanggan <a class=" btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewPelanggan"><i class="fas fa-user-plus"></i> Tambah Pelanggan</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="container">
                <table class="table table-bordered data-table table-sm">
                    <thead class="table-primary">
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
                        <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Nama Pelanggan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" value="" maxlength="50" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Pelanggan" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Telp.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan No.telp Pelanggan" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Pelanggan" value="" maxlength="50" required>
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
        $('#saveBtn').val("create-pelanggan");
        $('#id').val('');
        $('#pelangganForm').trigger("reset");
        $('#modelHeading').html("Tambah pelanggan Baru");
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
          $('#modelHeading').html("Edit pelanggan");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_pelanggan').val(data.nama_pelanggan).prop('readonly', false);
          $('#alamat').val(data.alamat).prop('readonly', false);
          $('#telp').val(data.telp).prop('readonly', false);
          $('#email').val(data.email).prop('readonly', false);
      })
    });

    /*------------------------------------------
    --------------------------------------------
    show pelanggan Code
    --------------------------------------------
    --------------------------------------------*/

    $('body').on('click', '.showPelanggan', function () {
      var id = $(this).data('id');
      $.get("{{ route('pelanggan.index') }}" +'/' + id, function (data) {
          $('#modelHeading').html("Detail pelanggan");
          $('#saveBtn').val("edit pelanggan");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_pelanggan').val(data.nama_pelanggan).prop('readonly', true);
          $('#alamat').val(data.alamat).prop('readonly', true);
          $('#telp').val(data.telp).prop('readonly', true);
          $('#email').val(data.email).prop('readonly', true);
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
    Delete pelanggan Code
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
