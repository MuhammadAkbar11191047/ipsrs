@extends('admin.master')
@section('title', 'Edit Unit Lapor - RSPB')

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

<h1>Edit Unit Lapor</h1><br>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="{{ route('unit-lapor.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH ')
                            <div class="position-relative form-group"><label>Unit Lapor</label><input name="nama_unit" type="text" class="form-control" value="{{ $data->unit_lapor }}"></div>
                            <button class="mt-1 btn btn-primary" style="float:right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection