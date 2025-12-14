<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showformlogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // untuk mengambil data untuk attempt
        $credentials = $request->only('username', 'password');

        // Checkbox remember me
        $remember = $request->has('remember');

        // coba login
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // arahkan berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role === 'karyawan') {
                return redirect()->route('karyawan.dashboard');
            }
            // fallback kalo role tidak dikenali
            return redirect()->route('home');
        }

        // kalo gagall login 
        return back()->withErrors([
            'username' => 'Username atau password salah',
        ])->withInput();
    }

    // fungsi logout
    public function logout(Request $request)
    {

        Auth::logout();

        // hancurkan sesi agar semua sesi login bersih
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // setelah itu balikin ke dia ke form login
        return redirect()->route('showformlogin');
    }
}