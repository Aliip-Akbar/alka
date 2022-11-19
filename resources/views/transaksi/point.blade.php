@extends('template')
@section('judul', 'Halaman Data Point')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header mb-0">
        <h1 class="h5 text-gray-800 mb-3">Data Point</h1>
        <h6 class="font-weight-bold text-primary">Transaksi / Data Point <a class=" btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewPoint"><i class="fas fa-user-plus"></i> Tambah Point</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="container">
                <table class="table table-bordered data-table table-sm">
                    <thead class="table-primary">
                        <tr>
                            <th width="10px">#</th>
                            <th width="55px">Action</th>
                            <th>Nama</th>
                            <th width="50px">Point Masuk</th>
                            <th width="50px">Point Ditebus</th>
                            <th width="50px">Saldo Point</th>
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
                    <form id="PointForm" name="PointForm" class="form-horizontal">
                        <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Nama Pelanggan</label>
                               <div class="col-sm-12">
                                <select name="nama_pelanggan" id="nama_pelanggan" class="form-control">
                                    <option>-- Pilih Pelanggan --</option>
                                    @foreach ($mitras as $i)
                                        <option value="{{ $i->nama_mitra }}">{{ $i->nama_mitra }}</option>
                                     @endforeach
                                     @foreach ($pelanggans as $i)
                                <option value="{{ $i->nama_pelanggan }}">{{ $i->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                               </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Point Masuk</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="point_masuk" name="point_masuk" placeholder="Masukkan Point Pelanggan" value="" maxlength="50" required>
                                        <input type="hidden" class="form-control" id="point_ditebus" name="point_ditebus" value="-">
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
        ajax: "{{ route('point.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'nama_pelanggan', name: 'nama_pelanggan'},
            {data: 'point_masuk', name: 'point_masuk'},
            {data: 'point_ditebus', name: 'point_ditebus'},
            {data: 'point_masuk', name: 'saldo_point'},

        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewPoint').click(function () {
        $('#saveBtn').val("create-point");
        $('#id').val('');
        $('#PointForm').trigger("reset");
        $('#modelHeading').html("Tambah Point Baru");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editPoint', function () {
      var id = $(this).data('id');
      $.get("{{ route('point.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit point");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#nama_pelanggan').val(data.nama_pelanggan).prop('readonly', false);
          $('#point_masuk').val(data.point_masuk).prop('readonly', false);
          $('#point_ditebus').val(data.point_ditebus).prop('readonly', false);
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
          data: $('#PointForm').serialize(),
          url: "{{ route('point.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#PointForm').trigger("reset");
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
    Delete Point Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deletePoint', function () {

        var id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('point.store') }}"+'/'+id,
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
