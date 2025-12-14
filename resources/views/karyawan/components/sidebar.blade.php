<div class="sidebar-header">
    <div>
        <img src="{{ asset('backend/assets/images/logo-pertamina.jpg') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">SIAKAWAN</h4>
    </div>
    <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
    </div>
</div>
<!--navigation-->
<ul class="metismenu" id="menu">
    <li class="menu-label">BERANDA</li>
    <li>
        <a href="{{ route('karyawan.dashboard') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-home-alt"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="menu-label">KARYAWAN</li>
    <li>
        <a href="{{ route('karyawan.absensi') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-bar-chart-square"></i>
            </div>
            <div class="menu-title">Absensi Hari ini</div>
        </a>
    </li>
    <li>
        <a href="{{ route('karyawan.riwayatabsensi') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-spreadsheet"></i>
            </div>
            <div class="menu-title">Riwayat Absensi</div>
        </a>
    </li>
    <li>
        <a href="{{ route('karyawan.pengajuanizin') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-user-plus"></i>
            </div>
            <div class="menu-title">Pengajuan Izin</div>
        </a>
    </li>
    <li class="menu-label">Lainnya</li>
    <li>
        <a href="{{ route('karyawan.profil') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-cog"></i>
            </div>
            <div class="menu-title">Profil</div>
        </a>
    </li>
</ul>
<!--end navigation-->
