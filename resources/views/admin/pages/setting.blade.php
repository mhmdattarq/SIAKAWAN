@extends('admin.layout.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3 text-white">LAINNYA</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active text-white" aria-current="page">Pengaturan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="profile-cover bg-dark"></div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Akun Saya</h5>
                    <hr>
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h6 class="mb-0">Informasi Pengguna</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" value="Admin" name="nama" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" value="********" name="password">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-start">
                        <button type="button" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}" class="rounded-circle shadow"
                            width="120" height="120" alt="">
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">Admin</h4>
                        <div class="mt-4"></div>
                        <h6 class="mb-1">HR Manager - Codervent Technology</h6>
                        <p class="mb-0 text-secondary">University of Information Technology</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
@endsection
