@extends('admin.layout.app')
@section('content')
    <h6 class="mb-0 text-uppercase">Data Absensi Karyawan</h6>
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
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Status Masuk</th>
                            <th>Status Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $item)
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
