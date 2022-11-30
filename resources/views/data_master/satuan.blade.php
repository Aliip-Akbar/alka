@extends('layout.main')
@section('isi')
    <div class="card shadow mb-4 mt-4">
        <div class="card-header mb-0">
        <h1 class="h5 text-gray-800">Data Satuan</h1>
        <h6 class="font-weight-bold text-primary">Data Master / Data Satuan <a class=" btn btn-success btn-sm float-right mr-4" href="javascript:void(0)" id="createNewSatuan"><i class="fas fa-user-plus"></i> Tambah Satuan</a></h6>
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
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
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
                        <form id="satuanForm" name="satuanForm" class="form-horizontal">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Nama Satuan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_satuan" name="nama_satuan" placeholder="Masukkan Nama Satuan" value="" maxlength="50" required>
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
    ajax: "{{ route('satuan.index') }}",
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    {data: 'nama_satuan', name: 'nama_satuan'},

    ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewSatuan').click(function () {
    $('#saveBtn').val("create-satuan");
    $('#id').val('');
    $('#satuanForm').trigger("reset");
    $('#modelHeading').html("Tambah satuan Baru");
    $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editSatuan', function () {
    var id = $(this).data('id');
    $.get("{{ route('satuan.index') }}" +'/' + id +'/edit', function (data) {
    $('#modelHeading').html("Edit satuan");
    $('#ajaxModel').modal('show');
    $('#id').val(data.id);
    $('#nama_satuan').val(data.nama_satuan).prop('readonly', false);
    })
    });

    /*------------------------------------------
    --------------------------------------------
    show Satuan Code
    --------------------------------------------
    --------------------------------------------*/

    $('body').on('click', '.showSatuan', function () {
    var id = $(this).data('id');
    $.get("{{ route('satuan.index') }}" +'/' + id, function (data) {
    $('#modelHeading').html("Detail satuan");
    $('#saveBtn').val("edit satuan");
    $('#ajaxModel').modal('show');
    $('#id').val(data.id);
    $('#nama_satuan').val(data.nama_satuan).prop('readonly', true);
    })
    });
    /*------------------------------------------
    --------------------------------------------
    Create satuan Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
    e.preventDefault();

    $.ajax({
    data: $('#satuanForm').serialize(),
    url: "{{ route('satuan.store') }}",
    type: "POST",
    dataType: 'json',
    success: function (data) {

    $('#satuanForm').trigger("reset");
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
    Delete Satuan Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteSatuan', function () {

    var id = $(this).data("id");
    confirm("Are You sure want to delete !");

    $.ajax({
    type: "DELETE",
    url: "{{ route('satuan.store') }}"+'/'+id,
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

