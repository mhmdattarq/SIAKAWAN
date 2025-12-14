@extends('admin.layout.app')
@section('content')
    {{-- INI SATU-SATUNYA YANG BERUBAH: tambah container-fluid + ganti row atas jadi col-md-4 --}}
    <div class="container-fluid px-4 px-xl-5">

        <!-- CARD ATAS: 3 card kecil (sekarang rapi banget ujungnya) -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 justify-content-center">
            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1">Total Izin</p>
                                <h4 class="mb-0">5.8K</h4>
                                <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>22.5% from last week</span>
                                </p>
                            </div>
                            <div class="ms-auto widget-icon bg-warning text-white">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1">Total Hadir</p>
                                <h4 class="mb-0">$9,786</h4>
                                <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span>
                                </p>
                            </div>
                            <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1">Total Alpha</p>
                                <h4 class="mb-0">875</h4>
                                <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>12.3% from last week</span>
                                </p>
                            </div>
                            <div class="ms-auto widget-icon bg-danger text-white">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir card atas -->


        <!-- CARD BAWAH: TETAP 100% SAMA seperti kode kamu sebelumnya -->
        <div class="row g-4">
            <div class="col-12 col-lg-8 col-xl-8 d-flex">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0">Revenue History</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="">
                                <h4 class="text-success mb-0">$9,279</h4>
                                <p class="mb-0">Revenue</p>
                            </div>
                            <div class="vr"></div>
                            <div class="">
                                <h4 class="text-pink mb-0">$5,629</h4>
                                <p class="mb-0">Investment</p>
                            </div>
                        </div>
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-xl-4 d-flex">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0">Task Overview</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart2"></div>
                    </div>
                    <ul class="list-group list-group-flush mb-0 shadow-none">
                        <li class="list-group-item bg-transparent border-top"><i
                                class="bi bi-circle-fill me-2 font-weight-bold text-primary"></i> Complete <span
                                class="float-end">120</span></li>
                        <li class="list-group-item bg-transparent"><i
                                class="bi bi-circle-fill me-2 font-weight-bold text-orange"></i> In Progress <span
                                class="float-end">110</span></li>
                        <li class="list-group-item bg-transparent"><i
                                class="bi bi-circle-fill me-2 font-weight-bold text-info"></i> Started <span
                                class="float-end">70</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- akhir card bawah -->

    </div>
    <!-- akhir container-fluid -->
@endsection
