@extends('karyawan.layout.app')
@section('content')
    <h6 class="mb-0 text-uppercase">Riwayat Absensi</h6>
    <hr />
    <div class="alert border-0 border-info border-start border-4 bg-light-info alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
            </div>
            <div class="ms-3">
                <div class="text-info">Ini Adalah Data Riwayat Absensi Anda!</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
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
                        @foreach ($riwayat as $item)
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
@endsection
