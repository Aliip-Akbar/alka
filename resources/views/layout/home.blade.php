@extends('layout.main')
@section('isi')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <div class="row">
        <div class="col ">
            <div class="container">
                <h4><strong>Transaksi Masuk</strong></h4>
            </div>
        </div>
        <div class="col ">
            <div class="container">
                <h4><strong>Transaksi Keluar</strong></h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col ">
            <div class="container">
                -
            </div>
        </div>
        <div class="col ">
            <div class="container">
                -
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript">

        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script> --}}
@endsection
