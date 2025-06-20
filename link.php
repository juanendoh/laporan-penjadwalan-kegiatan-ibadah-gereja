<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {

        case 'beranda':
            include './pages/beranda/beranda.php';
            break;

        case 'manajemen_user':
            include './pages/manajemen_user/manajemen_user.php';
            break;

        case 'add_manajemen_user':
            include './pages/manajemen_user/add_manajemen_user/add_manajemen_user.php';
            break;

        case 'edit_manajemen_user':
            include './pages/manajemen_user/edit_manajemen_user/edit_manajemen_user.php';
            break;

        case 'delete_manajemen_user':
            include './pages/manajemen_user/delete_manajemen_user/delete_manajemen_user.php';
            break;

        case 'manajemen_jadwal':
            include './pages/manajemen_jadwal/manajemen_jadwal.php';
            break;

        case 'add_manajemen_jadwal':
            include './pages/manajemen_jadwal/add_manajemen_jadwal/add_manajemen_jadwal.php';
            break;

        case 'edit_manajemen_jadwal':
            include './pages/manajemen_jadwal/edit_manajemen_jadwal/edit_manajemen_jadwal.php';
            break;

        case 'delete_manajemen_jadwal':
            include './pages/manajemen_jadwal/delete_manajemen_jadwal/delete_manajemen_jadwal.php';
            break;

        case 'data_jemaat':
            include './pages/data_jemaat/data_jemaat.php';
            break;

        case 'add_data_jemaat':
            include './pages/data_jemaat/add_data_jemaat/add_data_jemaat.php';
            break;

        case 'edit_data_jemaat':
            include './pages/data_jemaat/edit_data_jemaat/edit_data_jemaat.php';
            break;

        case 'delete_data_jemaat':
            include './pages/data_jemaat/delete_data_jemaat/delete_data_jemaat.php';
            break;

        case 'laporan_kegiatan':
            include './pages/laporan_kegiatan/laporan_kegiatan.php';
            break;

        case 'add_laporan_kegiatan':
            include './pages/laporan_kegiatan/add_laporan_kegiatan/add_laporan_kegiatan.php';
            break;

        case 'edit_laporan_kegiatan':
            include './pages/laporan_kegiatan/edit_laporan_kegiatan/edit_laporan_kegiatan.php';
            break;

        case 'delete_laporan_kegiatan':
            include './pages/laporan_kegiatan/delete_laporan_kegiatan/delete_laporan_kegiatan.php';
            break;

        case 'export_data':
            include './pages/export_data/export_data.php';
            break;

        case 'pengaturan_sistem':
            include './pages/pengaturan_sistem/pengaturan_sistem.php';
            break;

        case 'update_pengaturan_sistem':
            include './pages/pengaturan_sistem/update_pengaturan_sistem/update_pengaturan_sistem.php';
            break;
    }
} else {
    include './pages/beranda/beranda.php';
}