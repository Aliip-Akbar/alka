@extends('template')
@section('judul', 'Halaman Penjualan')
@section('konten')
<div class="card shadow mb-2">
    <div class="card-header">
        <h6 class="font-weight-bold text-primary">Transaksi / Penjualan <a href="" class="btn btn-sm btn-danger float-right" onclick="alertify.confirm('Cancel button is focused by default.').set('defaultFocus', 'cancel'); "><i class="fas fa-times"></i> Reset Transaksi</a></h6>
    </div>
    <form id="pelangganForm" name="pelangganForm" class="form-horizontal">
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
                <input type="hidden" class="form-control" placeholder="" id="satuan_jual" name="satuan_jual">
                <input type="hidden" class="form-control" placeholder="" id="subtotal" name="subtotal">
            </div>
            <div class="col-md-3 col-sm-6 p-2">
                <label for="">Harga Beli</label>
                <input type="text" class="form-control" placeholder="" id="harga_beli" name="harga_beli">
            </div>
            <div class="col-md-2 col-sm-6 p-2">
                <label for="">Exp Date</label>
                <input type="date" class="form-control" placeholder="" id="ed">
            </div>
            <div class="col-md-1 col-sm-6 p-2 mt-2">
                <label for=""></label>
                <input type="button" id="btnAdd" class=" form-control btn btn-primary" placeholder="" value="Input">
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-2">
    <div class="card-header mb-0">
    <h1 class="h5 text-gray-800 mb-0">Detail Penjualan</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="">
            <table id="tblData" class="table table-bordered data-table table-sm w-80">
                <thead class="table-primary">
                    <tr>
                        <th>Barang</th>
                        <th>Exp Date</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>@</th>
                        <th>Subtotal</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>

        </div>
    </div>
</div>
<div class="card shadow mb-2">
    <div class="card-body">
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-5 ">Tanggal Pembayaran</label>
                        <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" class="form-control">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2 ">Total Harga</label>
                        <input type="number" class="form-control col-lg text-end" id="total" value="0" readonly aria-readonly="true">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2 ">Diskon Toko</label>
                        <input type="number" class="form-control col-lg  text-end" id="diskon" value="0">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2 ">Biaya Ongkir</label>
                        <input type="number" class="form-control col-lg  text-end" id="ongkir" value="0">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-2">Total Belanja</label>
                        <input type="number" class="form-control col-lg  text-end" id="grand_total" value="0" readonly aria-readonly="true">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-3">Pembayaran</label>
                        <input type="number" class="form-control col-lg  text-end" value="0" id="pembayaran">
                    </div>
                    <div class="form-inline  mb-4">
                        <label for="" class="mr-3">Kembalian</label>
                        <input type="number" class="form-control col-lg  text-end" value="0" id="kembalian">
                    </div>
                </div>
                <div class="card-body">
                  <input type="button" value="Simpan transaksi" class="btn btn-lg btn-success float-right">
                </div>
            </div>
        </form>

    </div>
</div>
<script>
    $(document).ready(function(){

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

                $('#satuan_jual').val(data.satuan_jual);
                $('#harga_beli').val(data.harga_beli);
            }
        }
    });

        $("#jumlah, #harga_beli").keyup(function() {
            var harga  = $("#harga_beli").val();
            var jumlah = $("#jumlah").val();
            var subtotal = parseFloat(harga) * parseFloat(jumlah);
            $("#subtotal").val(subtotal);

        });

        $("#grand_total, #pembayaran").keyup(function() {
            var grand_total  = $("#grand_total").val();
            var pembayaran = $("#pembayaran").val();
            var kembalian = parseFloat(grand_total) - parseFloat(pembayaran);
            $("#kembalian").val(kembalian);

        });

        $("#total, #diskon, #ongkir").keyup(function() {
            var diskon  = $("#diskon").val();
            var total = $("#total").val();
            var ongkir = $("#ongkir").val();

            var grand_total = parseInt(total) - parseInt(diskon) + parseInt(ongkir) || parseInt(total) - parseInt(diskon) || parseInt(total) + parseInt(ongkir);
            $("#grand_total").val(grand_total);

        });

        $("#btnAdd").click(function () {
                var nama_barang = $("#nama_barang").val().trim();
                var jumlah = $("#jumlah").val().trim();
                var subtotal = $("#subtotal").val().trim();
                var satuan_jual = $("#satuan_jual").val().trim();
                var harga_beli = $("#harga_beli").val().trim();
                var exp_date = $("#ed").val().trim();

                if(nama_barang != "" && jumlah != "" && harga_beli != "" && exp_date != ""){
                    if ($("tblData tbody").children().children().children().children().lenght == 1){
                        $("#tblData tbody").html("");
                    }

                    var dynamicTr = "<tr><td>"+ nama_barang +"</td><td>"+ exp_date +"</td><td>"+ jumlah +"</td><td>"+satuan_jual+"</td><td>"+ harga_beli +"</td><td>"+ subtotal +"</td><td> <button class='btn btn-danger btn-sm'>Delete</button></tr>";
                        $("#tblData tbody").append(dynamicTr);
                        $("#barang").val("");
                        $("#jumlah").val("");
                        $("#subtotal").val("");
                        $("#satuan_jual").val("");
                        $("#harga_beli").val("");
                        $("#ed").val("");
                        $(".btn-sm").click(function () {
                            $(this).parent().parent().remove();
                            if ($("tblData tbody").children().children().children().children().lenght == 0){

                            }
                        });
                } else {
                    alert("Isi Dulu");
                }
            });
     });
    </script>
@endsection
