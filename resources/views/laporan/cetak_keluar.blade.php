<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<table class='table table-bordered' id="nilai">
        <tr>
            <td colspan="5">
                <center>
                    <h5 class="p-4 text-uppercase">Laporan Barang Keluar</h4>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="">Laporan Dicetak Pada Tanggal : {{ $Carbon }}</td>
        </tr>
			<tr>
				<th>No</th>
				<th>Barang</th>
				<th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
			</tr>
			@php $i=1 @endphp
			@foreach ($transaksi as $a)
			<tr>
				<td>{{$i++ }}</td>
				<td>{{$a->nama_barang}}</td>
                <td>{{$a->jumlah}}</td>
                <td>{{$a->harga_barang}}</td>
				<td>{{$a->subtotal}}</td>
			</tr>
			@endforeach
	</table>
    {{-- <h4 class="float-right" id="hasil"></h4>
<script>
		var table = document.getElementById("nilai"), sumHsl = 0;
		for(var t = 1; t < table.rows.length; t++)
		{
			sumHsl = sumHsl + parseInt(table.rows[t].cells[7].innerText);
		}
		document.getElementById("hasil").innerText = sumHsl;

	</script> --}}
</body>
</html>
