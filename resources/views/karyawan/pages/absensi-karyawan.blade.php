@extends('karyawan.layout.app')
@section('content')
    <h6 class="mb-0 text-uppercase">Absensi Hari ini</h6>
    <hr />
    {{-- error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="col">
        <!-- Button trigger modal -->
        @if (!$absensiHariIni)
            @if ($bolehAbsenMasuk)
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Absen
                    Masuk</button>
            @else
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"
                    disabled>Absen Masuk Ditutup</button>
            @endif
        @elseif (!$absensiHariIni->jam_pulang)
            @if ($bolehAbsenPulang)
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Absen
                    Pulang</button>
            @else
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"
                    disabled>Absen Pulang</button>
            @endif
        @else
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"
                disabled>Sudah
                Absen</button>
        @endif
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
                                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
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
    {{-- Alert --}}
    @if ($alertMasuk)
        <div class="alert border-0 border-info border-start border-4 bg-light-info alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-info">Silahkan Melakukan Absen Untuk Masuk Jika Anda Ingin Bekerja!</div>
                </div>
            </div>
        </div>
    @elseif ($alertPulang)
        <div class="alert border-0 border-info border-start border-4 bg-light-info alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-info">Silahkan Melakukan Absen Jika Anda Ingin Pulang!</div>
                </div>
            </div>
        </div>
    @elseif ($alertSelesai)
        <div class="alert border-0 border-success border-start border-4 bg-light-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-success">Terimakasih, Anda Sudah Berhasil Absen!</div>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Lengkap</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Status Masuk</th>
                            <th>Status Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensiAktif as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->karyawan->nama }}</td>
                                <td>{{ $item->jam_masuk }}</td>
                                <td>{{ $item->jam_pulang }}</td>
                                <td>{{ $item->status_masuk }}</td>
                                <td>{{ $item->status_pulang }}</td>
                            </tr>
                        @endforeach
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
