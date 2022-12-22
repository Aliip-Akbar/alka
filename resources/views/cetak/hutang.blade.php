@extends('layout.main')
@section('isi')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <div class="card shadow mt-4">
        <div class="card-header">
            <h1 class="h5 text-gray-800">Data Hutang</h1>
            <h6 class="m-0 font-weight-bold text-primary">Data Master / Data Hutang</h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless data-table table-sm">
                <thead class="bg-primary text-light">
                    <tr>
                        <th width="10px">#</th>
                        <th>Nama</th>
                        <th>Jumlah Hutang</th>
                        <th>Total Bayar</th>
                        <th>Sisa Hutang</th>
                        <th>Status</th>
                        <th>Action</th>
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
                            <form action="" id="HutangForm" name="HutangForm">
                            <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="name" class="col-sm control-label">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Hutang" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name" class="control-label col-sm">Jumlah Hutang</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="jumlah_hutang" name="jumlah_hutang" placeholder="Masukkan Harga Hutang" value="" maxlength="50" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name" class="col-sm control-label">Total Bayar</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Masukkan Harga Hutang" value="" maxlength="50" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name" class="col-sm control-label">Sisa Hutang</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" jAutoCalc="{jumlah_hutang} - {total_bayar}" id="sisa_hutang" name="sisa_hutang" placeholder="Masukkan Harga Hutang" value="" maxlength="50" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name" class="col-sm control-label">Status</label>
                                                <div class="col-sm-12">
                                                    <select name="status" id="status" class="form-select">
                                                        <option value="Lunas">Lunas</option>
                                                        <option value="Belum Lunas">Belum Lunas</option>
                                                    </select>
                                                </div>
                                            </div>
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
            function autoCalcSetup() {
                            $('form#HutangForm').jAutoCalc('destroy');
                            $('form#HutangForm').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                            $('form#HutangForm').jAutoCalc({decimalPlaces: 2});
                        }
                        autoCalcSetup();

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
        ajax: "{{ route('hutang.index') }}",
        columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nama', name: 'nama'},
        {data: 'jumlah_hutang', name: 'jumlah_hutang'},
        {data: 'total_bayar', name: 'total_bayar'},
        {data: 'sisa_hutang', name: 'sisa_hutang'},
        {data: 'status', name: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false},

        ]
        });

        /*------------------------------------------
        --------------------------------------------
        Click to Button
        --------------------------------------------
        --------------------------------------------*/
        $('#createNewHutang').click(function () {
        $('#saveBtn').val("create-Hutang");
        $('#id').val('');
        $('#HutangForm').trigger("reset");
        $('#modelHeading').html("Tambah Hutang Baru");
        $('#ajaxModel').modal('show');
        });

        /*------------------------------------------
        --------------------------------------------
        Click to Edit Button
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '.editHutang', function () {
        var id = $(this).data('id');
        $.get("{{ route('hutang.index') }}" +'/' + id +'/edit', function (data) {
        $('#modelHeading').html("Edit Hutang");
        $('#saveBtn').val("edit Hutang");
        $('#generate').css("display", "none");
        $('#kd_class').addClass('col-sm-12');
        $('#ajaxModel').modal('show');
        $('#id').val(data.id);
        $('#kd_Hutang').val(data.kd_Hutang).prop('readonly', true);
        $('#nama').val(data.nama).prop('readonly', false);
        $('#jumlah_hutang').val(data.jumlah_hutang).attr("disabled", false);
        $('#total_bayar').val(data.total_bayar).attr("disabled", false);
        $('#sisa_hutang').val(data.sisa_hutang).prop('readonly', false);
        $('#status').val(data.status).prop('readonly', false);

        })
        });
        /*------------------------------------------
        --------------------------------------------
        Create Hutang Code
        --------------------------------------------
        --------------------------------------------*/
        $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Tambah');
        var id = $(this).data("id");

        $.ajax({
        data: $('#HutangForm').serialize(),
        url: "{{ route('hutang.store') }}",
        type: "POST",
        dataType: 'json',
        success: function (data) {

        $('#HutangForm').trigger("reset");
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
        Delete Hutang Code
        --------------------------------------------
        --------------------------------------------*/
        $('body').on('click', '.deleteHutang', function () {
            var id = $(this).data("id");
            if(confirm("Yakin Mau Dihapus")){
                $.ajax({
        type: "DELETE",
        url: "{{ route('hutang.store') }}"+'/'+id,
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
