@extends('layouts.admin.main')
@section('content')
<div class="row mb-2 mx-2 d-flex">
    <a href="/admin/matkul" class="btn btn-primary mr-auto">Kembali</a>
    <form action="/delete/{{ $matkul->kd_matkul }}/matkul" method="post">
        @csrf
        <button onclick="confirm('Setuju Untuk Menghapus Data?')" type="submit" class="ml-auto btn btn-danger"><i
                class="fas fa-trash mr-2"></i>Hapus</button>
    </form>
</div>
<table class="table table-bordered bg-white text-dark">
    <form action="/admin/matkul/{{ $matkul->id }}/update" method="post">
        @csrf
        <tr>
            <td class="text-center">
                <label class="col-form-label">Nama Mata Kuliah</label>
            </td>
            <td>
                <input type="text" name="name" class="form-control" value="{{ $matkul->name }}">
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Kode Mata Kuliah</label>
            </td>
            <td>
                <input type="text" name="kd_matkul" class="form-control" value="{{ $matkul->kd_matkul }}">
                @error('kd_matkul')
                <h5>{{ $message }}</h5>
                @enderror
            </td>
        </tr>
        <td></td>
        <td>
            <button type="submit" onclick="confirm('Setuju Untuk Mengupdate Data?')" class="btn btn-success">Update
                Data</button>
        </td>
        </tr>
    </form>
</table>
@endsection