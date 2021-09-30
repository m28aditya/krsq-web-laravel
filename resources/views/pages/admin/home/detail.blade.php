@extends('layouts.admin.main')
@section('content')
<div class="row mb-2 mx-2 d-flex">
    <a href="/admin/dashboard" class="btn btn-primary mr-auto">Kembali</a>
    <form action="/delete/{{ $admin->username }}/admin" method="post">
        @csrf
        <button onclick="confirm('Setuju Untuk Menghapus Data?')" type="submit" class="ml-auto btn btn-danger"><i
                class="fas fa-trash mr-2"></i>Hapus</button>
    </form>
</div>
<table class="table table-bordered bg-white text-dark">
    <form action="/admin/{{ $admin->username }}/update" method="post">
        @csrf
        <tr>
            <td class="text-center">
                <label class="col-form-label">Nama</label>
            </td>
            <td>
                <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Username</label>
            </td>
            <td>
                <input type="text" name="username" class="form-control" value="{{ $admin->username }}">
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