@extends('admin.master')
@section('title', 'Dashboard - RSPB')
@section('content')
<h1>DASHBOARD</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bagian</th>
                            <th>Status Pekerjaan</th>
                            <th>Unit pelapor</th>
                            <th>Waktu Laporan Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->perihal }}</td>
                            @if ($hasil->status == "SELESAI DIKERJAKAN")
                            <td style="background-color: green; color: white;">{{ $hasil->status }}</td>
                            @else
                            <td style="background-color: red; color: white;">{{ $hasil->status }}</td>
                            @endif
                            <td>{{ $hasil->unit_lapor }}</td>
                            <td>{{ $hasil->tanggal}}</td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
                <br>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <canvas id="myChart" width="600" height="600"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const data = {!! json_encode($datalap) !!}
    const data2 = {!! json_encode($datares) !!}
    console.log(data2)

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['LAPORAN ',],
            datasets: [{
                label: 'LAPORAN MASUK',
                data: [data],
                backgroundColor: "rgba(0,31,68,0.8)", 
                borderColor: "rgb(167, 105, 0)",
                borderWidth: 1,
            },
            {
                label: 'LAPORAN SELESAI',
                    data: [data2],          
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor:'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    
            },
        ]
        },
        options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection