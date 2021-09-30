@extends('layouts.admin.main')
@section('content')
<div class="row mb-2 mx-2 d-flex">
    <a href="/admin/mahasiswa" class="btn btn-primary mr-auto">Kembali</a>
    <form action="/delete/{{ $mahasiswa->npm }}/mahasiswa" method="post">
        @csrf
        <button onclick="confirm('Setuju Untuk Menghapus Data?')" type="submit" class="ml-auto btn btn-danger"><i
                class="fas fa-trash mr-2"></i>Hapus</button>
    </form>
</div>
<table class="table table-bordered bg-white text-dark">
    <form action="/admin/mahasiswa/{{ $mahasiswa->npm }}/update" method="post">
        @csrf
        <tr>
            <td class="text-center">
                <label class="col-form-label">Nama</label>
            </td>
            <td>
                <input type="text" name="name" class="form-control" value="{{ $mahasiswa->name }}">
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">NPM</label>
            </td>
            <td>
                <input type="text" name="npm" class="form-control" value="{{ $mahasiswa->npm }}">
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Kelas</label>
            </td>
            <td>
                <input type="text" name="kelas" class="form-control" value="{{ $mahasiswa->kelas }}">
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Username</label>
            </td>
            <td>
                <input type="text" name="username" class="form-control" value="{{ $mahasiswa->username }}">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" onclick="confirm('Setuju Untuk Mengupdate Data?')" class="btn btn-success">Update
                    Data</button>
            </td>
        </tr>
    </form>
</table>
@endsection