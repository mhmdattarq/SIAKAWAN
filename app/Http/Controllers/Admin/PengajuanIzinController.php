<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanIzin;

class PengajuanIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = PengajuanIzin::all();
        return view('admin.pages.pengajuan-izin', compact('pengajuan'));
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
        //
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'alasan' => 'nullable'
        ]);

        $izin = PengajuanIzin::findOrFail($id);

        $izin->update([
            'status' => $request->status,
            'alasan' => $request->status === 'ditolak'
                ? $request->alasan
                : null
        ]);

        return redirect()
            ->route('admin.pengajuanizin')
            ->with('success', 'Pengajuan izin berhasil diperbarui');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}