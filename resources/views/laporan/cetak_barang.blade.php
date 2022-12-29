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
            <td colspan="8">
                <center>
                    <h5 class="p-4 text-uppercase">Laporan Stok Barang</h4>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <p class="p-0 m-0">Laporan Dicetak Pada Tanggal : {{ $Carbon }}</p>
            </td>
        </tr>
			<tr>
				<th>No</th>
				<th>Kode Barang</th>
                <th>Tanggal Expired</th>
                <th>Nama Barang</th>
				<th>Kategori</th>
                <th>Satuan</th>
				<th>Harga</th>
                <th>Stok</th>
			</tr>
			@php $i=1 @endphp
			@foreach ($Barang as $a)
			<tr>
				<td>{{ $i++ }}</td>
                <td>{{$a->kd_barang}}</td>
                <td>{{$a->exp_date}}</td>
                <td>{{$a->nama_barang}}</td>
                <td>{{$a->kategori}}</td>
				<td>{{$a->satuan_beli}}</td>
                <td>{{$a->harga_beli}}</td>
                <td>{{$a->stok}}</td>
			</tr>
			@endforeach
	</table>
</body>
</html>
