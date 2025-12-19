<!-- 1️⃣ CORE: jQuery (WAJIB PALING ATAS) -->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>

<!-- 2️⃣ Bootstrap -->
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- 3️⃣ Plugin layout (sidebar, scroll, menu) -->
<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

<!-- 4️⃣ Pace loader -->
<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>

<!-- 5️⃣ DataTables (SETELAH jQuery & Bootstrap) -->
<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<!-- 6️⃣ Inisialisasi DataTables -->
<script src="{{ asset('backend/assets/js/table-datatable.js') }}"></script>

<!-- 7️⃣ Chart & visual plugin -->
<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>

<!-- 8️⃣ Vector Map -->
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- 9️⃣ App core (PALING BAWAH) -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
<script src="{{ asset('backend/assets/js/index.js') }}"></script>

<!-- 10️⃣ Custom script -->
<script>
    new PerfectScrollbar(".review-list");
    new PerfectScrollbar(".chat-talk");
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
