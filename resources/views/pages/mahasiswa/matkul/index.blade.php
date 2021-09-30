@extends('layouts.mahasiswa.main')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('deleted'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('deleted') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Mahasiswa</h1>
</div>
<hr>
<a href="/mahasiswa/matkul/add" class="btn btn-primary mb-4">Tambah Data</a>
<table class="table table-bordered bg-white text-dark">
    <tr class="text-center">
        <th>#</th>
        <th>Nama Mata Kuliah</th>
        <th>Kode Mata Kuliah</th>
        <th>Aksi</th>
    </tr>
    @foreach ($matkulDetail as $item)
    <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->matkul->name }}</td>
        <td>{{ $item->matkul->kd_matkul }}</td>
        <td>
            <form action="/mahasiswa/matkul/{{ $item->id }}/delete" method="post">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="confirm('Yakin Hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection