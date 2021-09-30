<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin()
    {
        return view('pages.auth.signin');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        // Cek apakah yang login admin atau user (mahasiswa)
        if (Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/admin/mahasiswa');
        } elseif (Auth::guard('user')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/mahasiswa/biodata');
        }
        return redirect()->back()->with('failed','Username or Password Invalid');
    }
     
    public function logout(Request $request)
    {
        // Cek apakah yang login admin atau user (mahasiswa)
        if(Auth::guard('admin')->check())   
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        elseif(Auth::guard('user')->check())   
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }
}