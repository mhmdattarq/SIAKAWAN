@extends('karyawan.layout.app')
@section('content')
    <h6 class="mb-0 text-uppercase">Absensi Hari ini</h6>
    <hr />
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="col">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Absen
            Masuk</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Absen</h5>
                    </div>
                    <div class="modal-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Form Absen</h5>
                            </div>
                            <hr />
                            <form action="{{ route('absen.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ auth()->user()->karyawan->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email"
                                            value="{{ auth()->user()->karyawan->email }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tempat_lahir"
                                            value="{{ auth()->user()->karyawan->tempat_lahir }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tanggal_lahir"
                                            value="{{ auth()->user()->karyawan->tanggal_lahir }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="no_hp" class="col-sm-3 col-form-label">Nomor Handphone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="no_hp"
                                            value="{{ auth()->user()->karyawan->no_hp }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat"
                                            value="{{ auth()->user()->karyawan->alamat }}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" id="btnAbsen" class="btn btn-success px-5"
                                            disabled>Absen</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        const btnAbsen = document.getElementById('btnAbsen');
        let lokasiSiap = false;

        function setLokasi(position) {
            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;

            lokasiSiap = true;
            btnAbsen.disabled = false;
            btnAbsen.innerText = 'Absen';
        }

        function lokasiGagal(error) {
            lokasiSiap = false;
            btnAbsen.disabled = true;
            btnAbsen.innerText = 'GPS Tidak Aktif';

            let pesan = 'Gagal mendapatkan lokasi.';
            if (error.code === 1) {
                pesan = 'Izin lokasi ditolak. Aktifkan GPS.';
            }

            alert(pesan);
        }

        function ambilLokasi() {
            btnAbsen.disabled = true;
            btnAbsen.innerText = 'Mengambil lokasi...';

            if (!navigator.geolocation) {
                lokasiGagal({
                    code: 0
                });
                return;
            }

            navigator.geolocation.getCurrentPosition(
                setLokasi,
                lokasiGagal, {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                }
            );
        }

        // Ambil lokasi SAAT modal dibuka
        document.getElementById('exampleLargeModal')
            .addEventListener('shown.bs.modal', function() {
                ambilLokasi();
            });

        // SAFETY: cegah submit kalo lokasi belum siap
        document.querySelector('form[action="{{ route('absen.store') }}"]')
            .addEventListener('submit', function(e) {
                if (!lokasiSiap) {
                    e.preventDefault();
                    alert('Lokasi belum terdeteksi.');
                }
            });
    </script>
@endsection
