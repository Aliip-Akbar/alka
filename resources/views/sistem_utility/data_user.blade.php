@extends('layout.main')
@section('isi')
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h1 class="h5 text-gray-800">Data User<a class="btn btn-success btn-sm float-right" href="javascript:void(0)" id="createNewUser"><i class="fas fa-plus-circle"></i></a></h1>
            <h6 class="m-0 font-weight-bold text-primary">Sistem Utility / User</h6>
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>

                                    </tr>
                                </thead>
                                <tbody  class="table-striped"></tbody>
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
                            <form id="UserForm" name="UserForm" class="form-horizontal">
                            <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">Nama User</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_User" name="nama_User" placeholder="Isi Nama User" value="" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">Keterangan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="k_User" name="k_User" placeholder="Isi keterangan User" value="" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                                </button>
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
        ajax: "{{ route('user.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'level', name: 'level'},

        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewUser').click(function () {
        $('#saveBtn').val("create-User");
        $('#id').val('');
        $('#UserForm').trigger("reset");
        $('#modelHeading').html("Tambah User Baru");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editUser', function () {
      var id = $(this).data('id');
      $.get("{{ route('user.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#saveBtn').val("edit User");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_User').val(data.nama_User).prop('readonly', false);
          $('#k_User').val(data.k_User).prop('readonly', false);
      })
    });
    /*------------------------------------------
    --------------------------------------------
    show Satuan Code
    --------------------------------------------
    --------------------------------------------*/

    $('body').on('click', '.showUser', function () {
    var id = $(this).data('id');
    $.get("{{ route('user.index') }}" +'/' + id, function (data) {
    $('#modelHeading').html("Detail User");
    $('#saveBtn').val("edit satuan");
    $('#ajaxModel').modal('show');
    $('#id').val(data.id);
    $('#nama_User').val(data.nama_User).prop('readonly', true);
    $('#k_User').val(data.k_User).prop('readonly', true);
    })
    });

    /*------------------------------------------
    --------------------------------------------
    Create User Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Tambah');
        alertify.notify('Data Baru Saja Ditambahkan', 'success', 10, function(){  console.log('dismissed'); });
        var id = $(this).data("id");

        $.ajax({
          data: $('#UserForm').serialize(),
          url: "{{ route('user.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#UserForm').trigger("reset");
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
    Delete User Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteUser', function () {
        var id = $(this).data("id");

        $.ajax({
            type: "DELETE",
            url: "{{ route('user.store') }}"+'/'+id,
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
