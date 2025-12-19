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
        $user  = Auth::user();
        $now   = Carbon::now('Asia/Jakarta');
        $today = Carbon::today('Asia/Jakarta');

        $absensiHariIni = d_absensi_hari_ini::where('user_id', $user->id)
            ->where('tanggal', $today)
            ->first();

        // ===============================
        // FLAG UNTUK ALERT
        // ===============================
        $alertMasuk  = false;
        $alertPulang = false;
        $alertSelesai = false;
        $bolehAbsenMasuk  = false;
        $bolehAbsenPulang = false;

        if (!$absensiHariIni) {

            // jam absen masuk
            $mulaiMasuk = $today->copy()->setTime(7, 59);
            $batasMasuk = $today->copy()->setTime(8, 30);

            if ($now->between($mulaiMasuk, $batasMasuk)) {
                $bolehAbsenMasuk = true;
            }
        } elseif (!$absensiHariIni->jam_pulang) {

            // jam absen pulang
            $mulaiPulang = $today->copy()->setTime(16, 0);

            if ($now->greaterThanOrEqualTo($mulaiPulang)) {
                $bolehAbsenPulang = true;
            }
        }

        // tabel
        $absensiAktif = d_absensi_hari_ini::where('user_id', $user->id)
            ->where('tanggal', $today)
            ->whereNull('jam_pulang')
            ->get();

        return view('karyawan.pages.absensi-karyawan', compact(
            'absensiHariIni',
            'absensiAktif',
            'alertMasuk',
            'alertPulang',
            'alertSelesai',
            'bolehAbsenMasuk',
            'bolehAbsenPulang'
        ));
    }


    public function store(Request $request)
    {
        // ===============================
        // VALIDASI GPS
        // ===============================
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ], [
            'latitude.required' => 'Lokasi belum terdeteksi, aktifkan GPS.',
            'longitude.required' => 'Lokasi belum terdeteksi, aktifkan GPS.',
        ]);

        $user  = Auth::user();
        $now   = Carbon::now('Asia/Jakarta');
        $today = Carbon::today('Asia/Jakarta');

        $lat = $request->latitude;
        $lng = $request->longitude;

        // ===============================
        // KOORDINAT KANTOR
        // ===============================
        $officeLat   = 1.68011;
        $officeLng   = 101.42183;
        $maxDistance = 100; // meter

        $distance = $this->distance($lat, $lng, $officeLat, $officeLng);

        if ($distance > $maxDistance) {
            return back()->withErrors('Anda harus berada di area kantor untuk absen.');
        }

        // ===============================
        // CEK ABSENSI HARI INI
        // ===============================
        $absensi = d_absensi_hari_ini::where('user_id', $user->id)
            ->where('tanggal', $today)
            ->first();

        // ===============================
        // ABSEN MASUK
        // ===============================
        if (!$absensi) {

            $jamMulaiMasuk  = $today->copy()->setTime(7, 59, 0);
            $jamBatasMasuk  = $today->copy()->setTime(8, 30, 0);
            $jamTelatMasuk  = $today->copy()->setTime(8, 0, 0);

            // ❌ belum jam masuk
            if ($now->lessThan($jamMulaiMasuk)) {
                return back()->withErrors('Absen masuk belum dibuka.');
            }

            // ❌ lewat 30 menit
            if ($now->greaterThan($jamBatasMasuk)) {
                return back()->withErrors('Waktu absen masuk sudah berakhir.');
            }

            // STATUS MASUK
            $statusMasuk = $now->greaterThan($jamTelatMasuk)
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

        // ===============================
        // CEK SUDAH PULANG
        // ===============================
        if ($absensi->jam_pulang) {
            return back()->withErrors('Anda sudah absen pulang hari ini.');
        }

        // ===============================
        // ABSEN PULANG
        // ===============================
        $jamPulangMinimal = $today->copy()->setTime(16, 0, 0);
        $jamNormalPulang  = $today->copy()->setTime(17, 0, 0);

        // ❌ belum jam pulang
        if ($now->lessThan($jamPulangMinimal)) {
            return back()->withErrors('Absen pulang baru dibuka jam 16:00.');
        }

        $statusPulang = $now->lessThan($jamNormalPulang)
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