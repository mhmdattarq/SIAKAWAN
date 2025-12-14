<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('backend/assets/images/logo-pertamina.jpg') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />

    <title>{{ config('app.name') }}</title>
</head>

<body class="bg-register">

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 mx-auto">
                        <div class="card shadow rounded-5 overflow-hidden">
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title">Registrasi Akun</h5>
                                <p class="card-text mb-3">Lakukan Registrasi Akun untuk Mendapatkan Akses ke Aplikasi!
                                </p>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form-body" action="{{ route('register.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 ">
                                            <label for="nama" class="form-label"><span
                                                    style="color: red">*</span>Nama</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <input type="text" class="form-control radius-30 ps-5" id="nama"
                                                    name="nama" placeholder="Masukkan Nama Anda.."
                                                    value="{{ old('nama') }}">
                                            </div>
                                            @error('nama')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 ">
                                            <label for="username" class="form-label"><span
                                                    style="color: red">*</span>Username</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <input type="text" class="form-control radius-30 ps-5" id="username"
                                                    name="username" placeholder="Masukkan Username Anda.."
                                                    value="{{ old('username') }}">
                                            </div>
                                            @error('username')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label"><span
                                                    style="color: red">*</span>Email</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </div>
                                                <input type="email" class="form-control radius-30 ps-5" id="email"
                                                    name="email" placeholder="Masukkan Email Anda.."
                                                    value="{{ old('email') }}">
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="tempat_lahir" class="form-label"><span
                                                    style="color: red">*</span>Tempat Lahir</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="fadeIn animated bx bx-home"></i>
                                                </div>
                                                <input type="text" class="form-control radius-30 ps-5"
                                                    id="tempat_lahir" name="tempat_lahir"
                                                    placeholder="Masukkan Tempat Lahir Anda.."
                                                    value="{{ old('tempat_lahir') }}">
                                            </div>
                                            @error('tempat_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="tanggal_lahir" class="form-label"><span
                                                    style="color: red">*</span>Tanggal Lahir</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="fadeIn animated bx bx-calendar-alt"></i>
                                                </div>
                                                <input type="date" class="form-control radius-30 ps-5"
                                                    id="tanggal_lahir" name="tanggal_lahir"
                                                    placeholder="Masukkan Tanggal Lahir"
                                                    value="{{ old('tanggal_lahir') }}">
                                            </div>
                                            @error('tanggal_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="no_hp" class="form-label"><span
                                                    style="color: red">*</span>Nomor Handphone</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="fadeIn animated bx bx-phone"></i>
                                                </div>
                                                <input type="text" class="form-control radius-30 ps-5"
                                                    id="no_hp" name="no_hp"
                                                    placeholder="Masukkan Nomor Handphone Anda.."
                                                    value="{{ old('no_hp') }}">
                                            </div>
                                            @error('no_hp')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="alamat" class="form-label"><span
                                                    style="color: red">*</span>Alamat</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="fadeIn animated bx bx-map-alt"></i>
                                                </div>
                                                <input type="text" class="form-control radius-30 ps-5"
                                                    id="alamat" name="alamat"
                                                    placeholder="Masukkan Alamat Anda.." value="{{ old('alamat') }}">
                                            </div>
                                            @error('alamat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label"><span
                                                    style="color: red">*</span>Password</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="fadeIn animated bx bx-key"></i>
                                                </div>
                                                <input type="password" class="form-control radius-30 ps-5"
                                                    name="password" id="password"
                                                    placeholder="Masukkan Password Anda.."
                                                    value="{{ old('password') }}">
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="password_confirmation" class="form-label"><span
                                                    style="color: red">*</span>Konfirmasi
                                                Password</label>
                                            <div class="ms-auto position-relative">
                                                <div
                                                    class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="fadeIn animated bx bx-key"></i>
                                                </div>
                                                <input type="password" class="form-control radius-30 ps-5"
                                                    id="password_confirmation" name="password_confirmation"
                                                    placeholder="Konfirmasi Password"
                                                    value="{{ old('password_confirmation') }}">
                                            </div>
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit"
                                                    class="btn btn-primary radius-30">Daftar</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <a href="{{ route('showformlogin') }}" type="submit"
                                                    class="btn btn-danger radius-30">Kembali Ke Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
</body>

</html>
