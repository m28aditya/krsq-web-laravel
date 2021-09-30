<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use App\Models\MatkulDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatkulController extends Controller
{
    public function index(){
        $mahasiswa = User::where('npm', Auth::guard('user')->user()->npm)->first();
        $matkulDetail = MatkulDetail::with(['mahasiswa','matkul'])->where('npm',$mahasiswa->npm)->get();
        return view('pages.mahasiswa.matkul.index',[
            'matkulDetail' => $matkulDetail
        ]);
    }
    public function addMatkul()
    {
        $matkul = Matkul::all();
        return view('pages.mahasiswa.matkul.add', [
            'matkul'  => $matkul
        ]);
    }
    public function addMatkulDetail(Request $request)
    {
        $mahasiswa = User::where('npm', Auth::guard('user')->user()->npm)->first();
        MatkulDetail::create([
            'npm' => $mahasiswa->npm,
            'id_matkul' => $request->id_matkul
        ]);

        return redirect('/mahasiswa/matkul')->with('success','Data Berhasil Ditambahkan');
    }
    public function destroy($id)
    {
        MatkulDetail::where('id', $id)->delete();
        return redirect('/mahasiswa/matkul')->with('deleted','Data Berhasil diapus');
    }
}