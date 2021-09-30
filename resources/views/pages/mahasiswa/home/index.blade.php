@extends('layouts.mahasiswa.main')
@section('content')
<table class="table table-bordered bg-white text-dark">
    <form action="/mahasiswa/{{ $mahasiswa->npm }}/update" method="post">
        @csrf
        <tr>
            <small>*Jika ada kesalahan harap hubungi admin</small>
        </tr>
        <tr>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
        </tr>
        <tr>
            <td class="text-center">
                <label class="col-form-label">Nama</label>
            </td>
            <td>
                <label class="col-form-label">{{ $mahasiswa->name }}</label>
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">NPM</label>
            </td>
            <td>
                <label class="col-form-label">{{ $mahasiswa->npm }}</label>
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Kelas</label>
            </td>
            <td>
                <label class="col-form-label">{{ $mahasiswa->kelas }}</label>
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Jumlah Mata Kuliah</label>
            </td>
            <td>
                <label class="col-form-label">{{ $countMatkul }}</label>
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Username</label>
            </td>
            <td>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $mahasiswa->username }}">
            </td>
        </tr>

        <tr>
            <td class="text-center">
                <label class="col-form-label">Password</label>
            </td>
            <td>
                <input type="password" name="password" class="form-control" placeholder="Jangan diisi jika tidak ingin diubah">
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