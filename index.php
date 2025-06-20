<?php
session_start();
include 'conf/conf.php';

// Cek apakah user sudah login dan berperan sebagai admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "<script>
        alert('Anda tidak memiliki akses ke halaman ini!');
        window.location.href = './';
    </script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>
        Dashboard Admin | Juan
    </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favjuan.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Load ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="assets/img/gpd1.png" alt="Logo Gereja" style="height: 60px;" />
                        </span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>


                <div class="menu-inner-shadow"></div>

                <?php
                $q = $_GET['q'] ?? '';
                ?>

                <ul class="menu-inner py-1">
                    <!-- KATEGORI: Utama -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Menu Utama</span>
                    </li>
                    <li class="menu-item <?= $q == '' ? 'active' : '' ?>">
                        <a href="?q=beranda" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>

                    <!-- KATEGORI: Manajemen Data -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Manajemen Data</span>
                    </li>
                    <li class="menu-item <?= $q == 'manajemen_user' ? 'active' : '' ?>">
                        <a href="?q=manajemen_user" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div>Manajemen User</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $q == 'manajemen_jadwal' ? 'active' : '' ?>">
                        <a href="?q=manajemen_jadwal" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                            <div>Manajemen Jadwal Ibadah</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $q == 'data_jemaat' ? 'active' : '' ?>">
                        <a href="?q=data_jemaat" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div>Data Jemaat</div>
                        </a>
                    </li>

                    <!-- KATEGORI: Pelaporan -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pelaporan</span>
                    </li>
                    <li class="menu-item <?= $q == 'laporan_kegiatan' ? 'active' : '' ?>">
                        <a href="?q=laporan_kegiatan" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div>Laporan Kegiatan</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $q == 'export_data' ? 'active' : '' ?>">
                        <a href="?q=export_data" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-download"></i>
                            <div>Export Data</div>
                        </a>
                    </li>

                    <!-- KATEGORI: Pengaturan -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pengaturan</span>
                    </li>
                    <li class="menu-item <?= $q == 'pengaturan_sistem' ? 'active' : '' ?>">
                        <a href="?q=pengaturan_sistem" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div>Pengaturan Sistem</div>
                        </a>
                    </li>

                    <!-- KATEGORI: Akun -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Akun</span>
                    </li>
                    <li class="menu-item">
                        <a href="logout" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-log-out"></i>
                            <div>Logout</div>
                        </a>
                    </li>
                </ul>


            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Jam -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-time-five fs-4 lh-0 me-2"></i>
                                <span id="jamSekarang" class="fw-semibold"></span>
                            </div>
                        </div>
                        <!-- /Jam -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= !empty($_SESSION['path_foto']) && file_exists($_SESSION['path_foto']) ? $_SESSION['path_foto'] : 'assets/img/avatars/1.png'; ?>"
                                            alt="Foto Profil" class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= !empty($_SESSION['path_foto']) ? $_SESSION['path_foto'] : 'assets/img/avatars/1.png'; ?>"
                                                            alt="Foto Profil" class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block"><?= htmlspecialchars($_SESSION['username']); ?></span>
                                                    <small class="text-muted"><?= ucfirst($_SESSION['role']); ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <!-- <li>
                                        <a class="dropdown-item" href="?q=profil">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Profil Saya</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Keluar</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <?php
                    include 'link.php';
                    ?>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            © <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , Aplikasi Manajemen Kegiatan Gereja —
                            <span class="fw-bold">GPdI Hermon Leleko</span>
                        </div>
                        <div>
                            <span class="footer-link me-4">Dikembangkan oleh Juan Eungelion Endoh</span>
                            <span class="footer-link me-4">Universitas Negeri Manado</span>
                        </div>
                    </div>
                </footer>

                <!-- / Footer -->
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script>
        // Fungsi untuk menampilkan waktu real-time
        function updateJam() {
            const hariIndo = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const now = new Date();
            const hari = hariIndo[now.getDay()];
            const jam = now.getHours().toString().padStart(2, '0');
            const menit = now.getMinutes().toString().padStart(2, '0');
            const detik = now.getSeconds().toString().padStart(2, '0');
            const waktu = `${hari}, ${jam}:${menit}:${detik}`;
            document.getElementById('jamSekarang').textContent = waktu;
        }

        // Update setiap detik
        setInterval(updateJam, 1000);
        updateJam(); // Panggil langsung saat halaman dimuat
    </script>


    <script>
        var options = {
            chart: {
                type: 'bar',
                height: 300
            },
            series: [{
                name: 'Jumlah Laporan',
                data: <?= json_encode($data) ?>
            }],
            xaxis: {
                categories: <?= json_encode($labels) ?>
            },
            colors: ['#696CFF']
        };
        var chart = new ApexCharts(document.querySelector("#chartLaporan"), options);
        chart.render();
    </script>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#manajemenTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#manajemenJadwal').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>


    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#dataJemaat').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#laporanKegiatan').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>




</body>

</html>