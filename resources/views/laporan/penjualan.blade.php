<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Transaksi Masuk</h4>
	</center>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Transaksi</th>
				<th>Barang</th>
				<th>Jumlah</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach ($transaksi as $a)
			<tr>
				<td>{{ $i++ }}</td>
                <td>{{$a->kd_trx}}</td>
				<td>{{$a->nama_barang}}</td>
                <td>{{$a->jumlah}}</td>
				<td>{{$a->subtotal}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
