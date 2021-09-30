@extends('layouts.admin.main')
@section('content')
<a href="/admin/matkul" class="btn btn-primary mb-3">Kembali</a>
<table class="table table-bordered bg-white text-dark">
    <form action="/admin/matkul/add" method="post">
        @csrf
        <tr>
            <td class="text-center">
                <label class="col-form-label">Nama Mata Kuliah</label>
            </td>
            <td>
                <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror"
                    value="{{ old('name') }}">
                @error('name')
                <label class="invalid-feedback">{{ $message }}</label>
                @enderror
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Kode Mata Kuliah</label>
            </td>
            <td>
                <input type="text" name="kd_matkul" class="form-control @error ('kd_matkul') is-invalid @enderror"
                    value="{{ old('kd_matkul') }}">
                @error('kd_matkul')
                <label class="invalid-feedback">{{ $message }}</label>
                @enderror
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">Tambah Data</button>
            </td>
        </tr>
    </form>
</table>
@endsection