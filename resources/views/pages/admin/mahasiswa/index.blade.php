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
    <h1 class="h5 mb-0 text-gray-800">Mahasiswa</h1>
</div>
<hr>
<a href="/admin/mahasiswa/add" class="btn btn-primary mb-4">Tambah Data</a>
<table class="table table-bordered bg-white text-dark">
    <tr class="text-center">
        <th>#</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Aksi</th>
    </tr>
    @foreach ($data as $mahasiswa)
    <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $mahasiswa->name }}</td>
        <td>{{ $mahasiswa->npm }}</td>
        <td>
            <a href="/admin/mahasiswa/{{ $mahasiswa->npm }}/detail">Detail</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection