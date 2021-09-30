@extends('layouts.admin.main')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Mata Kuliah</h1>
</div>
<hr>
<a href="/admin/matkul/add" class="btn btn-primary mb-4">Tambah Data</a>
<table class="table table-bordered bg-white text-dark">
    <tr class="text-center">
        <th>#</th>
        <th>Nama Mata Kuliah</th>
        <th>Kode Mata Kuliah</th>
        <th>Aksi</th>
    </tr>
    @foreach ($matkul as $data)
    <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->kd_matkul}}</td>
        <td>
            <a href="/admin/matkul/{{ $data->kd_matkul }}/detail">Detail</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection