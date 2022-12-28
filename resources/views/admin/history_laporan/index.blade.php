@extends('admin.master')
@section('title', 'List Laporan - RSPB')
@section('content')

<h1>Laporan</h1><br>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form method="GET" action="/admin/history-laporan">
                    <input placeholder="cari nama" type="text" name="keyword"/>
                    <button type="submit">search</button>
                </form>
                <br/>
                <h5 class="card-title">
                    <a href="/laporan/export_excel" class="btn btn-success btn-sm">export</a>
                </h5>
              
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pelapor</th>
                            <th>Unit Lapor </th>
                            <th>Tempat Ruangan</th>
                            <th>Tanggal dan Waktu</th>
                            <th>Perihal Pelaporan</th>
                            <th>Detail Laporan</th>
                            <th>Bukti Pendukung</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->nama }}</td>
                            <td>{{ $hasil->unit_lapor }}</td>
                            <td>{{ $hasil->tempat_ruang }}</td>
                            <td>{{ $hasil->tanggal}}</td>
                            <td>{{ $hasil->perihal}}</td>
                            <td>{{ $hasil->detail}}</td>
                            <td><img src="{{ asset($hasil->bukti) }}" class="img-fluid" style="width:100px" target="_blank"></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
                <br>
                {{ $data->links()}} 
            </div>
        </div>
    </div>
</div>
@endsection