@extends('layout.main')
@section('isi')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<div class="card shadow mb-2 mt-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 col-sm-6 p-2 ui-widget">
                <label for="">Nama Barang</label>
                <input type="hidden" class="form-control" placeholder="" id="kd_trx" name="kd_trx">
                <input type="input" class="form-control typehead" placeholder="" id="nama_barang" name="nama_barang">
            </div>
            <div class="col-md-3 col-sm-6 p-2">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" placeholder="" id="jumlah" name="jumlah">
            </div>
            <div class="col-md-3 col-sm-6 p-2">
                <label for="">Harga Beli</label>
                <input type="text" class="form-control" placeholder="" id="harga_beli" name="harga_beli">
            </div>
            <div class="col-md-1 col-sm-6 p-2 mt-2">
                <label for=""></label>
                <button id="btnAdd" class=" form-control btn btn-primary" placeholder="" value="Input"><i class="fas fa-download"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="coniner">
            <form id="tblData">
                <table name="tblData" class="table table-borderless">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>Hapus</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            &nbsp;
                            <th>Item Total</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>

                    <tfoot>
                        <tr class="table-light">
                            <td>&nbsp;</td>
                            <td colspan="1">Pembeli</td>
                            <td><select name="" id="" class="form-select">
                                <option value="">Piih Pelanggan</option>
                                {{-- @foreach ($pelanggans as $i)
                                <option value="{{ $i->nama_pelanggan }}"></option>
                                @endforeach --}}
                            </select>
                            </td>
                            <td>Subtotal</td>
                            &nbsp;
                            <td><input type="text" name="sub_total" value="0" jAutoCalc="SUM({subtotal})" class="form-control"></td>
                        </tr>
                        <tr class="table-light">
                            <td>&nbsp;</td>
                            <td colspan="1">Metode Pembayaran</td>
                            <td>
                                <select name="" id="" class="form-select">
                                    <option value="">Pilih Metode</option>
                                </select>
                            </td>
                            <td>
                                Diskon:
                            </td>
                            &nbsp;
                            <td><input type="text" name="total_diskon" value="0" class="form-control">
                            </td>
                        </tr>
                        <tr class="table-light">
                            <td colspan="3">&nbsp;</td>
                            <td>
                                Pajak:
                            </td>
                            &nbsp;
                            <td><input type="text" name="Pajak" value="1500" jAutoCalc="" class="form-control">
                            </td>
                        </tr>
                        <tr class="table-light">
                            <td colspan="3">&nbsp;</td>
                            <td>Grand Total</td>
                            &nbsp;
                            <td><input type="text" name="grand_total" value="0" jAutoCalc="{sub_total} - {total_diskon} + {Pajak}" class="form-control"></td>
                        </tr>
                    </tfoot>
                </table>
                <button type="submit" class="btn btn-primary float-right mr-2" id="saveBtn" value="create">Save changes
                </button>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
        var basePath = $("#base_path").val();
    $("#nama_barang").autocomplete({
        source: function(request, cb){
            $.ajax({
                url: 'pembelian/get-data/'+request.term,
                method: 'GET',
                dataType: 'json',
                success: function(res){
                    var result;
                    result = [
                        {
                            label: request.term+ ' Tidak Ditemukan',
                            value: ''
                        }
                    ];

                    console.log(res);


                    if (res.length) {
                        result = $.map(res, function(obj){
                            return {
                                label: obj.nama_barang,
                                value: obj.nama_barang,
                                data : obj
                            };
                        });
                    }
                    cb(result);
                }
            });
        },
        select:function(e, selectedData) {
            console.log(selectedData);

            if (selectedData && selectedData.item && selectedData.item.data){
                var data = selectedData.item.data;
                $('#harga_beli').val(data.harga_beli);
            }
        }
    });
        $("#btnAdd").click(function () {
                var nama_barang = $("#nama_barang").val().trim();
                var jumlah = $("#jumlah").val().trim();
                var harga_beli = $("#harga_beli").val().trim();

                if(nama_barang != "" && jumlah != "" && harga_beli != "" ){
                    if ($("tblData tbody").children().children().children().children().lenght == 1){
                        $("#tblData tr").html("");
                    }

                    var dynamicTr ="<tr class='line_items  table table-grey'><td><input type='button' class='btn btn-danger btn-sm' value='Hapus'></td><td><input name='nama_barang' value="+nama_barang+"></td><td><input type='text' name='jumlah' value="+jumlah+" class='form-control'></td>&nbsp;<td><input type='text' name='harga_beli' value="+harga_beli+" class='form-control' disabled></td>&nbsp;<td><input type='text' name='subtotal' value='0' jAutoCalc='{jumlah} * {harga_beli}' class='form-control'></td></tr>";
                        $("#tblData tbody").append(dynamicTr);
                        $("#nama_barang").val("");
                        $("#jumlah").val("");
                        $("#harga_beli").val("");
                        $(function() {

                        function autoCalcSetup() {
                            $('form#tblData').jAutoCalc('destroy');
                            $('form#tblData tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                            $('form#tblData').jAutoCalc({decimalPlaces: 2});
                        }
                        autoCalcSetup();

                        });
                        $(".btn-sm").click(function () {
                            $(this).parent().parent().remove();
                            if ($("tblData tbody").children().children().children().children().lenght == 0){

                            }
                        });
                } else {
                    alert("Isi Dulu");
                }
            });

            $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Tambah');
            alertify.notify('Data Baru Saja Ditambahkan', 'success', 10, function(){  console.log('dismissed'); });
            var kd_trx = $(this).data("kd_trx");

            $.ajax({
            data: $('#tblData').serialize(),
            url: "{{ route('pembelian.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
        });
    });
});
</script>
@endsection
