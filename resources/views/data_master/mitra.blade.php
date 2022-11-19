@extends('template')
@section('judul', 'Halaman Data Mitra')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header mb-0">
        <h1 class="h5 text-gray-800 mb-3">Data mitra</h1>
        <h6 class="font-weight-bold text-primary">Data Master / Data mitra <a class=" btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewMitra"><i class="fas fa-user-plus"></i> Tambah mitra</a></h6>
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
                    <form id="mitraForm" name="mitraForm" class="form-horizontal">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name" class="col-sm-4 control-label">Nama mitra</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" placeholder="Masukkan Nama mitra" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Alamat</label>
                                     <div class="col-sm-12">
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat mitra" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Telp.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan No.telp mitra" value="" maxlength="50" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email mitra" value="" maxlength="50" required>
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
        ajax: "{{ route('mitra.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'nama_mitra', name: 'nama_mitra'},
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
    $('#createNewMitra').click(function () {
        $('#saveBtn').val("create-Mitra");
        $('#id').val('');
        $('#mitraForm').trigger("reset");
        $('#modelHeading').html("Tambah mitra Baru");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editMitra', function () {
      var id = $(this).data('id');
      $.get("{{ route('mitra.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit mitra");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_mitra').val(data.nama_mitra).prop('readonly', false);
          $('#alamat').val(data.alamat).prop('readonly', false);
          $('#telp').val(data.telp).prop('readonly', false);
          $('#email').val(data.email).prop('readonly', false);
      })
    });

    /*------------------------------------------
    --------------------------------------------
    show mitra Code
    --------------------------------------------
    --------------------------------------------*/

    $('body').on('click', '.showMitra', function () {
      var id = $(this).data('id');
      $.get("{{ route('mitra.index') }}" +'/' + id, function (data) {
          $('#modelHeading').html("Detail mitra");
          $('#saveBtn').val("edit mitra");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_mitra').val(data.nama_mitra).prop('readonly', true);
          $('#alamat').val(data.alamat).prop('readonly', true);
          $('#telp').val(data.telp).prop('readonly', true);
          $('#email').val(data.email).prop('readonly', true);
      })
    });
    /*------------------------------------------
    --------------------------------------------
    Create mitra Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
          data: $('#mitraForm').serialize(),
          url: "{{ route('mitra.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#mitraForm').trigger("reset");
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
    Delete mitra Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteMitra', function () {

        var id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('mitra.store') }}"+'/'+id,
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
