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
    <h1 class="h5 mb-0 text-gray-800">Admin</h1>
</div>
<hr>
<a href="/admin/add" class="btn btn-primary mb-4">Tambah Data</a>
<table class="table table-bordered bg-white text-dark">
    <tr class="text-center">
        <th>#</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Aksi</th>
    </tr>
    @foreach ($admin as $data)
    <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->username }}</td>
        <td>
            <a href="/admin/{{ $data->username }}/detail">Detail</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection