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

<body class="bg-login">

    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content d-flex justify-content-center align-items-center"
            style="min-height: 100vh;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 mx-auto">
                        <div class="card shadow rounded-5 overflow-hidden">
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title text-center">SiSTEM ABSENSI KARYAWAN</h5>
                                <hr />
                                <form action="{{ route('login') }}" method="POST" class="row g-3">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">
                                            Nama</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                <i class="fadeIn animated bx bx-user"></i>
                                            </div>
                                            <input type="text" name="username" id="username"
                                                value="{{ old('username') }}" class="form-control radius-30 ps-5"
                                                placeholder="Masukkan Nama Anda">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">
                                            Password</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                <i class="fadeIn animated bx bx-key"></i>
                                            </div>
                                            <input type="password" name="password" id="password"
                                                value="{{ old('password') }}" class="form-control radius-30 ps-5"
                                                placeholder="Masukkan Password Anda">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="gridCheck2">
                                            <label class="form-check-label" for="gridCheck2">
                                                Ingat Saya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="{{ route('showformforget') }}">Lupa Password?</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-success radius-30">Masuk</button>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="mb-0">Tidak Punya Akun? <a
                                                href="{{ route('showformregister') }}">Buat Akun!</a>
                                        </p>
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
