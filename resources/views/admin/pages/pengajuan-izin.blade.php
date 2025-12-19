@extends('admin.layout.app')
@section('content')
    <h6 class="mb-0 text-uppercase">Data Pengajuan Izin Karyawan</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Jenis Izin</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Alasan</th>
                            <th>Aksi</th>
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
                        @elseif ($item->status == 'disetujui') bg-success
                        @else bg-danger @endif">
                                        {{ strtoupper($item->status) }}
                                    </span>
                                </td>
                                <td>{{ $item->alasan ?? '-' }}</td>
                                <td>
                                    @if ($item->status == 'pending')
                                        <button class="btn btn-success btnKelola" data-id="{{ $item->id }}"
                                            data-status="{{ $item->status }}" data-bs-toggle="modal"
                                            data-bs-target="#modalKelola">
                                            Kelola
                                        </button>
                                    @else
                                        <span class="text-muted">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalKelola" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Pengajuan Izin</h5>
                </div>

                <div class="modal-body">
                    <form action="{{ route('pengajuanizin.update') }}" id="formKelolaIzin" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="izin_id">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Kelola Izin</label>
                            <div class="col-sm-9">
                                <select id="status" class="form-select" name="status" required>
                                    <option value="">-- Kelola Izin Karyawan --</option>
                                    <option value="disetujui">Disetujui</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 d-none" id="alasanBox">
                            <label class="col-sm-3 col-form-label">Alasan Ditolak</label>
                            <div class="col-sm-9">
                                <textarea id="alasan" class="form-control" rows="3" name="alasan"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success" id="btnSubmitKelola">Selesaikan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let izinId = null;

        document.querySelectorAll('.btnKelola').forEach(btn => {
            btn.addEventListener('click', function() {
                izinId = this.dataset.id;
                document.getElementById('izin_id').value = izinId;
                document.getElementById('status').value = '';
                document.getElementById('alasan').value = '';
                document.getElementById('alasanBox').classList.add('d-none');
            });
        });

        document.getElementById('status').addEventListener('change', function() {
            if (this.value === 'ditolak') {
                document.getElementById('alasanBox').classList.remove('d-none');
            } else {
                document.getElementById('alasanBox').classList.add('d-none');
                document.getElementById('alasan').value = '';
            }
        });

        document.getElementById('btnSubmitKelola').addEventListener('click', function() {
            const status = document.getElementById('status').value;
            const alasan = document.getElementById('alasan').value;

            if (!status) {
                Swal.fire('Error', 'Status wajib dipilih', 'error');
                return;
            }

            if (status === 'ditolak' && !alasan) {
                Swal.fire('Error', 'Alasan wajib diisi', 'error');
                return;
            }

            Swal.fire({
                title: 'Yakin?',
                text: 'Status izin akan diperbarui',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan'
            }).then(result => {
                if (result.isConfirmed) {
                    const form = document.getElementById('formKelolaIzin');
                    form.action = `/admin/pengajuan-izin/${izinId}`;
                    form.submit();
                }
            });
        });
    </script>
@endsection
