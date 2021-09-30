@extends('layouts.mahasiswa.main')
@section('content')
<a href="/admin/dashboard" class="btn btn-primary mb-3">Kembali</a>
<table class="table table-bordered bg-white text-dark">
    <form action="/mahasiswa/matkul/add" method="post">
        @csrf
        <tr>
            <td class="text-center">
                <label class="col-form-label">Nama</label>
            </td>
            <td>
                <div>
                    <select class="form-control" name="id_matkul">
                        @foreach ($matkul as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('name')
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