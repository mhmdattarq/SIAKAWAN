<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanIzin;
use App\Models\d_absensi_hari_ini;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PengajuanIzinKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = PengajuanIzin::all();
        return view('karyawan.pages.pengajuan-izin', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_izin'      => 'required|string',
            'alasan'          => 'required|string|min:10',
        ]);

        $user = Auth::user();

        $mulai   = Carbon::parse($request->tanggal_mulai);
        $selesai = Carbon::parse($request->tanggal_selesai);

        // ==========================
        // ❌ CEK BENTROK ABSENSI
        // ==========================
        $adaAbsensi = d_absensi_hari_ini::where('user_id', $user->id)
            ->whereBetween('tanggal', [$mulai, $selesai])
            ->exists();

        if ($adaAbsensi) {
            return back()->withErrors([
                'error' => 'Pengajuan izin ditolak, terdapat absensi pada tanggal yang diajukan.'
            ]);
        }

        // ==========================
        // ❌ CEK BENTROK IZIN LAIN
        // ==========================
        $izinBentrok = PengajuanIzin::where('user_id', $user->id)
            ->where(function ($q) use ($mulai, $selesai) {
                $q->whereBetween('tanggal_mulai', [$mulai, $selesai])
                    ->orWhereBetween('tanggal_selesai', [$mulai, $selesai]);
            })
            ->whereIn('status', ['pending', 'disetujui'])
            ->exists();

        if ($izinBentrok) {
            return back()->withErrors([
                'error' => 'Anda sudah memiliki pengajuan izin pada rentang tanggal tersebut.'
            ]);
        }

        // ==========================
        // ✅ SIMPAN IZIN
        // ==========================
        PengajuanIzin::create([
            'user_id'         => $user->id,
            'tanggal_mulai'   => $mulai,
            'tanggal_selesai' => $selesai,
            'jenis_izin'      => $request->jenis_izin,
            'alasan'          => $request->alasan,
            'status'          => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan izin berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}