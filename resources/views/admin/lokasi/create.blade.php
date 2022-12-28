@extends('admin.master')
@section('title', 'Tambah Lokasi - RSPB')

@section('content')

@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<h1>Tambah Lokasi</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="{{ route('lokasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group"><label>Lokasi</label><input name="nama_lokasi" type="text" class="form-control"></div>
                            <button class="mt-1 btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection