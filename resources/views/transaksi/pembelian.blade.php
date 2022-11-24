@extends('template')
@section('judul', 'Halaman Penjualan')
@section('konten')
<div class="card shadow mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 col-sm-6 p-2">
                <label for="">Nama Barang</label>
                <input type="hidden" class="form-control" placeholder="" id="id" name="id">
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
                <input type="button" id="btnAdd" class=" form-control btn btn-primary" placeholder="" value="Input">
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <form id="tblData">
            <table name="tblData" class="table table-borderless">
                <thead>
                    <tr class="table-dark text-dark">
                        <th>Hapus</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        &nbsp;
                        <th>Item Total</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>

                <tfoot>
                    <tr class="table-light">
                        <td colspan="3">&nbsp;</td>
                        <td>Subtotal</td>
                        &nbsp;
                        <td><input type="text" name="sub_total" value="0" jAutoCalc="SUM({item_total})" class="form-control"></td>
                    </tr>
                    <tr class="table-light">
                        <td colspan="3">&nbsp;</td>
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
        </form>
    </div>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
	<script type="text/javascript">

var basePath = $("#base_path").val();
    //Array of Values
    $("#nama_barang").autocomplete({
        source: function(request, cb){
            $.ajax({
                url: basePath+'/get-data/'+request.term,
                method: 'GET',
                dataType: 'json',
                success: function(res){
                    var result;
                    result = [
                        {
                            label: 'There is no matching record found for '+request.term,
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
		<!--
        $("#btnAdd").click(function () {
                var nama_barang = $("#nama_barang").val().trim();
                var jumlah = $("#jumlah").val().trim();
                var harga_beli = $("#harga_beli").val().trim();

                if(nama_barang != "" && jumlah != "" && harga_beli != "" ){
                    if ($("tblData tbody").children().children().children().children().lenght == 1){
                        $("#tblData tr").html("");
                    }

                    var dynamicTr ="<tr class='line_items  table table-grey'><td><input type='button' class='btn btn-danger btn-sm' value='Hapus'></td><td><span>"+nama_barang+"</span></td><td><input type='text' name='qty' value="+jumlah+" class='form-control'></td>&nbsp;<td><input type='text' name='price' value="+harga_beli+" class='form-control' disabled></td>&nbsp;<td><input type='text' name='item_total' value='0' jAutoCalc='{qty} * {price}' class='form-control'></td></tr>";
                        $("#tblData tbody").append(dynamicTr);
                        $("#barang").val("");
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
	</script>
@endsection
