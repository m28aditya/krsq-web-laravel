<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return view('pages.admin.home.index',[
            'admin' => $admin
        ]);
    }

    public function addAdmin()
    {
        return view('pages.admin.home.add');
    }
    public function createAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:5|max:255|unique:admins',
            'password' => 'required'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        Admin::create($validatedData);
        return redirect('/admin/dashboard')->with('success','Data berhasil ditambahkan');
    }
    public function detailAdmin($username)
    {
        $admin = Admin::where('username', $username)->first();
        return view('pages.admin.home.detail',[
            'admin' => $admin
        ]);
    }
    public function updateAdmin(Request $request, $username)
    {
        $admin = Admin::where('username', $username)->first();
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:5|max:255|unique:admins',
        ]);
        
        $admin->update($validatedData);
        return redirect('/admin/dashboard')->with('success','Data berhasil diubah');
    }
    public function destroy($username)
    {
        Admin::where('username', $username)->delete();

        return redirect('/admin/dashboard')->with('success','Data berhasil dihapus');
    }
}