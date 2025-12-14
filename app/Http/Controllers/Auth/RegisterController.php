<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    public function showformregister()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nama'             => 'required|string|max:100',
            'username'         => 'required|string|max:50|unique:users,username',
            'email'            => 'required|email|unique:d_karyawan,email',
            'tempat_lahir'     => 'required|string|max:100',
            'tanggal_lahir'    => 'required|date',
            'no_hp'            => 'required|string|max:20',
            'alamat'           => 'required|string',
            'password'         => 'required|min:6|confirmed',
        ]);

        DB::transaction(function () use ($request) {

            // 1. SIMPAN USER (LOGIN)
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role'     => 'karyawan',
            ]);

            // 2. SIMPAN DATA KARYAWAN
            Karyawan::create([
                'user_id'       => $user->id,
                'nama'          => $request->nama,
                'email'         => $request->email,
                'tempat_lahir'  => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp'         => $request->no_hp,
                'alamat'        => $request->alamat,
            ]);
        });

        return redirect()
            ->route('showformlogin')
            ->with('success', 'Registrasi berhasil, silakan login.');
    }
}