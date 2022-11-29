@extends('layout.main')
@section('isi')
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h1 class="h5 text-gray-800">Kategori Barang</h1>
            <h6 class="m-0 font-weight-bold text-primary">Data Master / Kategori Barang  <a class="btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewKategori"><i class="fas fa-plus-circle"></i> Tambah Kategori</a></h6>
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
                                        <th>Keterangan</th>
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
                            <form id="kategoriForm" name="kategoriForm" class="form-horizontal">
                            <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">Nama Kategori</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Isi Nama kategori" value="" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-5 control-label">Keterangan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="k_kategori" name="k_kategori" placeholder="Isi keterangan kategori" value="" maxlength="50" required="">
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
        ajax: "{{ route('kategori.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'nama_kategori', name: 'nama_kategori'},
            {data: 'k_kategori', name: 'k_kategori'},

        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewKategori').click(function () {
        $('#saveBtn').val("create-kategori");
        $('#id').val('');
        $('#kategoriForm').trigger("reset");
        $('#modelHeading').html("Tambah Kategori Baru");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editKategori', function () {
      var id = $(this).data('id');
      $.get("{{ route('kategori.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit kategori");
          $('#saveBtn').val("edit kategori");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_kategori').val(data.nama_kategori).prop('readonly', false);
          $('#k_kategori').val(data.k_kategori).prop('readonly', false);
      })
    });
    /*------------------------------------------
    --------------------------------------------
    show Satuan Code
    --------------------------------------------
    --------------------------------------------*/

    $('body').on('click', '.showKategori', function () {
    var id = $(this).data('id');
    $.get("{{ route('kategori.index') }}" +'/' + id, function (data) {
    $('#modelHeading').html("Detail Kategori");
    $('#saveBtn').val("edit satuan");
    $('#ajaxModel').modal('show');
    $('#id').val(data.id);
    $('#nama_kategori').val(data.nama_kategori).prop('readonly', true);
    $('#k_kategori').val(data.k_kategori).prop('readonly', true);
    })
    });

    /*------------------------------------------
    --------------------------------------------
    Create kategori Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Tambah');
        alertify.notify('Data Baru Saja Ditambahkan', 'success', 10, function(){  console.log('dismissed'); });
        var id = $(this).data("id");

        $.ajax({
          data: $('#kategoriForm').serialize(),
          url: "{{ route('kategori.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#kategoriForm').trigger("reset");
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
    Delete kategori Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteKategori', function () {
        var id = $(this).data("id");

        $.ajax({
            type: "DELETE",
            url: "{{ route('kategori.store') }}"+'/'+id,
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
