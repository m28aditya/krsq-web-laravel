<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view ('pages.admin.mahasiswa.index', [
            'data' => $data
        ]);
    }
    
    public function addMahasiswa()
    {
        return view ('pages.admin.mahasiswa.add');
    }

    public function createMahasiswa(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'npm' => 'required|min:8|max:8|unique:users',
            'kelas' => 'required',
            'username' => 'required|min:5|max:255|unique:users',
            'password' => 'required'
        ]);
        $validatedData['kelas'] = Str::upper($validatedData['kelas']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        return redirect('/admin/mahasiswa')->with('success','Data berhasil ditambahkan');
    }

    public function detailMahasiswa($npm)
    {
        $mahasiswa = User::where('npm', $npm)->first();
        return view('pages.admin.mahasiswa.detail',[
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function updateMahasiswa(Request $request, $npm)
    {
        $mahasiswa = User::where('npm', $npm)->first();
        $validatedData = $request->validate([
            'name' => 'required',
            'npm' => 'required|min:8|max:8',
            'kelas' => 'required',
            'username' => 'required|min:5|max:255',
        ]);
        $validatedData['kelas'] = Str::upper($validatedData['kelas']);
        
        $mahasiswa->update($validatedData);
        return redirect('/admin/mahasiswa')->with('success','Data berhasil diubah');
    }

    public function destroy($npm)
    {
        User::where('npm', $npm)->delete();

        return redirect('/admin/mahasiswa')->with('success','Data berhasil dihapus');
    }
}