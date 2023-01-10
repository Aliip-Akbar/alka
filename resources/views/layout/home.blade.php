@extends('layout.main')
@section('isi')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    #chart{
        margin-bottom: 10px;
    }
</style>
<div class="row">
    <div class="col">
        <div class="card shadow" id="chart">
            <div  class="text-center card-body">
                <canvas id="StokChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow" id="chart">
            <div  class="text-center card-body">
                <canvas id="StokChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ url('/chart-data') }}",
            method: 'GET',
            success: function(data) {
                console.log(data);

                var label = [];
                var count = [];

                for (var i in data) {
                    label.push(data[i].nama_barang);
                    count.push(data[i].stok);
                }

                var ctx = $("#StokChart");

                var chartData = {
                    labels: label,
                    datasets: [{
                        label: 'Grafik Stok',
                        backgroundColor: 'transparent',
                        borderColor: 'rgb(255, 99, 132)',
                        data: count
                    }]
                };

                var StokChart = new Chart(ctx, {
                    type: 'line',
                    data: chartData
                });
            }
        });
    });
</script>

@endsection
