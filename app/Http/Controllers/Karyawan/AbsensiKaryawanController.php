<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\d_absensi_hari_ini;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiKaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.pages.absensi-karyawan');
    }

    public function store(Request $request)
    {
        //VALIDASI INPUT
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ], [
            'latitude.required' => 'Lokasi belum terdeteksi, aktifkan GPS.',
            'longitude.required' => 'Lokasi belum terdeteksi, aktifkan GPS.',
        ]);

        //DATA DASAR NYA
        $user = Auth::user();
        $today = Carbon::today('Asia/Jakarta');
        $now   = Carbon::now('Asia/Jakarta');

        $lat = $request->latitude;
        $lng = $request->longitude;

        //SET KOORDINAT KANTOR
        $officeLat = 1.68011;
        $officeLng = 101.42183;
        $maxDistance = 100; // meter

        //HITUNG JARAK AMAN 
        $distance = $this->distance($lat, $lng, $officeLat, $officeLng);

        if ($distance > $maxDistance) {
            return back()->with('error', 'Anda harus berada di area kantor untuk absen.');
        }

        //CEK ABSENSI HARI INI
        $absensi = d_absensi_hari_ini::where('user_id', $user->id)
            ->where('tanggal', $today)
            ->first();

        //ABSEN MASUK
        if (!$absensi) {

            $jamMasukBatas = $today->copy()->setTime(8, 0, 0);
            $statusMasuk = $now->greaterThan($jamMasukBatas)
                ? 'terlambat'
                : 'hadir';

            d_absensi_hari_ini::create([
                'user_id'      => $user->id,
                'tanggal'      => $today,
                'jam_masuk'    => $now->toTimeString(),
                'status_masuk' => $statusMasuk,
                'lat_masuk'    => $lat,
                'lng_masuk'    => $lng,
            ]);

            return back()->with('success', 'Absen masuk berhasil.');
        }

        //CEK ABSEN SUDAH PULANG
        if ($absensi->jam_pulang) {
            return back()->with('error', 'Anda sudah absen pulang hari ini.');
        }

        //ABSEN PULANG
        $jamPulangBatas = $today->copy()->setTime(17, 0, 0);
        $statusPulang = $now->lessThan($jamPulangBatas)
            ? 'pulang_cepat'
            : 'normal';
        $absensi->update([
            'jam_pulang'    => $now->toTimeString(),
            'status_pulang' => $statusPulang,
            'lat_pulang'    => $lat,
            'lng_pulang'    => $lng,
        ]);

        return back()->with('success', 'Absen pulang berhasil.');
    }

    // FUNGSI HITUNG JARAK (HAVERSINE)
    private function distance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // meter

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) *
            cos(deg2rad($lat2)) *
            sin($dLon / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}