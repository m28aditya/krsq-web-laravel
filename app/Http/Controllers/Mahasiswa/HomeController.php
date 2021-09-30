<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\MatkulDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $mahasiswa = User::where('npm', Auth::guard('user')->user()->npm)->first();
        $countMatkul = MatkulDetail::where('npm', $mahasiswa->npm)->count();
        
        return view('pages.mahasiswa.home.index', [
            'countMatkul' => $countMatkul,
            'mahasiswa' => $mahasiswa
        ]);
    }
    public function updateMahasiswa(Request $request, $npm)
    {
        $mahasiswa = User::where('npm', $npm)->first();
        
        if ($request->password == null){
            $mahasiswa->update([
                'username' =>$request->username,
                'password' =>$mahasiswa->password
            ]);
            return redirect('/mahasiswa/biodata')->with('success','Data Berhasil Diupdate');
        }
        $mahasiswa->update([
                    'username' =>$request->username,
                    'password' =>bcrypt($request->password)
                ]);
        return redirect('/mahasiswa/biodata')->with('success','Data Berhasil Diupdate');
    }
}
