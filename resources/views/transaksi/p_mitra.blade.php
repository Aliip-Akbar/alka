@extends('layout.main')
@section('isi')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<div class="card mb-2 mt-4" id="hide">
    <div class="card-body">
        <form id="transaksi">
            <div class="row">
            <div class="col-md-4 col-sm-6 p-2 ui-widget">
                <label for="">Nama Barang</label>
                <input type="hidden" name="id" id="id">
                <input type="hidden" class="form-control" placeholder="" id="kd_trx" name="kd_trx" value="">
                <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="Transaksi Mitra">
                <input type="hidden" class="form-control" id="j_transaksi" name="j_transaksi" value="Transaksi Barang Keluar">
                <input type="input" class="form-control typehead" placeholder="" id="nama_barang" name="nama_barang" value="">
            </div>
            <div class="col-md-3 col-sm-6 p-2">
                <label for="">Jumlah</label>
                <input type="hidden" name="stok_sekarang" id="stok_sekarang">
                <input type="number" class="form-control" placeholder="" id="jumlah" name="jumlah" value="">
                <input type="hidden" name="stok" id="stok">
            </div>
            <div class="col-md-4 col-sm-6 p-2">
                <label for="">Harga Beli</label>
                <input type="number" class="form-control" placeholder="" id="harga_barang" name="harga_barang" value="">
                <input type="hidden" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Barang" value="">
                <input type="hidden" class="form-control" id="harga_normal" name="harga_normal" placeholder="Masukkan Harga Barang" value="">
                <input type="hidden" class="form-control" id="harga_mitra" name="harga_mitra" placeholder="Masukkan Harga Barang" value="">
                <input type="hidden" class="form-control" id="harga_grosir" name="harga_grosir" placeholder="Masukkan Harga Barang" value="">
                <input type="hidden" class="form-control" id="tgl_exp" name="tgl_exp" placeholder="Masukkan Harga Barang" value="">
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
<div class="card">
    <div class="card-body table-responsive">
        <form id="tblData">
            <table name="tblData" class="table table-borderless">
                <thead>
                    <tr id="judul" style="display:none;">
                        <th colspan="5">
                                <div class="col text-center">
                                    <h1 class="m-0 pt-3"><strong>TOKO SAYA</strong></h1>
                                    <h6 class="m-0 p-0">Jl.SetiaBudi No.212</h6>
                                    <h5 class="m-0 p-0">Terima kasih Telah berbelanja di Toko Kami</h5>
                                </div>
                        </th>
                    </tr>
                    <tr id="struk" style="display: none;">
                        <th colspan="5">
                            <div class="d-flex justify-content-start"><input value="Struk Transaksi No" class="form-control col-4"><strong class="mt-2">:</strong><input type="text" name="trx_id" id="trx_id" value="" class="form-control">
                        </div>
                    </th>
                    </tr>
                    <tr class="bg-primary text-light" id="inv">
                        <th id="cols" width="15%">Hapus</th>
                        <th id="size">Nama Barang</th>
                        <th id="sizeJ" width="10%" class="text-end">Jumlah</th>
                        <th width="15%" class="text-end">Harga</th>
                        <th width="15%" class="text-end">Item Total</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>

                <tfoot>
                    <tr>
                        <td  class="text-start" id="sizeJ">Pembeli :</td>
                        <td  ><select name="nama" id="nama" class="form-select">
                            <option>-- Piih Pelanggan --</option>
                            @foreach ($pelanggans as $i)
                            <option value="{{ $i->nama_pelanggan }}">{{ $i->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td class="text-end" id="sizeJ">Total       :</td>
                        <td colspan="2"><input type="text" id='total' name="total" value="0" jAutoCalc="SUM({item_total})" class="form-control text-end"></td>
                    </tr>
                    <tr>
                        <td  class="text-start">Tanggal Transaksi :</td>
                        <td >
                            <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control">
                            <input type="hidden" name="keterangan" id="keterangan" value="Transaksi Mitra">
                            <input type="hidden" class="form-control" id="j_transaksi" name="j_transaksi" value="Transaksi Barang Keluar">
                        </td>
                        <td class="text-end">
                            Diskon      :
                        </td>
                        <td colspan="2">
                            <input type="text" id="diskon" name="diskon" value="0" placeholder="0" class="form-control text-end">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end">
                            Pajak :
                        </td>
                        <td colspan="2">
                            <input type="text" id="biaya_tambahan" name="biaya_tambahan" value="0" placeholder="0" class="form-control text-end">
                        </td>
                       </tr>
                    </tr>
                    <tr class="line_items">
                        <td colspan="3" class="text-end">Grand Total :</td>
                        <td colspan="2"><input type="text" jAutoCalc="{total} - {diskon} + {biaya_tambahan}" name="grand_total" value="" placeholder="0" class="form-control text-end"></td>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn btn-primary float-right mr-2" id="saveBtn" value="create">Save changes
            </button>
        </form>
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

        $("#jumlah, #harga_beli").keyup(function() {
            var harga  = $("#harga_beli").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#item_total").val(total);
        });
        $("#jumlah, #stok_sekarang").keyup(function() {
            var stok  = $("#stok_sekarang").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(stok) - parseInt(jumlah);
            $("#stok").val(total);
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
  $.ajax({
      data: $('#transaksi').serialize(),
      url: "{{ route('stok.store') }}",
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
                url: 'stok/get-data/'+request.term,
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
                $('#id').val(data.id);
                $('#harga_beli').val(data.harga_beli);
                $('#harga_barang').val(data.harga_beli);
                $('#harga_normal').val(data.harga_normal);
                $('#harga_mitra').val(data.harga_mitra);
                $('#harga_grosir').val(data.harga_grosir);
                $('#tgl_exp').val(data.tgl_exp);
                $('#stok_sekarang').val(data.stok);
            }
        }
    });
    $("#subtotal, #diskon, #pajak").keyup(function() {
            var subtotal  = $("#subtotal").val();
            var diskon = $("#diskon").val();
            var pajak = $("#pajak").val();

            var total = parseInt(subtotal) - parseInt(diskon) + parseInt(pajak) || parseInt(subtotal) + parseInt(pajak) - parseInt(diskon)
            || parseInt(subtotal) + parseInt(pajak) || parseInt(subtotal) - parseInt(diskon);
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

                    var dynamicTr ="<tr class='line_items'><td id='cols'><button class='btn btn-danger btn-sm' value='Hapus'><i class='fas fa-minus-circle'></i></button></td><td><span>"+nama_barang+"</span></td><td><center><input type='text' id='dyjumlah' name='jumlah' value="+jumlah+" class='form-control text-end'></td></center><td><input type='text' id='dyharga_barang' name='harga_barang' value="+harga_barang+" class='form-control text-end' disabled></td>&nbsp;<td><input type='text' class='form-control text-end' name='item_total' jAutoCalc='{jumlah} * {harga_barang}' value=''></td></tr>";
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
                    swal("Sepertinya Ada Data Yang Masih Kosong!", "Tolong Isi Dulu Yaaa!", "info");
                }
            });

            $('#saveBtn').click(function (e) {
            e.preventDefault();
            $.ajax({
            data: $('#tblData').serialize(),
            url: "{{ route('detailtrx.store') }}",
            type: "POST",
            title:"Struk Baru",
            dataType: 'json',
            success: function (data) {
                $('#hide').remove();
                $('#shadow').css("shadow", "none");
                $('.sidebar, .navbar, .sticky-footer').css("display", "none");
                $('.table').addClass('table-bordered');
                $('#judul').css("display", "table-row");
                $('#struk').css("display", "table-row");
                $('#trims').css("display", "table-row");
                $('#size').css("width", "15%");
                $('#sizeJ').css("width", "15%");
                $('th#cols').remove();
                $('td#cols').remove();
                $('.btn').remove();
                $('.card').css('width','60%');
                $('#hapus').css("display", "none");
                $(".form-control, .form-select, .card").css("border-top-style", "hidden");
                $(".form-control, .form-select, .card").css("border-bottom-style", "hidden");
                $(".form-control, .form-select, .card").css("border-right", "hidden");
                $(".form-control, .form-select, .card").css("border-left-style", "hidden");
                print(data);
                location.reload(true);
                console.log('success:', data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        });
});
</script>
@endsection
