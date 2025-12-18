@extends('admin.layout.app')
@section('content')
    <h6 class="mb-0 text-uppercase">Data Karyawan</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor Handphone</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->tempat_lahir }}</td>
                                <td>{{ $data->tanggal_lahir }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
