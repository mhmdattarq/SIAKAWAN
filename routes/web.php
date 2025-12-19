<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DatakaryawanController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\DataAbsensiController;
use App\Http\Controllers\Admin\PengajuanIzinController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Karyawan\DashboardKaryawanController;
use App\Http\Controllers\Karyawan\ProfilController;
use App\Http\Controllers\Karyawan\AbsensiKaryawanController;
use App\Http\Controllers\Karyawan\PengajuanIzinKaryawanController;
use App\Http\Controllers\Karyawan\RiwayatAbsensiKaryawanController;


// semua auth
Route::get('/registrasi-akun', [RegisterController::class, 'showformregister'])->name('showformregister');
Route::post('/registrasi-akun-proses', [RegisterController::class, 'store'])->name('register.store');
Route::get('/lupa-password', [ForgetController::class, 'showformforget'])->name('showformforget');
Route::get('/', [AuthController::class, 'showformlogin'])->name('showformlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/Dashboard-Admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    // data karyawan
    Route::get('/Data-Karyawan', [DatakaryawanController::class, 'index'])->name('admin.datakaryawan');
    // abesensi hari ini
    Route::get('/Absensi-hari-ini', [AbsensiController::class, 'index'])->name('admin.absensi');
    // data absensi
    Route::get('/Data-Absensi', [DataAbsensiController::class, 'index'])->name('admin.dataabsensi');
    // pengajuan izin
    Route::get('/Pengajuan-Izin', [PengajuanIzinController::class, 'index'])->name('admin.pengajuanizin');
    Route::put('/Kelola-Izin/{id}', [PengajuanIzinController::class, 'update'])->name('pengajuanizin.update');
    // Laporan
    Route::get('/Laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    // settings
    Route::get('/Settings', [SettingController::class, 'index'])->name('admin.setting');
});
Route::middleware(['role:karyawan'])->group(function () {
    // dashboard Karyawan
    Route::get('/Dashboard-karyawan', [DashboardKaryawanController::class, 'index'])->name('karyawan.dashboard');
    // Profil Karyawan
    Route::get('/Profil-karyawan', [ProfilController::class, 'index'])->name('karyawan.profil');
    // Profil Karyawan
    Route::get('/Absensi-karyawan-hari-ini', [AbsensiKaryawanController::class, 'index'])->name('karyawan.absensi');
    Route::post('/Absen-masuk', [AbsensiKaryawanController::class, 'store'])->name('absen.store');
    // Profil Karyawan
    Route::get('/Pengajuan-izin-Karyawan', [PengajuanIzinKaryawanController::class, 'index'])->name('karyawan.pengajuanizin');
    Route::post('/Pengajuan-izin', [PengajuanIzinKaryawanController::class, 'store'])->name('pengajuanizin.store');
    // Profil Karyawan
    Route::get('/Riwayat-izin-Karyawan', [RiwayatAbsensiKaryawanController::class, 'index'])->name('karyawan.riwayatabsensi');
});