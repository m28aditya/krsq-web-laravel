@extends('layouts.admin.main')
@section('content')
<a href="/admin/dashboard" class="btn btn-primary mb-3">Kembali</a>
<table class="table table-bordered bg-white text-dark">
    <form action="/admin/add" method="post">
        @csrf
        <tr>
            <td class="text-center">
                <label class="col-form-label">Nama</label>
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
                <label class="col-form-label">Username</label>
            </td>
            <td>
                <input type="text" name="username" class="form-control @error ('username') is-invalid @enderror"">
                @error('username')
                <label class=" invalid-feedback">{{ $message }}</label>
                @enderror
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <label class="col-form-label">Password</label>
            </td>
            <td>
                <input type="password" name="password" class="form-control @error ('password') is-invalid @enderror"
                    value="{{ old('password') }}">
                @error('password')
                <label class="invalid-feedback">{{ $message }}</label>
                @enderror
            </td>
        </tr>
        <tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">Tambah Data</button>
            </td>
        </tr>
    </form>
</table>
@endsection