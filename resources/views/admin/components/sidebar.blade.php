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
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-home-alt"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="menu-label">KARYAWAN</li>
    <li>
        <a href="{{ route('admin.datakaryawan') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-user-circle"></i>
            </div>
            <div class="menu-title">Data Karyawan</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.absensi') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-bar-chart-square"></i>
            </div>
            <div class="menu-title">Absensi Hari ini</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.dataabsensi') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-spreadsheet"></i>
            </div>
            <div class="menu-title">Data Absensi</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.pengajuanizin') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-user-plus"></i>
            </div>
            <div class="menu-title">Pengajuan Izin</div>
        </a>
    </li>
    <li class="menu-label">LAPORAN</li>
    <li>
        <a href="{{ route('admin.laporan') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-book-add"></i>
            </div>
            <div class="menu-title">Laporan</div>
        </a>
    </li>
    <li class="menu-label">Lainnya</li>
    <li>
        <a href="{{ route('admin.setting') }}">
            <div class="parent-icon"><i class="fadeIn animated bx bx-cog"></i>
            </div>
            <div class="menu-title">Pengaturan</div>
        </a>
    </li>
    {{-- <li>
        <a href="#">
            <div class="parent-icon"><i class="fadeIn animated bx bx-user-check"></i>
            </div>
            <div class="menu-title">Absen Hari ini</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class="fadeIn animated bx bx-archive"></i>
            </div>
            <div class="menu-title">Riwayat Izin</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class="fadeIn animated bx bx-user-plus"></i>
            </div>
            <div class="menu-title">Pengajuan Izin</div>
        </a>
    </li> --}}
</ul>
<!--end navigation-->
