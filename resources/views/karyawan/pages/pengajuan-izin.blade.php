@extends('karyawan.layout.app')
@section('content')
    <h6 class="mb-0 text-uppercase">Pengajuan Izin Karyawan</h6>
    <hr />
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}'
            });
        </script>
    @endif
    <div class="col">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Ajukan
            Izin</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajukan Izin</h5>
                    </div>
                    <div class="modal-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Form Pengajuan Izin</h5>
                            </div>
                            <hr />
                            <form action="{{ route('pengajuanizin.store') }}" method="POST" id="formPengajuanIzin">
                                @csrf
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
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat"
                                            value="{{ auth()->user()->karyawan->alamat }}" readonly>
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
                                    <label for="tanggal_mulai" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                            value="{{ old('tanggal_mulai') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_selesai" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_selesai"
                                            name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Jenis Izin</label>
                                    <div class="col-sm-9">
                                        <select name="jenis_izin" class="form-select" required>
                                            <option value="">-- Pilih Jenis Izin --</option>
                                            <option value="sakit">Sakit</option>
                                            <option value="cuti">Cuti</option>
                                            <option value="izin_pribadi">Izin Pribadi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Alasan</label>
                                    <div class="col-sm-9">
                                        <textarea name="alasan" rows="3" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnSubmitIzin" class="btn btn-success">Ajukan Izin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Izin</th>
                            <th>Email</th>
                            <th>Nomor Handphone</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal_mulai }} - {{ $item->tanggal_selesai }}</td>
                                <td>{{ $item->karyawan->nama }}</td>
                                <td>{{ $item->jenis_izin }}</td>
                                <td>{{ $item->karyawan->email }}</td>
                                <td>{{ $item->karyawan->no_hp }}</td>
                                <td>{{ $item->karyawan->alamat }}</td>
                                <td>
                                    <span
                                        class="badge 
                                            @if ($item->status == 'pending') bg-warning 
                                            @elseif($item->status == 'disetujui') bg-success 
                                            @else bg-danger @endif">
                                        {{ strtoupper($item->status) }}
                                    </span>
                                </td>
                                <td>{{ $item->alasan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('btnSubmitIzin').addEventListener('click', function() {
            Swal.fire({
                title: 'Ajukan Izin?',
                text: 'Pastikan data yang Anda masukkan sudah benar',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Ya, Ajukan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    // loading state
                    Swal.fire({
                        title: 'Mengirim...',
                        text: 'Mohon tunggu',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });

                    document.getElementById('formPengajuanIzin').submit();
                }
            });
        });
    </script>
@endsection
