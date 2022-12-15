@extends('layout.main')
@section('isi')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<div class="card shadow mb-2 mt-4">
    <div class="card-body">
           <form id="transaksi">
            <div class="row">
            <div class="col-md-4 col-sm-6 p-2 ui-widget">
                <label for="">Nama Barang</label>
                <input type="hidden" name="id" id="id">
                <input type="hidden" class="form-control" placeholder="" id="kd_trx" name="kd_trx" value="">
                <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="Transaksi Masuk">
                <input type="hidden" class="form-control" id="j_transaksi" name="j_transaksi" value="Transaksi Barang Masuk">
                <input type="input" class="form-control typehead" placeholder="" id="nama_barang" name="nama_barang" value="">
            </div>
            <div class="col-md-3 col-sm-6 p-2">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" placeholder="" id="jumlah" name="jumlah" value="">
            </div>
            <div class="col-md-4 col-sm-6 p-2">
                <label for="">Harga Beli</label>
                <input type="number" class="form-control" placeholder="" id="harga_barang" name="harga_barang" value="">
                <input type="hidden" class="form-control" placeholder="" id="item_total" name="subtotal" value="">
            </div>
            <div class="col-md-1 p-2 mt-2">
                <label for=""></label>
                <button id="btnAdd" class=" form-control btn btn-primary" placeholder="" value="Input"><i class="fas fa-download"></i></button>
            </div>
        </div>
    </form>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="container">
            <form id="tblData">
                <table name="tblData" class="table table-borderless">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>Hapus</th>
                            <th>Nama Barang</th>
                            <th class="text-end" width="10%">Jumlah</th>
                            <th class="text-end">Harga</th>
                            &nbsp;
                            <th class="text-end">Item Total</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>

                    <tfoot>
                        <tr class="table-light line_items">
                            <td colspan="1">Tanggal Transaksi</td>
                            <input type="hidden" name="trx_id" id="trx_id" value="">
                            <input type="hidden" name="stok_sekarang" id="stok_sekarang">
                            <input type="hidden" name="stok" id="stok">
                            <input type="hidden" class="form-control" id="j_transaksi" name="j_transaksi" value="Transaksi Barang Masuk" maxlength="50" required>
                            <td>
                            <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi">
                            <input type="hidden" class="form-control" name="nama" id="nama" value="{{ $user->name }}">
                            </td>
                            <td>&nbsp;</td>
                            <td class="text-end">Total:</td>
                            &nbsp;
                            <td class="text-end"><input type="text" id='total' name="total" value="0" jAutoCalc="SUM({item_total})" class="form-control text-end"></td>
                        </tr>
                        <tr class="table-light">
                            <td colspan="1">Keterangan</td>
                            <td>
                                <textarea name="keterangan" id="keterangan" cols="5" rows="3" class="form-control" style="resize: none;"></textarea>
                            </td>
                            <td>&nbsp;</td>
                            <td class="text-end">
                                Diskon:
                            </td>
                            &nbsp;
                            <td class="text-end"><input type="text" id="diskon" name="diskon" value="0" placeholder="0" class="form-control text-end">
                            </td>
                        </tr>
                        <tr class="table-light line_items">
                            <td colspan="3">&nbsp;</td>
                            <td class="text-end">
                                Ongkir:
                            </td>
                            &nbsp;
                            <td class="text-end"><input type="text" id="biaya_tambahan" name="biaya_tambahan" value="0" placeholder="0" class="form-control text-end">
                            </td>
                        </tr>
                        <tr class="line_items">
                            <td colspan="3">&nbsp;</td>
                            <td class="text-end">Grand Total</td>
                            &nbsp;
                            <td><input type="text" jAutoCalc="{total} - {diskon} + {biaya_tambahan}" name="grand_total" value="" placeholder="0" class="form-control
                                text-end"></td>
                        </tr>
                    </tfoot>
                </table>
                <input type="submit" class="btn btn-primary float-right mr-2" id="saveBtn" value="Simpan">
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
	<script type="text/javascript">
    $(function () {
$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
});
$(function() {
  var randomnumber = Math.floor(Math.random() * 10000)
  var kd = 'In-';
  var kd_trx = kd + randomnumber;
  $('#trx_id').val(kd_trx);
  $('#kd_trx').val(kd_trx);
});

$("#stok_sekarang, #jumlah").keyup(function() {
            var s_sekarang  = $("#stok_sekarang").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(s_sekarang) * parseInt(jumlah);
            $("#stok").val(total);
        });

$("#jumlah, #harga_barang").keyup(function() {
            var harga  = $("#harga_barang").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#item_total").val(total);
        });
$('#btnAdd').click(function (e) {
    e.preventDefault();
    $.ajax({
      data: $('#transaksi').serialize(),
      url: "{{ route('pembelian.store') }}",
      type: "POST",
      dataType: 'json',
      success: function (data) {
        console.log('SUCCESS:', data);
      },
      error: function (data) {
          console.log('Error:', data);
      }
  });
});
});
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
                            label: request.term+ 'Tidak Ditemukan',
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
                $('#harga_barang').val(data.harga_beli);
                $('#stok_sekarang').val(data.stok);
            }
        }
    });
    $("#subtotal, #diskon, #biaya_tambahan").keyup(function() {
            var subtotal  = $("#subtotal").val();
            var diskon = $("#diskon").val();
            var biaya_tambahan = $("#biaya_tambahan").val();

            var total = parseInt(subtotal) - parseInt(diskon) + parseInt(biaya_tambahan) || parseInt(subtotal) + parseInt(biaya_tambahan) - parseInt(diskon)
            || parseInt(subtotal) + parseInt(biaya_tambahan) || parseInt(subtotal) - parseInt(diskon);
            $("#grand_total").val(total);
        });

    $("#btnAdd").click(function () {
                var nama_barang = $("#nama_barang").val().trim();
                var jumlah = $("#jumlah").val().trim();
                var harga_barang = $("#harga_barang").val().trim();

                if(nama_barang != "" && jumlah != "" && harga_barang != "" ){
                    if ($("tblData tbody").children().children().children().children().lenght == 1){
                        $("#tblData tr").html("");
                    }

                    var dynamicTr ="<tr class='line_items  table table-grey'><td><input type='button' class='btn btn-danger btn-sm' value='Hapus'></td><td><span>"+nama_barang+"</span></td><td><input type='text' id='dyjumlah' name='jumlah' value="+jumlah+" class='form-control text-end'></td>&nbsp;<td><input type='text' id='dyharga_barang' name='harga_barang' value="+harga_barang+" class='form-control text-end' disabled></td>&nbsp;<td><input type='text' class='form-control text-end' name='item_total' jAutoCalc='{jumlah} * {harga_barang}' value=''></td></tr>";
                        $("#tblData tbody").append(dynamicTr);
                        $("#barang").val("");
                        $("#jumlah").val("");
                        $("#harga_barang").val("");
                        $("#item_total").val("");
                        $(function() {

                        function autoCalcSetup() {
                            $('form#tblData').jAutoCalc('destroy');
                            $('form#tblData .line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                            $('form#tblData').jAutoCalc({decimalPlaces: 2});
                        }
                        autoCalcSetup();


                        $(".btn-sm").click(function(e) {
				        e.preventDefault();

                        var form = $(this).parents('form#tblData')
                        $(this).parents('tr').remove();
                        autoCalcSetup();
                        });
                    });
                } else {
                    swal("Ada Data Yang Masih Kosong!", "Tolong Isi Dulu Yaaa!", "error");
                }
            });

            $('#saveBtn').click(function (e) {
            e.preventDefault();
            $.ajax({
            data: $('#tblData').serialize(),
            url: "{{ route('detailtrx.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                console.log('success:', data);
                location.reload(),
                swal("Teransaksi Berhasil!", "", "success");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        });
});
</script>
@endsection
