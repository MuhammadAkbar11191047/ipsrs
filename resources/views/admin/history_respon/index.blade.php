@extends('admin.master')
@section('title', 'List Respon - RSPB')
@section('content')

<h1>Respon</h1><br>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form method="GET" action="/admin/history-respon">
                    <input placeholder="cari nama" type="text" name="keyword"/>
                    <button type="submit">search</button>
                </form>
                <br/>
                <h5 class="card-title">
                    <a href="/respon/export_excel" class="btn btn-success btn-sm">export</a>
                </h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bagian</th>
                            <th>Petugas</th>
                            <th>Status Pekerjaan</th>
                            <th>Lokasi</th>
                            <th>Ruangan Yang dikerjakan</th>
                            <th>Nomor Ruangan</th>
                            <th>Estimasi Biaya</th>
                            <th>Perkerjaan Yang Dilakukan</th>
                            <th>Tgl Pengerjaan</th>
                            <th>Bukti Pengerjaan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php 
                        // echo "<pre>";
                        // print_r($data);
                        // echo "</pre>";
                        ?> -->
                        @foreach ($data as $result => $hasil)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $hasil->bagian }}</td>
                            <td>{{ $hasil->petugas}}</td>
                            <td>{{ $hasil->status_pekerjaan }}</td>
                            <td>{{ $hasil->lokasi}}</td>
                            <td>{{ $hasil->ruangan}}</td>
                            <td>{{ $hasil->no_ruangan}}</td>
                            <td>{{ $hasil->biaya}}</td>
                            <td>{{ $hasil->pekerjaan}}</td>
                            <td>{{ $hasil->tanggal}}</td> 
                            <td><img src="{{ asset($hasil->bukti) }}" class="img-fluid" style="width:100px" target="_blank"></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
                <br>
                
            </div>
        </div>
    </div>
</div>
@endsection