<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = Matkul::all();
        return view('pages.admin.matkul.index',[
            'matkul' => $matkul
        ]);
    }

    public function addMatkul()
    {
        return view ('pages.admin.matkul.add');
    }
    public function createMatkul(Request $request)
    {       
        $validatedData = $request->validate([
            'name' => 'required|unique:matkuls',
            'kd_matkul' => 'required|unique:matkuls'
        ]);
        $validatedData['kd_matkul'] = Str::upper($validatedData['kd_matkul']);
        Matkul::create($validatedData);
        return redirect('/admin/matkul')->with('success','Data berhasil ditambahkan');
    }
    
    public function detailMatkul($kd_matkul)
    {
        $matkul = Matkul::where('kd_matkul',$kd_matkul)->first();
        return view ('pages.admin.matkul.detail',[
            'matkul' => $matkul
        ]);
    }
    
    public function updateMatkul(Request $request, $id)
    {
        $matkul = Matkul::where('id', $id)->first();
        
        $validatedData = $request->validate([
            'name' => 'required',
            'kd_matkul' => 'required'
        ]);
        
        $validatedData['kd_matkul'] = Str::upper($validatedData['kd_matkul']);
        
        $matkul->update($validatedData);
        return redirect('/admin/matkul')->with('success','Data berhasil diubah');
    }

    public function destroy($kd_matkul)
    {
        Matkul::where('kd_matkul', $kd_matkul)->delete();

        return redirect('/admin/matkul')->with('success','Data berhasil dihapus');
    }
}